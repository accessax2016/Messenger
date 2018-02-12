<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //    for($i = 1; $i <= 3; $i++)
    	// {
    	// 	DB::table('rooms')->insert(
    	// 		[
    	// 			'name' => 'Room_'.$i,
    	// 			'image' => 'default.jpg',
    	// 			'user_id' => rand(1,3),
     //                'created_at' => Carbon::now(),
     //                'updated_at' => Carbon::now(),
    	// 		]
    	// 	);
    	// }
        DB::table('rooms')->insert([
            ['name' => 'Đại Sảnh', 'name_url' => changeTitle('Đại Sảnh'), 'image' => 'daisanh.jpg', 'user_id' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Hoa Sơn Luận Kiếm', 'name_url' => changeTitle('Hoa Sơn Luận Kiếm'), 'image' => 'hoasonluankiem.jpg', 'user_id' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Avenger', 'name_url' => changeTitle('Avenger'), 'image' => 'avenger.jpg', 'user_id' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Valentine', 'name_url' => changeTitle('Valentine'), 'image' => 'valentine.jpg', 'user_id' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Hội Buôn Dưa Lê', 'name_url' => changeTitle('Hội Buôn Dưa Lê'), 'image' => 'hoibuonduale.jpg', 'user_id' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Tiếq Việt', 'name_url' => changeTitle('Tiếq Việt'), 'image' => 'tieqviet.jpg', 'user_id' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]); 
    }
}
