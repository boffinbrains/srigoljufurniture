<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('title');
            $table->string('slug');
            $table->string('color')->nullable();
            $table->string('discount')->nullable();
            $table->string('brief_description');
            $table->string('thumbnail')->nullable();
            $table->longText('product_specification')->nullable();
            $table->longText('care_instructions')->nullable();
            $table->string('image');
            $table->string('featured');
            $table->boolean('status')->default(true);
            $table->boolean('presentation')->default(false);
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('canonical')->nullable();
            $table->longText('analytics')->nullable();
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
        Schema::dropIfExists('products');
    }
}