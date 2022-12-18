<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CartMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_table', function (Blueprint $wishList) {
            $wishList->bigIncrements('ID');
            $wishList->string('userID');
            $wishList->string('productID');
            $wishList->string('productName');
            $wishList->string('productPrice');
            $wishList->string('productQty');
            $wishList->string('productImage');
            $wishList->integer('subtotal');
            $wishList->timestamp('created_at')->useCurrent();
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
