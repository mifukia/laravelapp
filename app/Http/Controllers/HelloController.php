<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    private $data = [
        'one',
        'two',
        'three',
        'four'
    ];
    public function index(){
        return view('hello.index',[
            'data' => $this -> data
        ]);
    }
    public function post(Request $request){
        return view('hello.index',[
            'data' => $this -> data,
            'msg' => $request -> msg,
        ]);
    }
}