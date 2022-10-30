<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_c_c__milks', function (Blueprint $table) {
            $table->id();
            $table->string('gv');
            $table->string('fat');
            $table->string('lr');
            $table->string('snf');
            $table->string('percentage')->nullable();
            $table->string('ts')->nullable();
            $table->string('temperature');
            $table->string('type')->nullable();
            $table->date('date');
            $table->integer('user_id')->nullable();
            $table->integer('mcc_id');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('m_c_c__milks');
    }
};