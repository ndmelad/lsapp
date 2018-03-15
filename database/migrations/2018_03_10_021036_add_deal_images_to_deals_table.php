<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDealImagesToDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deals', function($table)
        {
            $table->string('deal_img1');
            $table->string('deal_img2');
            $table->string('deal_img3');
            $table->string('deal_img4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deals', function($table)
        {
            $table->dropColumn('deal_img1');
            $table->dropColumn('deal_img2');
            $table->dropColumn('deal_img3');
            $table->dropColumn('deal_img4');
        });
    }
}
