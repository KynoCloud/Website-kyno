<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('server_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('plan'); // free, premium, pro, reseller
            $table->integer('price'); // cents (e.g. 999 = $9.99)
            $table->timestamp('starts_at');
            $table->timestamp('ends_at')->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
