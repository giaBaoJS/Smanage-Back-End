<?php

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // DB::table('user')->insert([
        //     'name'=>'user',
        //     'email'=>'user@gmail.com',
        //     'password'=>bcrypt('123123'),
        //     'phone'=>'+84363777249',
        //     'address'=>'Công viên phần mềm Quang Trung, Quận 12, TP. Hồ Chí Minh',
        //     'url_avatar'=>'admin.png',
        //     'gender'=>'Nam',
        //     'role'=>0,
        //     'created_at' => new DateTime(), // ngày giờ hiện tại.
        //     'updated_at' => new DateTime()
        // ]);
        DB::table('user')->insert([
            'name'=>'doitac',
            'email'=>'doitac@gmail.com',
            'password'=>bcrypt('123123'),
            'phone'=>'+84363777249',
            'address'=>'Công viên phần mềm Quang Trung, Quận 12, TP. Hồ Chí Minh',
            'url_avatar'=>'doitac.png',
            'gender'=>'Nam',
            'role'=>1,
            'created_at' => new DateTime(), // ngày giờ hiện tại.
            'updated_at' => new DateTime()
        ]);
    }
}
