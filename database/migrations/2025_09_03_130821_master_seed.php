<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterSeed extends Migration
{
    private $userSeed = [];
    public function __construct()
    {
        $this->userSeed = [
            [
                'name' => 'Muhammad Waris',
                'email' => 'wariszargardev@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
        ];

    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert($this->userSeed);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::table('users')->whereIn('email',
        array_map(function ($row){
            return $row['email'];
        },$this->userSeed))->delete();
    }
}
