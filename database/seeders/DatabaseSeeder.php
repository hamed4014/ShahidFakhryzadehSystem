<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0 ; $i < 100 ; $i++)
        {
            \App\Models\Group::create([
                "name" => "حلقه"."$i",
                "teacher" => "آقای"."$i",
            ]);
        }

        \App\Models\User::create([
            "national_code" => "0890629323",
            "fname" => "حامد",
            "lname" => "محمدزاده",
            "father" => "علی اصغر",
            "birthday" => "1381/11/$i",
            "group_id" => 1
        ]);

        \App\Models\Admin::create([
            "user_id" => 1,
            "username" => "0890629323",
            "password" => Hash::make("123456")
        ]);

        for ($i = 0 ; $i < 25 ; $i++)
        {
            \App\Models\User::create([
                "national_code" => "081062932"."$i",
                "fname" => "حامد"."$i",
                "lname" => "محمدزاده"."$i",
                "father" => "علی اصغر"."$i",
                "birthday" => "1381/11/$i",
                "group_id" => 2
            ]);

            \App\Models\Admin::create([
                "user_id" => $i+2,
                "username" => "081062932"."$i",
                "password" => Hash::make("123456")
            ]);
        }
        for ($i = 25 ; $i < 50 ; $i++)
        {
            \App\Models\User::create([
                "national_code" => "081062932"."$i",
                "fname" => "حامد"."$i",
                "lname" => "محمدزاده"."$i",
                "father" => "علی اصغر"."$i",
                "birthday" => "1381/11/$i",
                "group_id" => 3
            ]);

            \App\Models\Admin::create([
                "user_id" => $i+2,
                "username" => "081062932"."$i",
                "password" => Hash::make("123456")
            ]);
        }
        for ($i = 50 ; $i < 75 ; $i++)
        {
            \App\Models\User::create([
                "national_code" => "081062932"."$i",
                "fname" => "حامد"."$i",
                "lname" => "محمدزاده"."$i",
                "father" => "علی اصغر"."$i",
                "birthday" => "1381/11/$i",
                "group_id" => 4
            ]);

            \App\Models\Admin::create([
                "user_id" => $i+2,
                "username" => "081062932"."$i",
                "password" => Hash::make("123456")
            ]);
        }
        for ($i = 75 ; $i < 100 ; $i++)
        {
            \App\Models\User::create([
                "national_code" => "081062932"."$i",
                "fname" => "حامد"."$i",
                "lname" => "محمدزاده"."$i",
                "father" => "علی اصغر"."$i",
                "birthday" => "1381/11/$i",
                "group_id" => 5
            ]);

            \App\Models\Admin::create([
                "user_id" => $i+2,
                "username" => "081062932"."$i",
                "password" => Hash::make("123456")
            ]);
        }
    }
}
