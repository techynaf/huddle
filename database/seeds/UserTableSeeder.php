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
            'gender' => 'Male',
            'status' => 'Permanent',
            'pin' => 1234567890,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 'something unique',
            'religion' => 'Not Applicable',
            'designation_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'MD',
            'gender' => 'Male',
            'status' => 'Permanent',
            'pin' => 987654321,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 2,
            'employee_id' => 'something unique 2',
            'religion' => 'Not Applicable',
            'designation_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'HOD',
            'gender' => 'Male',
            'status' => 'Permanent',
            'pin' => 109876,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 'something unique 3',
            'religion' => 'Not Applicable',
            'designation_id' => 5,
        ]);

        DB::table('users')->insert([
            'name' => 'Area Man',
            'gender' => 'Male',
            'status' => 'Permanent',
            'pin' => 543210,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 11,
            'employee_id' => 'something unique 4',
            'religion' => 'Not Applicable',
            'designation_id' => 4,
        ]);

        DB::table('users')->insert([
            'name' => 'Manager',
            'gender' => 'Male',
            'status' => 'Permanent',
            'pin' => 1235,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 'something unique 5',
            'religion' => 'Not Applicable',
            'designation_id' => 6,
        ]);
        
        DB::table('users')->insert([
            'name' => 'Barista',
            'gender' => 'Female',
            'status' => 'Permanent',
            'pin' => 1234,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 'something unique 6',
            'religion' => 'Not Applicable',
            'designation_id' => 9,
        ]);

        // DB::table('users')->insert([
        //     'name' => 'District Manager',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => 543210,
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 0,
        //     'employee_id' => 'something unique 3',
        //     'religion' => 'Not Applicable',
        // ]);

        // $pins = array(3579, 1000);

        // //Accounts
        // DB::table('users')->insert([
        //     'name' => 'Md. Khurshed Alam',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => 3579,
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 1,
        //     'employee_id' => 1001,
        //     'religion' => 'Islam',
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Synthia Dalia Baidya',
        //     'gender' => 'Female',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 1,
        //     'employee_id' => 1002,
        //     'religion' => 'Christianity',
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Akil Mohammad',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 1,
        //     'employee_id' => 1061,
        //     'religion' => 'Islam',
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Rezaul Islam Rasel',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 1,
        //     'employee_id' => 1078,
        //     'religion' => 'Islam',
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Mostofa Hossain Farazi',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 1,
        //     'employee_id' => 3004,
        //     'religion' => 'Islam',
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Suraiya Hossain Dristy',
        //     'gender' => 'Female',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 1,
        //     'employee_id' => 3036,
        //     'religion' => 'Islam',
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Sharmin Akter',
        //     'gender' => 'Female',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 1,
        //     'employee_id' => 3038,
        //     'religion' => 'Islam',
        // ]);

        // //HR and Admin

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Shahriar Rupom',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 2,
        //     'employee_id' => 1062,
        //     'religion' => 'Islam',
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Wazida Afsana',
        //     'gender' => 'Female',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 2,
        //     'employee_id' => 1087,
        //     'religion' => 'Islam',
        // ]);

        // //Health and Safety

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Chapel Gregory Gonsalves',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 3,
        //     'employee_id' => 1013,
        //     'religion' => 'Christianity',
        // ]);

        // //Tech and Creative Media

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Noel Mannan',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 4,
        //     'employee_id' => 1143,
        //     'religion' => 'Christianity',
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Mehady Hasan',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 4,
        //     'employee_id' => 3011,
        //     'religion' => 'Islam',
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Shanjida Akter',
        //     'gender' => 'Female',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 4,
        //     'employee_id' => 1026,
        //     'religion' => 'Islam',
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Bhuban Gomes',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 4,
        //     'employee_id' => 1136,
        //     'religion' => 'Christianity',
        // ]);

        // //Roastery

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Asif Mohammad',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 5,
        //     'employee_id' => 1045,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Abdullah AL Noman',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 5,
        //     'employee_id' => 1089,
        //     'religion' => 'Islam'
        // ]);

        // //Marketing

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Rajuan Hasan',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 6,
        //     'employee_id' => 1030,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Salauddin Mohid Rafa',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 6,
        //     'employee_id' => 1057,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Rony Biswas',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 6,
        //     'employee_id' => 1048,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Imran Hossain Shawon',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 6,
        //     'employee_id' => 3007,
        //     'religion' => 'Islam'
        // ]);

        // //Staff Training & Development

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Faruk Hossain',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 7,
        //     'employee_id' => 1036,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Maxim Argho',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 7,
        //     'employee_id' => 1004,
        //     'religion' => 'Islam'
        // ]);

        // //Supply Chain Management

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Sugata Chakma',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 7,
        //     'employee_id' => 1032,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Golam Mortuza',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 7,
        //     'employee_id' => 1049,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Arif Mohammad',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 7,
        //     'employee_id' => 1132,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Nazmul Hossen',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 7,
        //     'employee_id' => 1010,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Emon Mia',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 7,
        //     'employee_id' => 1129,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Pobetro DCosta',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 7,
        //     'employee_id' => 1121,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Shohag Hossen',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 7,
        //     'employee_id' => 1137,
        //     'religion' => 'Islam'
        // ]);

        // //Logistic & Distribution

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Masnad Yousuf (Tonmoy)',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 8,
        //     'employee_id' => 1113,
        //     'religion' => 'Islam'
        // ]);

        // //Facilities

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Kabir Hossen',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 9,
        //     'employee_id' => 1028,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Al Mamun',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 9,
        //     'employee_id' => 1134,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'John Tripura',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 9,
        //     'employee_id' => 3026,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Swylen Mowali',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 9,
        //     'employee_id' => 3059,
        //     'religion' => 'Islam'
        // ]);

        // //Driver

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Novel Kanti Barua',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 9,
        //     'employee_id' => 1029,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Mominul Islam',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 9,
        //     'employee_id' => 1023,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Rofique Khan',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 9,
        //     'employee_id' => 1071,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Yeasin Sardar',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 9,
        //     'employee_id' => 1092,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Libion Bazi',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 9,
        //     'employee_id' => 1138,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Murad Mondol',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 9,
        //     'employee_id' => 3047,
        //     'religion' => 'Islam'
        // ]);

        // //Cleaner

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Junayad Bhuyan',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 10,
        //     'employee_id' => 1130,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Amzad Hossain Mollah',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 10,
        //     'employee_id' => 1056,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Abdul Khalek',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 10,
        //     'employee_id' => 1025,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Selim',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 10,
        //     'employee_id' => 3048,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Dobir Uddin',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 10,
        //     'employee_id' => 1111,
        //     'religion' => 'Islam'
        // ]);

        // //Roastery & Cafe

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Motiur',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1016,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Most. Afroja Akter Ruma',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1031,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Shahriar Shihab',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1044,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Tanvir Khan',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1123,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Obaydur Rahman Emon',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1076,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Shabnoor Rahman Ovi',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1074,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Farah Nur',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1018,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Jamena Akter Rumi',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1106,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Nazifa Khatun Kajol',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1107,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Farjana Akter',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1119,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Ayesha Akter Ashar',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3068,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Mohibul Hassan',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3054,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Bikash Paul',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3025,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Syed Nurnahar Alina',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3079,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Mahfujur Rahman Shawon',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3081,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Walnam William Hagidok',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3082,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Waris Hossain',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3083,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Bidduth Das',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3084,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Suruj',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1009,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Fazle Rabbi Alamin',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1122,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Faisal Ahmed (Konok)',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1145,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Saiful',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 1146,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Shaon Hossain',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3006,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Dipto Chakma',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3046,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Jahanggir Hossain',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3061,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Shakil Hossain',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3060,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Md. Rakibul Hassan Jwel',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3076,
        //     'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins));

        // DB::table('users')->insert([
        //     'name' => 'Tufail Ahmed Sakib',
        //     'gender' => 'Male',
        //     'status' => 'Permanent',
        //     'pin' => $pins[sizeof($pins) - 1],
        //     'password' => bcrypt('bangladesh'),
        //     'branch_id' => 11,
        //     'employee_id' => 3080,
        //     'religion' => 'Islam'
        // ]);

        // //AISD Branch

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Luthfa Begum Pinky',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 12,
        // 'employee_id' => 1037,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Khorsid Alam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 12,
        // 'employee_id' => 1039,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Ukhoching Chak',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 12,
        // 'employee_id' => 1128,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Touhid Islam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 12,
        // 'employee_id' => 1034,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Sharmin Akter',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 12,
        // 'employee_id' => 3016,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Mousumi Akter',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 12,
        // 'employee_id' => 3017,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Joel Johnson Charles',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 12,
        // 'employee_id' => 3050,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Jonathan Freddy Charles',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 12,
        // 'employee_id' => 3051,
        // 'religion' => 'Islam'
        // ]);

        // //Lakeshore Branch

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Jahirul Islam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 13,
        // 'employee_id' => 1050,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Redowan Islam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 13,
        // 'employee_id' => 1110,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Shaimon Ozha',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 13,
        // 'employee_id' => 3009,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Shahadat Hosen',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 13,
        // 'employee_id' => 3014,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Newaz Hossain Babu',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 13,
        // 'employee_id' => 3069,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Abdul Ahad Rabbi',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 13,
        // 'employee_id' => 3035,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Nazim Uddin (Sagor)',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 13,
        // 'employee_id' => 3074,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Shakil Mahmud',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 13,
        // 'employee_id' => 3052,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Jefree Sarkar',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 13,
        // 'employee_id' => 3078,
        // 'religion' => 'Islam'
        // ]);

        // //Apollo Branch

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Kingsley D Costa',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 1066,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Yeasin Islam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 1017,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Faisal Khan (Emran)',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 1084,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Imran Hossain',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 1069,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Sanjoy Roy',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 1085,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Filip Barai',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 1147,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Zalalur Rahaman (Noyon)',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 1115,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Tonmoy Maximilian Corraya (Akash)',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 3001,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Nahid Hassan',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 3053,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Saed Farhad Faysal',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 3058,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Mohammodur Rahaman Azad',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 3023,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Asif Hossain Khan',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 14,
        // 'employee_id' => 3055,
        // 'religion' => 'Islam'
        // ]);

        // //Cityscape Branch

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Steve Jonathan DCosta',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 1052,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Shahidul Islam Parvez',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 1082,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Mong Thvi Cleing Marma',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 1059,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Loven Cornelius Costa',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 1116,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Austin Adhikary',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 1142,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Alamgir Hossain',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 1100,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'H.M.Robiul Islam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 3010,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Bitu Rudra',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 3033,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Tofayel Hossen',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 3057,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Neamul Kabir Razu',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 1096,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Nayon',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 3075,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Jews Salchang Areng',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 3077,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Shakil',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 3013,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Mahabub Alam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 3040,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Firoz Ahmed',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 1068,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Tipu Sultan',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 15,
        // 'employee_id' => 1088,
        // 'religion' => 'Islam'
        // ]);

        // //L.K. Tower Branch

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Muhit Imtiaz Bhuiyan',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 1042,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Juwel Folia Justin',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 1083,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Oscar Daniel Thomas',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 1135,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Faisal Mia',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 1070,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Asik Iqbal',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 1148,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Protyasha Ghosh',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 3066,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Jahangir Alam Rahat',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 1075,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Raisul Islam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 3056,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Mojesh Areng',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 3015,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Sabrina Anjum',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 3067,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Mikail',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 3063,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Tonil Mangsang',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 3064,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Shohanur Rahman Sagor',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 3039,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Rakibul Hasan',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 16,
        // 'employee_id' => 3062,
        // 'religion' => 'Islam'
        // ]);

        // //Dhanmondi Branch

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Ibrahim Al-Mamun Ebu',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 1043,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Sanchia Anindita Debnath',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 1011,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Simon Shojib Khan',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 1124,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Naomi Tuly Panday',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 1144,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Mohammad Fahad Khan',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 1102,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Mahbub',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 1118,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => ' Imtiuz Ahammed',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3018,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Aunty Chakma',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3020,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Osman Gani Tito',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3022,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Mritunjoy Anthony Gregory',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3030,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Shadbir Eaysir',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3032,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Ansa Tasfiha Suhi',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3070,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Shajjad Hossain Bosunia',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 1103,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Tarek Jamil',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3027,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Nur Hossain',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3028,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Shojib Hossain Nirob',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3029,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Ashraful Islam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3041,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Jaseng Chambugong',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3042,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Rihad Uddin Himel',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 17,
        // 'employee_id' => 3043,
        // 'religion' => 'Islam'
        // ]);

        // //Ascot Branch

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Ponny Dey Procchad',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 18,
        // 'employee_id' => 1060,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Sujon Mia',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 18,
        // 'employee_id' => 1047,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Shanjid Hossain',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 18,
        // 'employee_id' => 1099,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Fokhrul Islam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 18,
        // 'employee_id' => 3031,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Saziduzzaman Shohag Sazid',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 18,
        // 'employee_id' => 3012,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Abir Ali',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 18,
        // 'employee_id' => 3073,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Naimur Rahman',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 18,
        // 'employee_id' => 3072,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Shah Ali',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 18,
        // 'employee_id' => 1104,
        // 'religion' => 'Islam'
        // ]);

        // //Pastry

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Shohag Hossain',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1003,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Jewel Rana',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1063,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Trisita Chiran',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1005,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Munjuri Rangsa',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1012,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Pretty Cheran',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1007,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Zakia Sultana',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1015,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Dipti Rani',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1064,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Saiful Islam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1095,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Karuna Bidhan Chakma',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1094,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Shimon Sikder',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1126,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Mohammad Sumon',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1149,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Shafiqul Islam',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 3005,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Mamun Sarker',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 19,
        // 'employee_id' => 1117,
        // 'religion' => 'Islam'
        // ]);

        // //Secrity Guard

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Syed Ahamed',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 20,
        // 'employee_id' => 1020,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Dilip Mallick',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 20,
        // 'employee_id' => 1008,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Morshed Ali',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 20,
        // 'employee_id' => 1073,
        // 'religion' => 'Islam'
        // ]);

        // array_push($pins, $this->create($pins)); 

        // DB::table('users')->insert([
        // 'name' => 'Md. Samad',
        // 'gender' => 'Male',
        // 'status' => 'Permanent',
        // 'pin' => $pins[sizeof($pins) - 1],
        // 'password' => bcrypt('bangladesh'),
        // 'branch_id' => 20,
        // 'employee_id' => 1081,
        // 'religion' => 'Islam'
        // ]);

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
