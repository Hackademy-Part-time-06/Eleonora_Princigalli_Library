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
        Schema::table('categories', function (Blueprint $table) {

            $table->unsignedBigInteger('book_id'); 

            $table->foreign('book_id') //Setto la chiave esterna presente nella tabella categories
                ->references('id') //Specifico la chiave primaria di book
                ->on('books'); //Nome tabella di referenza
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('book_id');
            $table->dropForeign('book_id');
        });
    }
};
