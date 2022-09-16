<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number');
            $table->string('client_name');
            $table->string('price_type');
            $table->string('sub_total');
            $table->string('grand_total');
            $table->string('discount')->nullable();
            $table->string('discount_type');
            $table->string('sector');
            $table->string('terms_and_conditions');
            $table->string('bank_id');
            $table->string('made_by');
            $table->string('added_date');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}