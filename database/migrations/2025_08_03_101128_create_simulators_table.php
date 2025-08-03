<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('simulators', function (Blueprint $table) {
            $table->id();
            $table->string('c_name');
            $table->string('t_name')->nullable();
            $table->text('issue_text');
            $table->text('solution_text')->nullable();
            $table->timestamp('date_occur')->useCurrent();
            $table->timestamp('date_fixed')->nullable();
            $table->string('sim_type');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulators');
    }
};
