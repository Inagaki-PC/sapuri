<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSapurisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sapuris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sapuri_name'); // サプリメント名を保存するカラム
            $table->string('per_day'); //一日当たりに飲む数量を保存するカラム
            $table->string('total'); //サプリメントの総数量を保存するカラム
            $table->string('sapuri_type')->nullable(); //サプリメントの種類を保存するカラム ※未選択可能に設定
            $table->string('free_comment')->nullable(); //フリーコメントを保存するカラム※未選択可能に設定
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
        Schema::dropIfExists('sapuris');
    }
}
