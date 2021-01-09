<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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
    			'name' => 'employer',
    		],[
    			'name' => 'leader',
    		],
    	];
        $model = config('permission.models.role');
        foreach ($data as $role)
        {
        	$model::create($role);
        }
    }
}
