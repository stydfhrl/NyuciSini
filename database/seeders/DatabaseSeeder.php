<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        [
            'outlet_id' => '1',
            'nama' => 'atmin',
            'email' => 'admin@admin.com',
            'level' => 'admin',
            // 'avatar' => 'https://images.theconversation.com/files/500899/original/file-20221214-461-22jr1l.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop',
            'notelp' => '1234567890',
            'password' => Hash::make('123456'),
        ],
        [
            'outlet_id' => '1',
            'nama' => 'pakowner',
            'email' => 'owner@owner.com',
            'level' => 'owner',
            // 'avatar' => 'https://images.theconversation.com/files/500899/original/file-20221214-461-22jr1l.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop',
            'notelp' => '89898989',
            'password' => Hash::make('123456'),
        ],
        [
            'outlet_id' => '1',
            'nama' => 'careyawan',
            'email' => 'karyawan@karyawan.com',
            'level' => 'karyawan',
            // 'avatar' => 'https://images.theconversation.com/files/500899/original/file-20221214-461-22jr1l.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop',
            'notelp' => '5656656',
            'password' => Hash::make('123456'),
        ],
        ]);
    }
}
