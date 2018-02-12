<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// for($i = 1; $i <= 3; $i++)
    	// {
    	// 	DB::table('users')->insert(
    	// 		[
    	// 			'name' => 'User_'.$i,
    	// 			'about' => 'Hi, I am User_'.$i,
    	// 			'image' => 'default.jpg',
    	// 			'email' => 'user_'.$i.'@gmail.com',
    	// 			'password' => bcrypt('123456'),
     //                'created_at' => Carbon::now(),
     //                'updated_at' => Carbon::now(),
    	// 		]
    	// 	);
    	// }
        DB::table('users')->insert([
            ['name' => 'Thanh Tùng', 'image' => 'thanhtung.jpg', 'email' => 'thanhtung@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Quách Tĩnh', 'image' => 'quachtinh.jpg', 'email' => 'quachtinh@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Hoàng Dung', 'image' => 'hoangdung.jpg', 'email' => 'hoangdung@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Iron Man', 'image' => 'ironman.jpg', 'email' => 'ironman@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Captain America', 'image' => 'captainamerica.jpg', 'email' => 'captainamerica@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Black Panther', 'image' => 'blackpanther.jpg', 'email' => 'blackpanther@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Spider Man', 'image' => 'spiderman.jpg', 'email' => 'spiderman@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Soái Ca Áo Trắng', 'image' => 'soaicaaotrang.jpg', 'email' => 'soaicaaotrang@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Soái Ca Áo Đen', 'image' => 'soaicaaoden.jpg', 'email' => 'soaicaaoden@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Cô Năm AK47', 'image' => 'conamak47.jpg', 'email' => 'conamak47@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bác Ba Kar98', 'image' => 'bacbakar98.jpg', 'email' => 'bacbakar98@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
   }
}
