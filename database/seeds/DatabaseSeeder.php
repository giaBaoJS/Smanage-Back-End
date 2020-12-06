<?php

use Illuminate\Database\Seeder;
// use DB;

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
        //     DB::table('user')->insert([
        //         'name'=>'doitac',
        //         'email'=>'doitac@gmail.com',
        //         'password'=>bcrypt('123123'),
        //         'phone'=>'+84363777249',
        //         'address'=>'Công viên phần mềm Quang Trung, Quận 12, TP. Hồ Chí Minh',
        //         'url_avatar'=>'doitac.png',
        //         'gender'=>'Nam',
        //         'role'=>1,
        //         'created_at' => new DateTime(), // ngày giờ hiện tại.
        //         'updated_at' => new DateTime()
        //     ]);

        DB::table('tinh')->insert([
            [
                'id_mien' => 1,
                'name_tinh' => 'Hà Giang'
            ],

            [
                'id_mien' => 1,
                'name_tinh' => 'Cao Bằng'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Bắc Kạn'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Lạng Sơn'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Thái Nguyên'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Phú Thọ'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Bắc Giang'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Quảng Ninh'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Bắc Ninh'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Hà Nam'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Hải Dương'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Hải Phòng'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Hưng Yên'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Nam Định'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Thái Bình'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Vĩnh Phúc'
            ],
            [
                'id_mien' => 1,
                'name_tinh' => 'Ninh Bình'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Thanh Hóa'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Nghệ An'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Hà Tĩnh'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Quãng Bình'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Quãng Trị'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Thừa Thiên Huế'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Đà Nẵng'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Quãng Nam'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Quãng Ngãi'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Bình Định'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Phú Yên'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Khánh Hòa'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Ninh Thuận'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Bình Thuận'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Kon Tum'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Gia Lai'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'ĐắK Lắk'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Đắk Nông'
            ],
            [
                'id_mien' => 2,
                'name_tinh' => 'Lâm Đồng'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Hồ Chí Minh'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Bà Rịa Vũng Tàu'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Bình Dương'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Bình Phước'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Đồng Nai'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Tây Ninh'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'An Giang'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Bạc Liêu'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Bến Tre'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Cà Mau'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Cần Thơ'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Đồng Tháp'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Hậu Giang'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Kiên Giang'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Long An'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Sóc Trăng'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Tiền Giang'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Trà Vinh'
            ],
            [
                'id_mien' => 3,
                'name_tinh' => 'Vĩnh Long'
            ],
        ]);
    }
}
