<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('technicians', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('position')->nullable();
            $table->string('name'); // Technician Name
            $table->date('date'); // Joining Date or Record Date
            $table->integer('quantity')->default(0);
            $table->text('description'); // Description of Work/Tools Assigned
            $table->string('ser_no')->nullable(); // Remove unique() // Serial Number (e.g., Equipment ID)
            $table->string('status'); // Active, Inactive, or Other Status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('technicians');
    }
};
