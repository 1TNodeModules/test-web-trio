<?php

namespace Database\Seeders;

use App\Models\Companies;
use App\Models\Persons;
use App\Models\Jobs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('companies')->truncate();
        DB::table('persons')->truncate();

        Companies::factory()->count(10)->create();
        Persons::factory()->count(10)->create();
        Jobs::factory()->count(5)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
