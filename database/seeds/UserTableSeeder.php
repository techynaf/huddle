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
            'religion' => 'really?',
        ]);

        DB::table('users')->insert([
            'name' => 'HR',
            'status' => 'Permanent',
            'pin' => 109876,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 0,
            'employee_id' => 'something unique 2',
            'religion' => 'really?',
        ]);

        DB::table('users')->insert([
            'name' => 'District Manager',
            'status' => 'Permanent',
            'pin' => 543210,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 0,
            'employee_id' => 'something unique 3',
            'religion' => 'really?',
        ]);

        $pin = 1000;

        //Roastery Cafe
        DB::table('users')->insert([
            'name' => 'Md.Motiur Rahaman',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1016,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Most. Afroja Akter Ruma',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1031,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Shahriar Shihab',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1044,
            'religion' => 'Islam',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Md. Tanvir Khan',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1123,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Obaydur Rahman Emon',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1076,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Shabnoor Rahman Ovi',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1074,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Farah Nur',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1018,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Waris Hossain',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 3083,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Jamena Akter Rumi',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1106,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Nazifa Khatun Kajol',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1107,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Bidduth Das',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 3084,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Farjana Akter',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 1119,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Ayesha Akter Asha',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 3068,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Mohibul Hassan',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 3054,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Bikash Paul',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 3025,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Syed Nurnahar Alina',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 3079,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Mahfujur Rahman Shawon',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 3081,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Walnam William Hagidok',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 1,
            'employee_id' => 3082,
            'religion' => 'Islam',
        ]);

        //AISD
        DB::table('users')->insert([
            'name' => 'Luthfa Begum Pinky',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 2,
            'employee_id' => 1038,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Khorsid Alam',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 2,
            'employee_id' => 1039,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Ukhoching Chak',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 2,
            'employee_id' => 1128,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Touhid Islam',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 2,
            'employee_id' => 1034,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Sharmin Akter',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 2,
            'employee_id' => 3016,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Mousumi Akter',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 2,
            'employee_id' => 3017,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Joel Johnson Charles',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 2,
            'employee_id' => 3050,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Jonathan Freddy Charles',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 2,
            'employee_id' => 3051,
            'religion' => 'Islam',
        ]);

        //Lakeshore
        DB::table('users')->insert([
            'name' => 'Md. Jahirul Islam',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 3,
            'employee_id' => 1050,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Redowan Islam',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 3,
            'employee_id' => 1110,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Shaimon Ozha',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 3,
            'employee_id' => 3009,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Shahadat Hosen',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 3,
            'employee_id' => 3014,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Newaz Hossain Babu',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 3,
            'employee_id' => 3069,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Abdul Ahad Rabbi',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 3,
            'employee_id' => 3035,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Nazim Uddin (Sagor)',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 3,
            'employee_id' => 3074,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Shakil Mahmud',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 3,
            'employee_id' => 3052,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Jefree Sarkar',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 3,
            'employee_id' => 3078,
            'religion' => 'Islam',
        ]);

        //Apollo
        DB::table('users')->insert([
            'name' => 'Kingsley D Costa',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 1066,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Yeasin Islam',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 1017,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Faisal Khan (Emran)',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 1084,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Imran Hossain',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 1069,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Sanjoy Roy',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 1085,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Filip Barai',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 1147,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Zalalur Rahaman (Noyon)',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 1115,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Tonmoy Maximilian Corraya (Akash)',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 3001,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Nahid Hassan',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 3053,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Saed Farhad Faysal ',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 3058,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Mohammodur Rahaman Azad',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 3023,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Asif Hossain Khan',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 4,
            'employee_id' => 3055,
            'religion' => 'Islam',
        ]);

        //Cityscape
        DB::table('users')->insert([
            'name' => "Steve Jonathan D'Costa",
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 1052,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Shahidul Islam Parvez',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 1082,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Mong Thvi Cleing Marma',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 1059,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Loven Cornelius Costa',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 1116,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Austin Adhikary',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 1142,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Alamgir Hossain',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 1100,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'H.M.Robiul Islam',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 3010,
            'religion' => 'Islam',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Bitu Rudra',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 3033,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Jews Salchang Areng',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 3077,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Tofayel Hossen',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 3057,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Neamul Kabir Razu',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 1096,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Nayon',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 5,
            'employee_id' => 3075,
            'religion' => 'Islam',
        ]);

        //LK Tower
        DB::table('users')->insert([
            'name' => 'Md. Muhit Imtiaz Bhuiyan',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 1042,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Juwel Folia Justin',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 1083,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Oscar Daniel Thomas',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 1135,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Faisal Mia',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 1070,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Asik Iqbal',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 1148,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Protyasha Ghosh',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 3066,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Jahangir Alam Rahat',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 1075,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Raisul Islam ',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 3056,
            'religion' => 'Islam',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Mojesh Areng',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 3015,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Sabrina Anjum',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'employee_id' => 3067,
            'religion' => 'Islam',
        ]);

        //Dhanmondi
        DB::table('users')->insert([
            'name' => 'Md. Ibrahim Al-Mamun Ebu',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1043,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Sanchia Anindita Debnath',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1011,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Simon Shojib Khan',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1124,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Naomi Tuly Panday',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1144,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Mohammad Fahad Khan',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1102,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Mahbub',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 1118,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Imtiuz Ahammed',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 3018,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Aunty Chakma',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 3020,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Osman Gani Tito',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 3022,
            'religion' => 'Islam',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Mritunjoy Anthony Gregory',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 3030,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Shadbir Eaysir',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 3032,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Ansa Tasfiha Suhi',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 7,
            'employee_id' => 3070,
            'religion' => 'Islam',
        ]);

        //Ascott
        DB::table('users')->insert([
            'name' => 'Ponny Dey Procchad',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 8,
            'employee_id' => 1060,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Sujon Mia',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 8,
            'employee_id' => 1047,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Shanjid Hossain',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 8,
            'employee_id' => 1099,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Fokhrul Islam',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 8,
            'employee_id' => 3031,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Saziduzzaman Shohag Sazid',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 8,
            'employee_id' => 3012,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Md. Abir Ali',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 8,
            'employee_id' => 3073,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Naimur Rahman',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 8,
            'employee_id' => 3072,
            'religion' => 'Islam',
        ]);

        DB::table('users')->insert([
            'name' => 'Shah Ali',
            'status' => 'Permanent',
            'pin' => $pin++,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 8,
            'employee_id' => 1104,
            'religion' => 'Islam',
        ]);
    }
}
