<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogReg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login-regestration', function (Blueprint $logReg) {
            $logReg->bigIncrements('userID');
            $logReg->string('userFirstName');
            $logReg->string('userLastName');
            $logReg->string('userEmail')->unique();
            $logReg->string('userPhone');
            $logReg->string('userCompany')->default(NULL);
            $logReg->string('userCountry')->default(NULL);
            $logReg->string('userDistrict')->default(NULL);
            $logReg->string('userTownCity')->default(NULL);
            $logReg->string('userZip')->default(NULL);
            $logReg->string('userAddress')->default(NULL);
            $logReg->string('userStreetAddress')->default(NULL);
            $logReg->string('userPassword');
            $logReg->string('userAuth');
            $logReg->timestamp('created_at')->useCurrent();
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
