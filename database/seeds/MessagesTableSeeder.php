<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 1000; $i++)
    	{
    		DB::table('messages')->insert(
    			[
    				'content' => 'Message_'.$i,
    				'user_id' => rand(2,11),
    				'room_id' => rand(2,6),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
    			]
    		);
    	}
    }
}
