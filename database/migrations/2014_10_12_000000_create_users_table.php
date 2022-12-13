<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable(false);
            $table->string('owner_name')->nullable(false);
            $table->string('key')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('url')->nullable(false);
            $table->string('remarks')->nullable();
            $table->string('project_code')->nullable();
            $table->string('service_code')->nullable();

            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
