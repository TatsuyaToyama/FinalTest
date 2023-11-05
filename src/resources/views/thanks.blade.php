@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
  <div class="contents">
    <p class="contents_thanks">ご意見いただきありがとうございました。</p>
    </div>
  <div class="contents">
    <form class="contents_toppage-inner" action="/" method="get">
        <button class="contents_toppage">トップページへ</button>
    </form>
  </div>

@endsection

