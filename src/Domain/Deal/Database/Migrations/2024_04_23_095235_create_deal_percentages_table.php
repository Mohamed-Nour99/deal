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
        Schema::create('deal_percentages', function (Blueprint $table) {
            
			$table->id();
			$table->string('deal_percentage')->nullable();
            $table->integer('agent_id')->nullable();
            $table->foreignId('deal_id')->nullable()->constrained('deals')->nullOnDelete();
            $table->enum('type' , ['agent' , 'teamleader' , 'manager']);
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
        Schema::dropIfExists('deal_percentages');
    }
};
