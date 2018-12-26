<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';

            $table->increments('id');

            $table->string('name');

            $table->string('nick')->unique();

            $table->date('birthday')->nullable();

            $table->string('about')->nullable();

            $table->string('sex', 10)->nullable();

            // $table->string('avatar', 255)->nullable();
            // $table->integer('image_id')->nullable(true);
            
            $table->string('email')->unique();
            
            $table->timestamp('email_verified_at')->nullable();
            
            $table->string('password');
            
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
