<?php

// database/migrations/YYYY_MM_DD_create_role_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');  // Nama role
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('role');
    }
}

