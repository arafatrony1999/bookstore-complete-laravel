<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $orders) {
            $orders->bigIncrements('order_id');
            $orders->integer('userID');
            $orders->integer('productID');
            $orders->string('productName');
            $orders->integer('productQty');
            $orders->integer('productPrice');
            $orders->integer('subtotal');
            $orders->string('appliedCoupon')->default(NULL);
            $orders->integer('discount')->default(NULL);
            $orders->integer('serviceCharge')->default(45);
            $orders->string('orderName');
            $orders->string('orderPhone');
            $orders->string('orderEmail');
            $orders->string('userCompany')->default(NULL);
            $orders->string('userCountry')->default(NULL);
            $orders->string('userAddress')->default(NULL);
            $orders->string('userStreetAddress')->default(NULL);
            $orders->string('userDistrict')->default(NULL);
            $orders->string('userTownCity')->default(NULL);
            $orders->string('userZip')->default(NULL);
            $orders->timestamp('created_at')->useCurrent();
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
