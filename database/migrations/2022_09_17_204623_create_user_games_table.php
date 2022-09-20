<?php

use App\Enums\UserGameStatusEnum;
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
        Schema::create('user_games', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('game_id')->index();
            $table->boolean('status')->default(UserGameStatusEnum::INCOMPLETE->value);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('game_id')->references('id')->on('games')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->index(['created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_games');
    }
};
