<html>
    <head>
        <title>Hello/Index</title>
        <style>
            body{font-size:16px;color:#999;}
            h1{font-size:100pt;text-aign:right;color:#f6f6f6;margin:-50px 0px -100px 0px}
        </style>
        <body>
            <h1>Blade/Index</h1>
            @isset ($msg)
            <p>こんにちは、{{$msg}}さん。</p>
            @else
            <p>何か書いてください。</p>
            @endif
            <form method="POST" action="/hello">
                {{ csrf_field() }}
                <input type="text" name="msg">
                <input type="submit">
            </form>
            <ol>
            @foreach($data as $item)
            <li>{{$item}}</li>
            @endforeach
            </ol>
        </body>
    </head>
</html>