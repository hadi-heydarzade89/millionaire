<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_game_questions', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('game_id')->index();
            $table->unsignedInteger('question_id')->index();
            $table->dateTimeTz('read_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('user_game_questions');
    }
};
