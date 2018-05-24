<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//users----------------------------------------------------------------------------------------------------------------
        DB::table('users')->insert([
            'first_name' => 'ivan',
            'last_name' => 'ivic',
            'email' => 'ivan@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'admin',
            'rfid' => '85 1A 2C 2C',
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'marko',
            'last_name' => 'markovic',
            'email' => 'marko@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'user',
            'rfid' => 'CC 49 B6 21',
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'pero',
            'last_name' => 'perkovic',
            'email' => 'pero@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'user',
            'rfid' => 'DA 13 F6 42',
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'alen',
            'last_name' => 'alenovic',
            'email' => 'alen@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'user',
            'rfid' => 'A4 B4 1A 6Z',
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'luka',
            'last_name' => 'lukic',
            'email' => 'luka@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'user',
            'rfid' => 'H5 G1 GA VL',
            'created_at' => now(),
        ]);

//logins---------------------------------------------------------------------------------------------------------------
        for($i = 1; $i < 6; $i++){
            for($j = 1; $j < 6; $j++){
                for($k=1; $k<=30; $k++){
                    DB::table('logins')->insert([
                        'user_id' => $i,
                        'room_id' => $j,
                        'time' => \Carbon\Carbon::createFromFormat('Y-m-d H', '2018-05-21 08')->addDays($k)->addMinutes(rand(-20, 20)),
                    ]);
                }
            }
        }
        for($i = 1; $i <= 10; $i++){
            DB::table('rooms')->insert([
                'name' => 'Soba '.$i
            ]);
        }
    }
}