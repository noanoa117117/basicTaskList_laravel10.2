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
              'subtitle'=>'あああああああ',
        ]);
        User::create([
            
            'name'=>'TestUser',
            'email'=>'test@test.com',
            'password'=>\Hash::make('12345678'),
        ]);

         Timeline::create([
            'id'=>'2',  
              'name'=>'madship',
              'subtitle'=>'いいね',
        ]);
        User::create([
            
            'name'=>'TestUser',
            'email'=>'test1@test.com',
            'password'=>\Hash::make('12345678'),
        ]);
    }
}
