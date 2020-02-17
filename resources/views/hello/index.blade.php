@extends('layouts.helloapp')

@section('title','Index')
@section('menubar')
    @parent
    <p>インデックスページ</p>
@endsection 

@section('content')
    <p>ここが本文のコンテンツです。</p>
    <p>必要なだけ記述できます。</p>
    @component('components.message')
        @slot('msg_title')
            CAUSION!
        @endslot
        @slot('msg_content')
            これはメッセージの表示です。
        @endslot
    @endcomponent
    <ul>
    @each('components.item',$data,'item')
    </ul>
@endsection

@section('footer')
    copyright 2020 mifukia.
@endsection

