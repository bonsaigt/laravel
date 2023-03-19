<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::truncate();

        Permission::create([
            'name'  => 'index.index',
            'title' => 'Inicio',
        ]);

        Permission::create([
            'name'  => 'help',
            'title' => 'Ayuda',
        ]);

        Permission::create([
            'name'  => 'catalogs.users.index',
            'title' => 'Catálogos - Usuarios - Listado',
        ]);

        Permission::create([
            'name'  => 'catalogs.users.store',
            'title' => 'Catálogos - Usuarios - Guardar',
        ]);

        Permission::create([
            'name'  => 'catalogs.users.create',
            'title' => 'Catálogos - Usuarios - Nuevo',
        ]);

        Permission::create([
            'name'  => 'catalogs.users.show',
            'title' => 'Catálogos - Usuarios - Ver',
        ]);

        Permission::create([
            'name'  => 'catalogs.users.update',
            'title' => 'Catálogos - Usuarios - Actualizar',
        ]);

        Permission::create([
            'name'  => 'catalogs.users.destroy',
            'title' => 'Catálogos - Usuarios - Eliminar',
        ]);

        Permission::create([
            'name'  => 'catalogs.users.edit',
            'title' => 'Catálogos - Usuarios - Editar',
        ]);

        Permission::create([
            'name'  => 'catalogs.roles.index',
            'title' => 'Catálogos - Roles - Listado',
        ]);

        Permission::create([
            'name'  => 'catalogs.roles.store',
            'title' => 'Catálogos - Roles - Guardar',
        ]);

        Permission::create([
            'name'  => 'catalogs.roles.create',
            'title' => 'Catálogos - Roles - Crear',
        ]);

        Permission::create([
            'name'  => 'catalogs.roles.show',
            'title' => 'Catálogos - Roles - Ver',
        ]);

        Permission::create([
            'name'  => 'catalogs.roles.update',
            'title' => 'Catálogos - Roles - Actualizar',
        ]);

        Permission::create([
            'name'  => 'catalogs.roles.destroy',
            'title' => 'Catálogos - Roles - Eliminar',
        ]);

        Permission::create([
            'name'  => 'catalogs.roles.edit',
            'title' => 'Catálogos - Roles - Editar',
        ]);

    }
}
