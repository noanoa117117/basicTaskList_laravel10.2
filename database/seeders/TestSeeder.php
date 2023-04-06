<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Timeline;
use App\Models\User;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Timeline::create([
            'id'=>'1',  
            'name'=>'TestUser',
            'subtitle'=>'ox資料 till 16',
            'body'=>'ooに提出'
        ]);
        User::create([
            'name'=>'TestUser',
            'email'=>'test@test.com',
            'password'=>\Hash::make('12345678'),
        ]);
         Timeline::create([
            'id'=>'2',  
            'name'=>'madship',
            'subtitle'=>'~と打ち合わせ at 13',
        ]);
        User::create([
            'name'=>'madship',
            'email'=>'test1@test.com',
            'password'=>\Hash::make('12345678'),
        ]);
        Timeline::create([
            'id'=>'3',  
            'name'=>'President',
            'subtitle'=>'ミーティング',
            'body'=>'多分'
        ]);
        User::create([
            'name'=>'President',
            'email'=>'test2@test.com',
            'password'=>\Hash::make('12345678'),
        ]);
    }
}
