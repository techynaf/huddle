<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //System Provided
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'status' => 'Permanent',
            'pin' => 1234567890,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 0,
            'employee_id' => 'something unique',
            'religion' => 'Not Applicable',
        ]);

        DB::table('users')->insert([
            'name' => 'HR',
            'status' => 'Permanent',
            'pin' => 109876,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 0,
            'employee_id' => 'something unique 2',
            'religion' => 'Not Applicable',
        ]);

        DB::table('users')->insert([
            'name' => 'District Manager',
            'status' => 'Permanent',
            'pin' => 543210,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 0,
            'employee_id' => 'something unique 3',
            'religion' => 'Not Applicable',
        ]);

        $pins = array(3579, 1000);

        //Accounts
        DB::table('users')->insert([
            'name' => 'Md. Khurshed Alam',
            'status' => 'Permanent',
            'pin' => 3579,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1001,
            'religion' => 'Islam',
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Synthia Dalia Baidya',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1002,
            'religion' => 'Christianity',
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Akil Mohammad',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1061,
            'religion' => 'Islam',
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Rezaul Islam Rasel',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1078,
            'religion' => 'Islam',
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Mostofa Hossain Farazi',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 3004,
            'religion' => 'Islam',
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Suraiya Hossain Dristy',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 3036,
            'religion' => 'Islam',
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Sharmin Akter',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 3038,
            'religion' => 'Islam',
        ]);

        //HR and Admin

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Shahriar Rupom',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 2,
            'employee_id' => 1062,
            'religion' => 'Islam',
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Wazida Afsana',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 2,
            'employee_id' => 1087,
            'religion' => 'Islam',
        ]);

        //Health and Safety

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Chapel Gregory Gonsalves',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 3,
            'employee_id' => 1013,
            'religion' => 'Christianity',
        ]);

        //Tech and Creative Media

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Noel Mannan',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 1143,
            'religion' => 'Christianity',
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Mehady Hasan',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 3011,
            'religion' => 'Islam',
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Shanjida Akter',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 1026,
            'religion' => 'Islam',
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Bhuban Gomes',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 1136,
            'religion' => 'Christianity',
        ]);

        //Roastery

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Asif Mohammad',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 1045,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Abdullah AL Noman',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 1089,
            'religion' => 'Islam'
        ]);

        //Marketing

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Rajuan Hasan',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 1030,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Salauddin Mohid Rafa',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 1057,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Rony Biswas',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 1048,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Imran Hossain Shawon',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 3007,
            'religion' => 'Islam'
        ]);

        //Staff Training & Development

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Faruk Hossain',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1036,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Maxim Argho',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1004,
            'religion' => 'Islam'
        ]);

        //Supply Chain Management

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Sugata Chakma',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1032,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Golam Mortuza',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1049,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Arif Mohammad',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1132,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Nazmul Hossen',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1010,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Emon Mia',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1129,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Pobetro DCosta',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1121,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Shohag Hossen',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1137,
            'religion' => 'Islam'
        ]);

        //Logistic & Distribution

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Masnad Yousuf (Tonmoy)',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 8,
            'employee_id' => 1113,
            'religion' => 'Islam'
        ]);

        //Facilities

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Kabir Hossen',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 9,
            'employee_id' => 1028,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Al Mamun',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 9,
            'employee_id' => 1134,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'John Tripura',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 9,
            'employee_id' => 3026,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Swylen Mowali',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 9,
            'employee_id' => 3059,
            'religion' => 'Islam'
        ]);

        //Driver

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Novel Kanti Barua',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 9,
            'employee_id' => 1029,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Mominul Islam',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 9,
            'employee_id' => 1023,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Rofique Khan',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 9,
            'employee_id' => 1071,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Yeasin Sardar',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 9,
            'employee_id' => 1092,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Libion Bazi',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 9,
            'employee_id' => 1138,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Murad Mondol',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 9,
            'employee_id' => 3047,
            'religion' => 'Islam'
        ]);

        //Cleaner

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Junayad Bhuyan',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 10,
            'employee_id' => 1130,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Amzad Hossain Mollah',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 10,
            'employee_id' => 1056,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Abdul Khalek',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 10,
            'employee_id' => 1025,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Selim',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 10,
            'employee_id' => 3048,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Dobir Uddin',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 10,
            'employee_id' => 1111,
            'religion' => 'Islam'
        ]);

        //Roastery & Cafe

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Motiur',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1016,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Most. Afroja Akter Ruma',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1031,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Shahriar Shihab',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1044,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Tanvir Khan',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1123,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Obaydur Rahman Emon',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1076,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Shabnoor Rahman Ovi',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1074,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Farah Nur',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1018,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Jamena Akter Rumi',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1106,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Nazifa Khatun Kajol',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1107,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Farjana Akter',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1119,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Ayesha Akter Ashar',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3068,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Mohibul Hassan',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3054,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Bikash Paul',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3025,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Syed Nurnahar Alina',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3079,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Mahfujur Rahman Shawon',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3081,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Walnam William Hagidok',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3082,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Waris Hossain',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3083,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Bidduth Das',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3084,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Suruj',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1009,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Fazle Rabbi Alamin',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1122,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Faisal Ahmed (Konok)',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1145,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Saiful',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 1146,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Shaon Hossain',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3006,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Dipto Chakma',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3046,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Jahanggir Hossain',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3061,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Shakil Hossain',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3060,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Md. Rakibul Hassan Jwel',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3076,
            'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins));

        DB::table('users')->insert([
            'name' => 'Tufail Ahmed Sakib',
            'status' => 'Permanent',
            'pin' => $pins[sizeof($pins) - 1],
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 3080,
            'religion' => 'Islam'
        ]);

        //AISD Branch

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Luthfa Begum Pinky',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 12,
        'employee_id' => 1037,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Khorsid Alam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 12,
        'employee_id' => 1039,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Ukhoching Chak',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 12,
        'employee_id' => 1128,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Touhid Islam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 12,
        'employee_id' => 1034,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Sharmin Akter',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 12,
        'employee_id' => 3016,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Mousumi Akter',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 12,
        'employee_id' => 3017,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Joel Johnson Charles',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 12,
        'employee_id' => 3050,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Jonathan Freddy Charles',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 12,
        'employee_id' => 3051,
        'religion' => 'Islam'
        ]);

        //Lakeshore Branch

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Jahirul Islam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 13,
        'employee_id' => 1050,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Redowan Islam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 13,
        'employee_id' => 1110,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Shaimon Ozha',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 13,
        'employee_id' => 3009,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Shahadat Hosen',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 13,
        'employee_id' => 3014,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Newaz Hossain Babu',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 13,
        'employee_id' => 3069,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Abdul Ahad Rabbi',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 13,
        'employee_id' => 3035,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Nazim Uddin (Sagor)',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 13,
        'employee_id' => 3074,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Shakil Mahmud',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 13,
        'employee_id' => 3052,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Jefree Sarkar',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 13,
        'employee_id' => 3078,
        'religion' => 'Islam'
        ]);

        //Apollo Branch

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Kingsley D Costa',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 1066,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Yeasin Islam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 1017,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Faisal Khan (Emran)',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 1084,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Imran Hossain',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 1069,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Sanjoy Roy',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 1085,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Filip Barai',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 1147,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Zalalur Rahaman (Noyon)',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 1115,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Tonmoy Maximilian Corraya (Akash)',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 3001,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Nahid Hassan',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 3053,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Saed Farhad Faysal',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 3058,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Mohammodur Rahaman Azad',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 3023,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Asif Hossain Khan',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 14,
        'employee_id' => 3055,
        'religion' => 'Islam'
        ]);

        //Cityscape Branch

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Steve Jonathan DCosta',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 1052,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Shahidul Islam Parvez',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 1082,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Mong Thvi Cleing Marma',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 1059,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Loven Cornelius Costa',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 1116,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Austin Adhikary',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 1142,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Alamgir Hossain',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 1100,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'H.M.Robiul Islam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 3010,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Bitu Rudra',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 3033,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Tofayel Hossen',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 3057,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Neamul Kabir Razu',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 1096,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Nayon',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 3075,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Jews Salchang Areng',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 3077,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Shakil',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 3013,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Mahabub Alam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 3040,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Firoz Ahmed',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 1068,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Tipu Sultan',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 15,
        'employee_id' => 1088,
        'religion' => 'Islam'
        ]);

        //L.K. Tower Branch

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Muhit Imtiaz Bhuiyan',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 1042,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Juwel Folia Justin',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 1083,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Oscar Daniel Thomas',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 1135,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Faisal Mia',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 1070,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Asik Iqbal',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 1148,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Protyasha Ghosh',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 3066,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Jahangir Alam Rahat',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 1075,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Raisul Islam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 3056,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Mojesh Areng',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 3015,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Sabrina Anjum',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 3067,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Mikail',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 3063,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Tonil Mangsang',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 3064,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Shohanur Rahman Sagor',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 3039,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Rakibul Hasan',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 16,
        'employee_id' => 3062,
        'religion' => 'Islam'
        ]);

        //Dhanmondi Branch

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Ibrahim Al-Mamun Ebu',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 1043,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Sanchia Anindita Debnath',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 1011,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Simon Shojib Khan',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 1124,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Naomi Tuly Panday',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 1144,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Mohammad Fahad Khan',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 1102,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Mahbub',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 1118,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => ' Imtiuz Ahammed',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3018,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Aunty Chakma',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3020,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Osman Gani Tito',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3022,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Mritunjoy Anthony Gregory',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3030,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Shadbir Eaysir',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3032,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Ansa Tasfiha Suhi',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3070,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Shajjad Hossain Bosunia',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 1103,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Tarek Jamil',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3027,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Nur Hossain',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3028,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Shojib Hossain Nirob',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3029,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Ashraful Islam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3041,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Jaseng Chambugong',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3042,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Rihad Uddin Himel',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 17,
        'employee_id' => 3043,
        'religion' => 'Islam'
        ]);

        //Ascot Branch

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Ponny Dey Procchad',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 18,
        'employee_id' => 1060,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Sujon Mia',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 18,
        'employee_id' => 1047,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Shanjid Hossain',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 18,
        'employee_id' => 1099,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Fokhrul Islam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 18,
        'employee_id' => 3031,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Saziduzzaman Shohag Sazid',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 18,
        'employee_id' => 3012,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Abir Ali',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 18,
        'employee_id' => 3073,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Naimur Rahman',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 18,
        'employee_id' => 3072,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Shah Ali',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 18,
        'employee_id' => 1104,
        'religion' => 'Islam'
        ]);

        //Pastry

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Shohag Hossain',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1003,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Jewel Rana',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1063,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Trisita Chiran',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1005,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Munjuri Rangsa',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1012,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Pretty Cheran',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1007,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Zakia Sultana',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1015,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Dipti Rani',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1064,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Saiful Islam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1095,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Karuna Bidhan Chakma',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1094,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Shimon Sikder',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1126,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Mohammad Sumon',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1149,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Shafiqul Islam',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 3005,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Mamun Sarker',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 19,
        'employee_id' => 1117,
        'religion' => 'Islam'
        ]);

        //Secrity Guard

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Syed Ahamed',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 20,
        'employee_id' => 1020,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Dilip Mallick',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 20,
        'employee_id' => 1008,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Morshed Ali',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 20,
        'employee_id' => 1073,
        'religion' => 'Islam'
        ]);

        array_push($pins, $this->create($pins)); 

        DB::table('users')->insert([
        'name' => 'Md. Samad',
        'status' => 'Permanent',
        'pin' => $pins[sizeof($pins) - 1],
        'password' => bcrypt('bangladesh'),
        'branch_id' => 20,
        'employee_id' => 1081,
        'religion' => 'Islam'
        ]);

    }

    public function create ($pins)
    {
        $flag = false;
        $x = 1000;

        while (true) {
            $x = rand(1000, 9999);

            for ($i = 0; $i < sizeof($pins); $i++) {
                if ($pins[$i] == $x) {
                    $flag = true;
                    break;
                }
            }

            if (!$flag) {
                break;
            }
            
            $flag = false;
        }

        return $x;
    }
}
