<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact_number')->unique();
            $table->string('password');
            $table->string('address');
            $table->integer('designation')->default(2);
            $table->rememberToken();
            $table->timestamps();
        });

        $data = array( 

            array('id'=>1, 'name'=>'admin', 'email'=>'admin@gamil.com', 'contact_number'=>'1234567890', 'password'=>'$2y$10$Oit8bjbR0k865Sd0b2e1wOO7h.4DFZzvsVg0e5Wa1uzEoUg5MYsmy', 'address'=>'Pune', 'designation'=>1)
        );

        User::insert($data);
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
