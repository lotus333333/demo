<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    //调用 call 方法来指定我们要运行假数据填充的文件。
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        Model::reguard();
    }
}
