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
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'Aufree';
        $user->email = 'aufree@yousails.com';
        $user->password = bcrypt('password');
        $user->is_admin = true;
        $user->save();
    }
}
