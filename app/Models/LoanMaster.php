<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanMaster extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;
    use HasFactory;

    public const IS_SELF_CONNECTOR_SELECT = [
        '1' => 'Connector',
        '2' => 'Self',
    ];

    public $table = 'loan_masters';

    protected $dates = [
        'sanctioned_date',
        'disbursement_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bank_id',
        'product_id',
        'subproduct_id',
        'customer_id',
        'stage_id',
        'application_no',
        'loan_account_no',
        'amount',
        'loan_tenure',
        'is_self_connector',
        'dme_1_id',
        'dme_2_id',
        'dme_3_id',
        'sanctioned_date',
        'sanctioned_amount',
        'disbursement_date',
        'disbursement_amount',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function bank()
    {
        return $this->belongsTo(BankMaster::class, 'bank_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductMaster::class, 'product_id');
    }

    public function subproduct()
    {
        return $this->belongsTo(ProductMaster::class, 'subproduct_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function stage()
    {
        return $this->belongsTo(StageMaster::class, 'stage_id');
    }

    public function dme_1()
    {
        return $this->belongsTo(User::class, 'dme_1_id');
    }

    public function dme_2()
    {
        return $this->belongsTo(User::class, 'dme_2_id');
    }

    public function dme_3()
    {
        return $this->belongsTo(User::class, 'dme_3_id');
    }

    public function getSanctionedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSanctionedDateAttribute($value)
    {
        $this->attributes['sanctioned_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDisbursementDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDisbursementDateAttribute($value)
    {
        $this->attributes['disbursement_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
