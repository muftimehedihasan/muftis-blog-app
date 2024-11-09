<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('comments', function (Blueprint $table) {
        $table->boolean('is_approved')->default(false); // Adds 'is_approved' column with a default value of false
    });
}

public function down()
{
    Schema::table('comments', function (Blueprint $table) {
        $table->dropColumn('is_approved'); // Drops the 'is_approved' column if rolled back
    });
}

};
