<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocabularies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('japanesekan')->nullable();
            $table->string('katakana')->nullable();
            $table->string('chinese')->nullable();
            $table->integer('class')->default('1'); // 1.N1 2.N2 3.N3 4.N4 5.N5
            $table->integer('type')->default('1'); // 1.單字 2.動詞 3.形容詞/形容動詞 4.副詞 5.量詞 6.片假名 7.其他
            $table->integer('status')->default('1'); //1.啟用 2.刪除
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('create_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vocabularies');
    }
};
