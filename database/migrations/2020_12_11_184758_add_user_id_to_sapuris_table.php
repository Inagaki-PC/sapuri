<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToSapurisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //※ユーザー毎に保存内容を切り分けるテーブル
    public function up()
    {
        Schema::table('sapuris', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sapuris', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
