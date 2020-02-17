<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    private $data = [
        ['name' => 'yamada taro','mail' => 'taro@yamada'],
        ['name' => 'tanaka hanako','mail' => 'hanako@tanaka'],
        ['name' => 'suzuki sachiko','mail' =>'sachiko@suzuki']
    ];
    public function index(){
        return view('hello.index',[
            'data' => $this -> data,
            'message' => 'Hello!'
        ]);
    }
    public function post(Request $request){
        return view('hello.index',[
            'data' => $this -> data,
            'msg' => $request -> msg,
        ]);
    }
}