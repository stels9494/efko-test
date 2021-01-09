<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
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
        		'user' => [
	        		'name' => 'Работник 1',
	        		'email' => 'employer.1@efko.ru',
	        		'email_verified_at' => now(),
	        		'password' => bcrypt('123456'),
        		],
        		'role' => 'employer',
        	],[
        		'user' => [
	        		'name' => 'Работник 2',
	        		'email' => 'employer.2@efko.ru',
	        		'email_verified_at' => now(),
	        		'password' => bcrypt('123456'),
        		],
        		'role' => 'employer',
        	],[
        		'user' => [
	        		'name' => 'Работник 3',
	        		'email' => 'employer.3@efko.ru',
	        		'email_verified_at' => now(),
	        		'password' => bcrypt('123456'),
        		],
        		'role' => 'employer',
        	],[
        		'user' => [
	        		'name' => 'Руководитель',
	        		'email' => 'leader@efko.ru',
	        		'email_verified_at' => now(),
	        		'password' => bcrypt('123456'),
        		],
        		'role' => 'leader',
        	],
        ];

        foreach ($data as $datum)
        {
        	$user = User::create($datum['user']);
        	$user->assignRole($datum['role']);
        }
    }
}
