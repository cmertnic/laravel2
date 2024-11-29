<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showIndex(){
        return view('home');
    }
    public function main()
    {
        return view('layouts.main');
    }
    public function showArray(){
        $array = [
            ["id" => 1, "title" => "курица", "price" => 500,"path" => "img/chiken.jpg"],
            ["id" => 2, "title" => "петух", "price" => 600,"path" => "img/cock.webp"],
            ["id" => 3, "title" => "гусь", "price" => 700,"path" => "img/goose.webp"],
        ];
        return view('array', compact('array'));
    }

    public function View(){
        return view('home', compact("array"));
    }
}