<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipo;

class HomeController extends Controller
{
    public function index()
    {
        //
        $equipos = Equipo::orderBy('id', 'asc') -> get();
        $json = json_encode($equipos, JSON_UNESCAPED_UNICODE);
        return view('la_liga.index', compact('json'));
    }

}