<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $product) {
            $product->bigIncrements('id');
            $product->string('bookName')->unique();
            $product->string('bookPrice');
            $product->string('bookProkashoni');
            $product->string('bookWriter');
            $product->string('productImage')->default('http://127.0.0.1:8000/storage/dummy.jpg');
            $product->string('bookCatagory');
            $product->string('ISBN');
            $product->string('stockAvail');
            $product->string('productEdition')->default(NULL);
            $product->string('productPublishYear')->default(NULL);
            $product->string('productPage')->default(NULL);
            $product->string('productCountry')->default(NULL);
            $product->string('productLanguage')->default(NULL);
            $product->string('productDescription')->default(NULL);
            $product->string('productItem')->default(NULL);
            $product->integer('total-sale');
            $product->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
