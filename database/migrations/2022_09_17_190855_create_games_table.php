<?php

use App\Enums\GameStatusEnum;
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
        Schema::create('games', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('created_by')->index();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('max_allowed_questions');
            $table->boolean('status')->default(GameStatusEnum::ACTIVE->value);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')
                ->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('games');
    }
};
