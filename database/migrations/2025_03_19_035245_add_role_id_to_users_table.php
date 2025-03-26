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
    Schema::table('users', function (Blueprint $table) {
        $table->unsignedBigInteger('role_id'); // Menambahkan kolom role_id
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade'); // Menambahkan relasi dengan tabel roles
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['role_id']); // Menghapus relasi
        $table->dropColumn('role_id'); // Menghapus kolom role_id
    });
}

};
