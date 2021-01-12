<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacation;

class VacationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		[
    			'start' => '2020-01-01',
    			'finish' => '2020-02-01',
    			'fix' => false,
    			'user_id' => 1,
    		],[
    			'start' => '2020-05-01',
    			'finish' => '2020-06-01',
    			'fix' => true,
    			'user_id' => 1,
    		]
    	];

    	foreach ($data as $vacation)
    	{
	        Vacation::create($vacation);
    	}
    }
}
