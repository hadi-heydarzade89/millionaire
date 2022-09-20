<?php

use App\Enums\RightAnswerEnum;
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
        Schema::create('answers', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('created_by')->index();
            $table->unsignedInteger('question_id')->index();
            $table->text('answer');
            $table->boolean('right_answer')->default(RightAnswerEnum::WRONG_ANSWER->value);
            $table->foreign('created_by')->references('id')->on('users')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('question_id')->references('id')->on('questions')
                ->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('answers');
    }
};
