<?php
namespace App\Http\Controllers\Catalogs;

use App\Models\User;
use Bonsai\Crud\CrudController;

class UsersController extends CrudController
{
    public function __construct()
    {
        $this->render([
            'model'      => new User(),
            'title'      => 'Usuarios',
            'breadcrumb' => [
                'Inicio'   => '/',
                'Especies' => '',
                'Usuarios' => '/catalogs/users',
            ],
            'url'        => '/catalogs/users',
            'fields'     => [
                ['title' => 'ID', 'column' => 'id', 'editable' => false],
                ['title' => 'Nombre', 'column' => 'name'],
                ['title' => 'Email', 'column' => 'email'],
                ['title' => 'URL', 'column' => 'url', 'type' => 'url', 'absolute' => true, 'tag' => 'link'],
                ['title' => 'Contraseña', 'column' => 'password', 'type' => 'password', 'visible' => false],
            ],
            'rules'      => [
                'name'     => 'required',
                'email'    => 'required|email',
                'password' => 'required',
            ],
            'buttons'    => [
                [
                    'type'   => 'warning',
                    'target' => '',
                    'icono'  => 'fa fa-lock',
                    'url'    => '/catalogs/userroles/{id}',
                ],
            ],
        ]);
    }
}
