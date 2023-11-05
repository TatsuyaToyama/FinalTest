@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/manage.css') }}" />
@endsection


@section('title')
    <span class="title-system">管理システム</span>
@endsection


@section('content')
<div class="contents">
    <div class="search">
        <form class="search_form" id="searchform" action="/manage/search" method="post">
            @csrf
        <div class="search_inner">
            <div class="search_name">
                <span>お名前</span><input class="search_name-input" type="text" name="fullname_r" value="{{ old('fullname_r') }}">
            </div>
            <div class="search_gender">
                <span>性別</span>
                <input class="search_gender-all" type="radio" id="all" name="gender_r" value="0" style="transform:scale(1.5);" {{ old('gender_r','0') == 0 ? 'checked' : ''}}>
                <label for="all">全て</label>
                <input class="search_gender-man" type="radio" id="man" name="gender_r" value="1" style="transform:scale(1.5);" {{ old('gender_r') == 1 ? 'checked' : ''}}>
                <label for="man">男性</label>
                <input class="search_gender-woman" type="radio" id="woman" name="gender_r" value="2" style="transform:scale(1.5);" {{ old('gender_r') == 2 ? 'checked' : ''}}>
                <label for="woman">女性</label>
            </div>
            <div class="search_date">
                <p class="search_date-title">登録日</p>
                <input class="search_date-start" type="date" name="date_start_r" value="{{ old('date_start_r') }}">
                <p class="search_date-interbal">~</p>
                <input class="search_date-end" type="date" name="date_end_r" value="{{ old('date_end_r') }}">
            </div>
            <div class="search_email">
                <span>メールアドレス</span><input class="search_email-input" type="text" name="email_r" value="{{ old('email_r') }}">
            </div>
        </div>
            <div class="search_submit">
                <button class="search_submit-button" type="submit">検索</button>
                
            </div>
        </form>

        <div class="search_form-reset">
            <form class="search_form-reset-inner" action="/manage">
                <button class="search_form-reset-button" type="submit">リセット</button>
            </form>
        </div>

    </div>

    <div class="result">
        <div class="result_page">
            <div class="result_count">
                <p>
                    全{{ $result->total() }}件中  {{ $result->firstItem() }}-{{ $result->lastItem() }} 件
                </p>

            </div>
            <div class="result_pagenumber">
                <div class="d-flex justify-content-end">
                      {{ $result->appends(session('_old_input'))->links() }}                       
                </div>

            </div>
        </div>

        <table class="result_table">
            <tr class="result_table-row">
                <th class="result_table-id">ID</th>
                <th class="result_table-fullname">お名前</th>
                <th class="result_table-gender">性別</th>
                <th class="result_table-email">メールアドレス</th>
                <th class="result_table-opinion">ご意見</th>
            </tr>
            @foreach($result as $contact)
                
            <tr class="result_table-content-row">
                <td class="result_table-content-id">{{ $contact['id']}}</td>
                <td class="result_table-content-fullname">{{ $contact['fullname']}}</td>
                <td class="result_table-content-gender">
                    @if($contact['gender']==1)
                    男性
                    @elseif($contact['gender']==2)
                    女性
                    @endif
                </td>
                <td class="result_table-content-email">{{ $contact['email']}}</td>

                <td class="result_table-content-opinion" onmouseover="showPopup()" onmouseout="hidePopup()">
                    {{ Str::limit($contact['opinion'], 51)}}
                    <p class="result_table-content-opinion-popup" id="popup">{{ $contact['opinion'] }}</p>

                <script>
                    function showPopup() {
                        document.getElementById("popup").style.display = "block";
                    }

                    function hidePopup() {
                        document.getElementById("popup").style.display = "none";
                    }
                    </script>
                </div>
                </td>
                <td class="result_table-content-delete">
                    <form class="result_table-form" action="/manage/delete" method="post">
                    @method('delete')
                    @csrf
                        <input type="hidden" name="id" value="{{ $contact['id'] }}">
                        <button class="result_table-form-delete" type="submit">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
            


        </table>


    
    </div>



    

</div>
@endsection