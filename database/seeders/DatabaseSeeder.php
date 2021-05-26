<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name'=>'Administrador','username'=>'ADMIN','password'=>Hash::make('G4M02021')]);
        DB::table('users')->insert(['name'=>'Dolores Franco','username'=>'DOFRANCO','password'=>Hash::make('DO123456')]);
        DB::table('users')->insert(['name'=>'Juan Paco','username'=>'JUPACO','password'=>Hash::make('JU123456')]);
        DB::table('users')->insert(['name'=>'Jorge Cox','username'=>'JOCOX','password'=>Hash::make('JO123456')]);
        DB::table('users')->insert(['name'=>'Amilcar Quispaya','username'=>'AMQUISPAYA','password'=>Hash::make('AM123456')]);
        DB::table('users')->insert(['name'=>'Pablo Pacheco','username'=>'PAPACHECO','password'=>Hash::make('PA123456')]);
        DB::table('users')->insert(['name'=>'Carola Ledezma','username'=>'CALEDEZMA','password'=>Hash::make('CA123456')]);
        DB::table('users')->insert(['name'=>'Jorje Cox Velazques','username'=>'JOCOX','password'=>Hash::make('JO123456')]);

        // \App\Models\User::factory(10)->create();
    }
}
