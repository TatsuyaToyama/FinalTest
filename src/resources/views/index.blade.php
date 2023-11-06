@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection


@section('title')
    お問い合せ
@endsection

@section('content')
<div class="contents">
    <form class="h-adr" action="/confirm" method="post">
    @csrf
    <table class="contents_table">
        <tr class="contents_form-inner">
            <th class="contents_form-name-title">お名前<span> ※</span>
                    @error('last_name')
                        <div class="contents_form-name-last-error">{{ $message }}</div>
                    @enderror
                    @error('first_name')
                        <div class="contents_form-name-first-error">{{ $message }}</div>
                    @enderror
        
            </th>
            <td class="contents_form-name">
                <div class="contents_form-name-last-inner">
                    <input class="contents_form-name-last" type="text" name="last_name" value="{{ old('last_name') }}">
                    <p class="contents_form-name-example-last">例）山田</p>
                </div>
                <div class="contents_form-name-first-inner">
                    <input class="contents_form-name-first" type="text" name="first_name" value="{{ old('first_name') }}">
                    <p class="contents_form-name-example-first">例）太郎</p>
                
                </div>
              
            </td>
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-gender-title">性別<span> ※</span></th>
            <td class="contents_form-gender">
                    <input class="contents_form-gender-man" type="radio" id="man" name="gender" value="1" style="transform:scale(1.5);" {{ old('gender','1') == 1 ? 'checked' : ''}} >
                    <label for="man">男性</label>
                    <input class="contents_form-gender-woman" type="radio" id="woman" name="gender" value="2" style="transform:scale(1.5);" {{ old('gender','0') == 2 ? 'checked' : ''}} >
                    <label for="woman">女性</label>
            </td>
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-email-title">メールアドレス<span> ※</span>
                @error('email')
                    <div class="contents_form-email-error">{{ $message }}</div>
                @enderror

            </th>
            <td class="contents_form-email">
                <input class="contents_form-email-input" type="email" name="email" value="{{ old('email') }}">
                    
                <div class="contents_form-email-exmple">
                    <p class="contents_form-email-example-input">例）test@example.com</p>
                </div>
            </td> 
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-postcode-title">郵便番号<span> ※</span>
                @error('postcode')
                    <div class="contents_form-postcode-error">{{ $message }}</div>
                @enderror
            </th>
            <td class="contents_form-postcode">
                <div class="contents_form-postcode-inner">
                        <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8">
                        </script>
                        <span class="p-country-name" style="display:none;">Japan</span>
                    <p class="contents_form-postcode-mark">〒</p>
                    <input type="text" class="p-postal-code" size="8" maxlength="8" name="postcode" value="{{ old('postcode') }}">

                </div>
                    <p class="contents_form-postcode-example-input">例）123-4567</p>
                
                </div>    
            </td>
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-address-title">住所<span> ※</span>
                @error('address')
                    <div class="contents_form-address-error">{{ $message }}</div>
                @enderror
            </th>
            <td class="contents_form-address">
                <div class="contents_form-address-inner">
                    <input class="p-region p-locality p-street-address p-extended-address" type="text" name="address" value="{{ old('address') }}">
                    <p class="contents_form-address-example-input">例）東京都渋谷区千駄ヶ谷1-2-3</p>
                </div>
            </td>
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-building-title">建物名
                @error('building')
                    <div class="contents_form-building-error">{{ $message }}</div>
                @enderror
            </th>
            <td class="contents_form-builging">
                <div class="contents_form-builging-inner">
                    <input class="contents_form-building-input" type="text" name="building_name" value="{{ old('building_name') }}">
                    <p class="contents_form-building-example-input">例）千駄ヶ谷マンション101</p>
                </div>
            </td>
        </tr>

        <tr class="contents_form-inner">
            <th class="contents_form-opinion-title">ご意見<span> ※</span>
                @error('opinion')
                    <div class="contents_form-opinion-error">{{ $message }}</div>
                @enderror
            </th>
            <td class="contents_form-opinion">
                <div class="contents_form-opinion-inner">
                    <textarea class="contents_form-opinion-input" name="opinion" id=""  value="">{{ old('opinion') }}</textarea>
                </div>
            </td>
        </tr>
    </table>

        <div class="contents_form-submit">
            <button class="contents_form-submit-button" type="submit">確認</button>
        </div>
    </form>
</div>
@endsection


