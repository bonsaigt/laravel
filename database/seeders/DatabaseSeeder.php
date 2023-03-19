<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\PermissionsSeeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();

        $this->call([
            PermissionsSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
