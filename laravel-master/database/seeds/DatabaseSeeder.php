<?php

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call('Themthanhvien');
    }

    /**
     * 
     */
  
}

  class Themthanhvien extends Seeder
    {
    	public function run()
	    {
	        DB::table('thanh_vien')->insert([
	        	['user' => 'hung0310pro','password' => Hash::make('hung0310pro'),'level' => 1],
	        	['user' => 'vantuan','password' => Hash::make('vantuan'),'level' => 2],
	        	['user' => 'dinhdao','password' => Hash::make('dinhdao'),'level' => 3],
	        ]);
	    }
    
    }

    //php artisan db:seed
