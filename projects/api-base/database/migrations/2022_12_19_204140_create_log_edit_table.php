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
        Schema::create('log_edit', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['ACTIVE', 'DELETED'])->default('ACTIVE');
            $table->bigInteger('user_id')->unsigned();
            $table->text('field');
            $table->text('current_value');
            $table->text('new_value');
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
        Schema::dropIfExists('log_edit');
    }
};
