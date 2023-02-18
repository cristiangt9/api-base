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
        Schema::create('log_deletable', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['ACTIVE', 'DELETED'])->default('ACTIVE');
            $table->text('table_class');
            $table->bigInteger('table_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_deletable');
    }
};
