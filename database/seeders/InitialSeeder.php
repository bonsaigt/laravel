<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\PermissionsSeeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();

        $this->call([
            PermissionsSeeder::class,
        ]);

        $user           = new User();
        $user->name     = 'Software';
        $user->email    = 'software@bonsai.com.gt';
        $user->password = '$2y$10$4zYgFlR5p8FuDKfop5.0UuX2WdeklroVtcrp9tsdKVFd4I0ogmNFW';
        $user->save();

        $role             = new Role();
        $role->name       = 'Administrador';
        $role->guard_name = 'web';
        $role->save();

        $role->syncPermissions(Permission::all());

        $user->assignRole($role);

        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
