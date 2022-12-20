<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMasterUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('product_master_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_7771458')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('product_master_id');
            $table->foreign('product_master_id', 'product_master_id_fk_7771458')->references('id')->on('product_masters')->onDelete('cascade');
        });
    }
}
