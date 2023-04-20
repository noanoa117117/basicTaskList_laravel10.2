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
        User::create([
            'id'=>'1',  
            'name'=>'TestUser',
            'email'=>'test@test.com',
            'password'=>\Hash::make('12345678'),
        ]);
        Timeline::create([
            'id'=>'2',          
            'user_id'=>'1', 
            'name'=>'TestUser',
            'subtitle'=>'xx資料 till 16',
            'body'=>'ooに提出'
        ]);
        User::create([
            'id'=>'2',  
            'name'=>'president',
            'email'=>'test1@test.com',
            'password'=>\Hash::make('12345678'),
        ]);
        Timeline::create([
            'id'=>'3',          
            'user_id'=>'2', 
            'name'=>'president',
            'subtitle'=>'ooとミーティング on 11',
            'body'=>''
        ]);
     
       
    }
}
