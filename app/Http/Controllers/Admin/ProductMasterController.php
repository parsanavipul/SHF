<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductMasterRequest;
use App\Http\Requests\StoreProductMasterRequest;
use App\Http\Requests\UpdateProductMasterRequest;
use App\Models\BankMaster;
use App\Models\ProductMaster;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductMasterController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('product_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProductMaster::with(['bank', 'parent_product', 'team'])->select(sprintf('%s.*', (new ProductMaster())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'product_master_show';
                $editGate = 'product_master_edit';
                $deleteGate = 'product_master_delete';
                $crudRoutePart = 'product-masters';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('bank_bankname', function ($row) {
                return $row->bank ? $row->bank->bankname : '';
            });

            $table->addColumn('parent_product_product_name', function ($row) {
                return $row->parent_product ? $row->parent_product->product_name : '';
            });

            $table->editColumn('product_name', function ($row) {
                return $row->product_name ? $row->product_name : '';
            });
            $table->editColumn('payout', function ($row) {
                return $row->payout ? $row->payout : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'bank', 'parent_product']);

            return $table->make(true);
        }

        $bank_masters    = BankMaster::get();
        $product_masters = ProductMaster::get();
        $teams           = Team::get();

        return view('admin.productMasters.index', compact('bank_masters', 'product_masters', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banks = BankMaster::pluck('bankname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parent_products = ProductMaster::pluck('product_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productMasters.create', compact('banks', 'parent_products'));
    }

    public function store(StoreProductMasterRequest $request)
    {
        $productMaster = ProductMaster::create($request->all());

        return redirect()->route('admin.product-masters.index');
    }

    public function edit(ProductMaster $productMaster)
    {
        abort_if(Gate::denies('product_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banks = BankMaster::pluck('bankname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parent_products = ProductMaster::pluck('product_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productMaster->load('bank', 'parent_product', 'team');

        return view('admin.productMasters.edit', compact('banks', 'parent_products', 'productMaster'));
    }

    public function update(UpdateProductMasterRequest $request, ProductMaster $productMaster)
    {
        $productMaster->update($request->all());

        return redirect()->route('admin.product-masters.index');
    }

    public function show(ProductMaster $productMaster)
    {
        abort_if(Gate::denies('product_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productMaster->load('bank', 'parent_product', 'team');

        return view('admin.productMasters.show', compact('productMaster'));
    }

    public function destroy(ProductMaster $productMaster)
    {
        abort_if(Gate::denies('product_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productMaster->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductMasterRequest $request)
    {
        ProductMaster::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
