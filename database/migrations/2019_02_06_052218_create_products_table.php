<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('category_id')->fillable();
            $table->string('product_name',64);
            $table->string('product_no')->nullable();
            $table->string('type',64);
            $table->string('product_image');
            $table->string('flavour')->nullable();
            $table->string('weight');
            $table->decimal('price',8,2);
            $table->string('status')->default('active');
             $table->rememberToken();
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
