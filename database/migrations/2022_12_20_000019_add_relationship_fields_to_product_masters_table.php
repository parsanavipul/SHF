<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductMastersTable extends Migration
{
    public function up()
    {
        Schema::table('product_masters', function (Blueprint $table) {
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id', 'bank_fk_7771377')->references('id')->on('bank_masters');
            $table->unsignedBigInteger('parent_product_id')->nullable();
            $table->foreign('parent_product_id', 'parent_product_fk_7771432')->references('id')->on('product_masters');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7772089')->references('id')->on('teams');
        });
    }
}
