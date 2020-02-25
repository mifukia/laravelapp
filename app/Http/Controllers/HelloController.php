<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    // public function index(Request $request){
    //     return view('hello.index',[
    //         'data' => $request -> data,
    //         'message' => 'Hello!'
    //     ]);
    // }
    // public function post(Request $request){
    //     return view('hello.index',[
    //         'data' => $this -> data,
    //         'msg' => $request -> msg,
    //     ]);
    // }
    public function index(Request $request){
        // $validator = Validator::make($request -> query(),[
        //     'id' => 'required',
        //     'pass' => 'required',
        // ]);
        // if($validator -> fails()){
        //     $msg = 'クエリーに問題があります。';
        // }else{
        //     $msg = "ID/PASSを受付けました。フォームを入力ください。";
        // };

        // if(isset($request -> id))
        // {
        //     $param = ['id' => $request -> id];
        //     $items = DB::select('select * from people where id = :id', $param);
        // } else {
        //     $items = DB::select('select * from people');
        // }
        $items = DB::table('people') -> get();
        //return view('hello.index',['msg' => $msg,'items' => $items]);
        return view('hello.index',['items' => $items]);
    }
    public function post(HelloRequest $request){
        // $rules = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric',
        // ];
        // $messages = [
        //     'name.required' => '名前は必ず入力してください。',
        //     'mail.email' => 'メールアドレスが必要です。',
        //     'age.numeric' => '年齢を整数で記入ください。',
        //     'age.min' => '年齢は０歳以上で記入ください。',
        //     'age.max' => '年齢は２００歳以下で記入ください。',
        //     'age.hello' => 'Hello!入力は偶数のみ受け付けます。'
        // ];
        // $validator = Validator::make($request -> all(),$rules,$messages);

        // $validator -> sometimes('age','min:0',function($input){
        //     return !is_int($input -> age);
        // });

        // $validator -> sometimes('age','max:200',function($input){
        //     return !is_int($input -> age);
        // });

        // $validator -> sometimes('age','hello',function($input){
        //     return !is_int($input -> age);
        // });

        // if($validator -> fails()){
        //     return redirect('/hello')
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        return view('hello.index',['msg' => '正しく入力されました！']);
    }

    public function add(Request $request){
        return view('hello.add');
    }

    public function create(Request $request){
        $param = [
            'name' => $request -> name,
            'mail' => $request -> mail,
            'age' => $request -> age,
        ];

        //DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        DB::table('people') -> insert($param);

        return redirect('/hello');
    }

    public function edit(Request $request){
        $item = DB::table('people') -> where('id',$request -> id) -> first();
        return view('hello.edit',['form' => $item]);
    }

    public function update(Request $request){
        $param = [
            'id' => $request -> id,
            'name' => $request -> name,
            'mail' => $request -> mail,
            'age' => $request -> age,
        ];

        //DB::update('update people set name = :name,mail= :mail,age= :age where id = :id', $param);
        DB::table('people') -> where('id',$request -> id) -> update($param);
        return redirect('/hello');
    }

    public function del(Request $request){
        $item = DB::table('people') -> where('id',$request -> id) -> first();
        return view('hello.del',['form' => $item]);
    }

    public function remove(Request $request){
        // $param = ['id' => $request -> id];
        //DB::delete('delete from people where id = :id', $param);
        DB::table('people') -> where('id',$request -> id) -> delete();
        return redirect('/hello');
    }

    public function show(Request $request){
        // $name = $request -> name;
        // $items = DB::table('people')
        //     -> where('name','like','%'.$name.'%')
        //     -> orWhere('mail','like','%'.$name.'%')
        //     -> get();
        $items = DB::table('people') -> orderBy('age','asc') -> get();
        return view('hello.show',['items' => $items]);
    }
}