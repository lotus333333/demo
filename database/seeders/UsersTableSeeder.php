<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 创建假用户
     */
    public function run(): void
    {
        User::factory()->count(50)->create();
        $user=User::find(1);
        $user->name='Summer';
        $user->email='summer@gmail.com';
        $user->save();
    }
}
