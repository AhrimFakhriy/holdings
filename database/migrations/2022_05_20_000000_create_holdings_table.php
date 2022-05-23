<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::create('holdings', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('hander_id')->nullable();
            $table->string('hander_type')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_type')->nullable();

            $table->morphs('holdable');

            $table->text('notes')->nullable();
            $table->json('files')->nullable();

            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'user_type']);
            $table->index(['hander_id', 'hander_type']);

        });
    }

    public function down() {
        Schema::dropIfExists('holdings');
    }

};
