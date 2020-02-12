<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function __invoke($id = 'noname',$pass = 'unknown'){
        return <<<EOF
        <html>
        <title>Hello/Index</title>
        <style>
        body{
            font-size:16px;color:#999;
        }
        </style>
        <body>
            <h1>Index</h1>
            <p>これは、Helloコントローラーのindexアクションです。</p>
            <ul>
                <li>ID:{$id}</li>
                <li>PASS:{$pass}</li>
            </ul>
        </body>
        </html>
EOF;
    }
}