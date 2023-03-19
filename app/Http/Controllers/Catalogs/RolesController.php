<?php
namespace App\Http\Controllers\Catalogs;

use Bonsai\Crud\CrudController;
use Spatie\Permission\Models\Role;

class RolesController extends CrudController
{
    public function __construct()
    {
        $this->render([
            'model'      => new Role(),
            'title'      => 'Roles',
            'breadcrumb' => [
                'Inicio'   => '/',
                'Especies' => '',
                'Usuarios' => '/catalogs/roles',
            ],
            'url'        => '/catalogs/roles',
            'fields'     => [
                ['title' => 'ID', 'column' => 'id', 'editable' => false],
                ['title' => 'Nombre', 'column' => 'name'],
            ],
            'buttons'    => [
                [
                    'type'   => 'warning',
                    'target' => '',
                    'icono'  => 'fa fa-lock',
                    'url'    => '/catalogs/permissions/{id}',
                ],
            ],
        ]);
    }
}
