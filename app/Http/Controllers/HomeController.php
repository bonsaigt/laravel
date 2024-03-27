<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('component')
            ->with('component', 'home')
            ->with('params', [
                'message' => "Bienvenido " . Auth::user()->name,
            ]);
    }

    public function healthcheck()
    {
        return response()->json('ok');
    }
}
