<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins',function(Blueprint $table)
        {
        $table->increments('id'); 
        $table->string('first_name' , 100)->nullable(); 
        $table->string('last_name' , 100)->nullable(); 
        $table->integer('department_id');
        $table->string('username',100); 
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
        Schema::drop('admins');
    }
}
