<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'marcio',
                'email' => 'marcio@supreme.ind.br',
                'email_verified_at' => NULL,
                'password' => '$2y$10$LAugvZ8uiR/RIGnmiDARIOjK.w9bcoRuSLuPmeDszp55fb6fq7yzq',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'jaVEJ5gW4BlmMxy90jW5y1rIv1O7Df1m4l7XBGh40Tm0s22nEYWzJdUl6gyF',
                'current_team_id' => 1,
                'profile_photo_path' => NULL,
                'created_at' => '2020-10-08 07:35:05',
                'updated_at' => '2020-10-08 07:35:11',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Thainá',
                'email' => 'thaina@supreme.ind.br',
                'email_verified_at' => NULL,
                'password' => '$2y$10$79damXH5VA0AMIENGcaJJeBHYKpPGXuiqcquT7pd0kABiwVej3rcO',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'sbW08LYYInwjWyYalh6q4XrB34Dj7R1ZccEMl6Xgvyl7q40NeBprglmtSPoP',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-10-26 12:12:43',
                'updated_at' => '2020-10-26 12:12:43',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Rafaella',
                'email' => 'rafaella@supreme.ind.br',
                'email_verified_at' => NULL,
                'password' => '$2y$10$oZa2xoSw8OsxpSHFQf2qhOM9wbNscEr9CV7EaD8idwAzEYlx5VR6.',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-10-26 17:30:45',
                'updated_at' => '2020-10-26 17:30:45',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Brenda',
                'email' => 'brenda@supreme.ind.br',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Xk9kqhfqOZv/KGQQHQy40.W29LHkG9l1Cs38e/v9EQviP6rY6N.8.',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-10-26 18:25:33',
                'updated_at' => '2020-10-26 18:25:33',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Maria Goreti',
                'email' => 'mariagoretidosantos@outlook.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$72gK3pic5l4gSsYgs/5qxeIrfIzlMGOsNn38qkrTUUma0r6q/G90m',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'ax8CatDlKBoA06YTIK75m8G6NfFuJMMuUFPKyoxqM8NW85otjOGCsqDL9HRN',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-10-27 11:41:00',
                'updated_at' => '2020-10-27 11:41:00',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Hugo',
                'email' => 'hugo@supreme.ind.br',
                'email_verified_at' => NULL,
                'password' => '$2y$10$nMFdL.dS1DPkEyE5vKYAA.VjuJWBtK/hIC.QlenvOMjnYp30Q0sxK',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-10-27 18:28:13',
                'updated_at' => '2020-10-27 18:28:13',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Juliana Elisa dos Santos',
                'email' => 'julianasantos@supreme.ind.br',
                'email_verified_at' => NULL,
                'password' => '$2y$10$HA5QFEyWBLXrKAkVTdbE8eJ4fe7PvAAfOpZfS6v.j6SPJsK7F08QW',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-11-04 14:33:25',
                'updated_at' => '2020-11-04 14:33:25',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Karina Garcia',
                'email' => 'karina@supreme.ind.br',
                'email_verified_at' => NULL,
                'password' => '$2y$10$5YcUEv9hmkc2F78rESK4IOy2Slkxb43rr/BwizJ7BnDF7xPrmawl.',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'WTXjodE1l8VO2WP4axjYqcDHBlwOv15YGVeTH8SYKfT04Qi92kobifQxHr0i',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-11-05 14:36:52',
                'updated_at' => '2020-11-05 14:36:52',
            ),
        ));
        
        
    }
}