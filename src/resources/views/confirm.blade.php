@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection


@section('title')
    内容確認
@endsection

@section('content')
<div class="contents">
    <table class="contents_table">
        <tr class="contents_form-inner">
            
            <th class="contents_form-name">
                <p class="contents_form-name-title">お名前</p>
            </th>
            <td class="contents_form-name-input">
                <p class="contents_form-name-last">{{ $content['last_name'] }}</p>
                <p class="contents_form-name-first">{{ $content['first_name'] }}</p>
            </td>
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-gender">
                <p class="contents_form-gender-title">性別</p>
            </th>
            <td>
                @if($content['gender']==1)
                    <p class="contents_form-name-last">男性</p>
                @elseif($content['gender']==2)
                    <p class="contents_form-name-last">女性</p>
                @endif
            </td>
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-email">
                <p class="contents_form-email-title">メールアドレス</p>
            </th>
            <td>
                <p class="contents_form-email-input">{{ $content['email'] }}</p>
            </td>
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-postcode">
                <p class="contents_form-postcode-title">郵便番号</p>
            </th>
            <td>
                <p class="contents_form-postcode-input">{{ $content['postcode'] }}</p>
            </td>
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-address">
                <p class="contents_form-address-title">住所</p>
            </th>
            <td>
                <p class="contents_form-address-input">{{ $content['address'] }}</p>
            </td>
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-building">
                <p class="contents_form-building-title">建物名</p>
            </th>
            <td>
                <p class="contents_form-building-input">{{ $content['building_name'] }}</p>
            </td>
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-opinion">
                <p class="contents_form-opinion-title">ご意見</p>
            </th>
            <td>
                <p class="contents_form-opinion-input">{{ $content['opinion'] }}</p>
            </td>
        </tr>
    </table>
        

    
    <form class="contents_form" action="/thanks" method="post">
    @csrf
        @foreach ($content as $key => $value)
            <input type="hidden" name="content[{{ $key }}]" value="{{ $value }}">
        @endforeach
        <div class="contents_form-submit">
            <button class="contents_form-submit-button" type="submit">送信</button>
        </div>
    </form>

    <form class="contents_form" action="/modify" method="post">
    @csrf
        @foreach ($content as $key => $value)
            <input type="hidden" name="content[{{ $key }}]" value="{{ $value }}">
        @endforeach
        <div class="contents_form-submit">
            <button class="contents_form-submit-button-modify">修正する</button>
        </div>
    </form>


    

</div>
@endsection


