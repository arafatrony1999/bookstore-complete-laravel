<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReviewReaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_reaction', function (Blueprint $review_reaction) {
            $review_reaction->bigIncrements('id');
            $review_reaction->integer('productID');
            $review_reaction->integer('userID');
            $review_reaction->integer('review_id');
            $review_reaction->string('action');
            $review_reaction->timestamp('created_at')->useCurrent();
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
