<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    public function index(){
        return view('index');
    }

    public function confirm(ContactRequest $request){
        $postcode = mb_convert_kana($request['postcode'], 'n');
        $request['postcode'] = $postcode;

        $content = $request -> only(['last_name', 'first_name', 'gender' ,'email', 'postcode', 'address', 'building_name', 'opinion']);
        return view('confirm', ['content'=>$content]);
    }


    public function modify(Request $request) {
        // 連想配列のネストを解除
        $content_n = $request ->only('content');
        $content_f = array_merge($content_n['content'],$content_n);
        unset($content_f['content']);

        $request->session()->put([
        '_old_input' => [
            'last_name' => $content_f['last_name'],
            'first_name' => $content_f['first_name'],
            'gender' => $content_f['gender'],
            'email' => $content_f['email'],
            'postcode' => $content_f['postcode'],
            'address' => $content_f['address'],
            'building_name' => $content_f['building_name'],
            'opinion'=> $content_f['opinion']
        ]
        ]);
        return redirect('/');
        
    }

    public function store(Request $request){
        //セッションの中身を削除
        $request->session()->put([
        '_old_input' => [
            'last_name' => '',
            'first_name' => '',
            'gender' => 1,
            'email' => '',
            'postcode' => '',
            'address' => '',
            'building_name' => '',
            'opinion'=> ''
        ]
        ]);


        // 連想配列のネストを解除
        $content_n = $request ->only('content');
        $content_f = array_merge($content_n['content'],$content_n);
        unset($content_f['content']);

        // 名字と名前をフルネームに変換
        $fullname = $content_f['last_name']. $content_f['first_name'];
        $content_f['fullname'] = $fullname;
        unset($content_f['last_name'], $content_f['first_name']);
        
        // tableへの保存
        Contact::create($content_f);
        
        return view('thanks', ['content'=>$content_f]);
    }


    public function manage(Request $request){
        $result = Contact::paginate(10);

        // セッションの中身を削除
        $request->session()->put([
        '_old_input' => [
            'fullname_m' => '',
            'gender_m' => '',
            'email_m' => '',
            'date_start_m' => '',
            'date_end_m' => ''
        ]
        ]);

        return view('manage', ['result'=>$result]);
    }

    public function search(Request $request){
        $result = $request -> all();

        
        $fullname_r = $result['fullname_r']??'';
        $gender_r = $result['gender_r']?? '';
        $date_start_r = $result['date_start_r']?? '';
        $date_end_r = $result['date_end_r']?? '';
        $email_r = $result['email_r']?? '';

     

        $request->session()->put([
        '_old_input' => [
            'fullname_r' => $fullname_r,
            'gender_r' => $gender_r,
            'email_r' => $email_r,
            'date_start_r' => $date_start_r,
            'date_end_r' => $date_end_r
        ]
        ]);
       

        $result_r = Contact::NameSearch($fullname_r)
                ->GenderSearch($gender_r)
                ->DateSearch($date_start_r, $date_end_r)
                ->EmailSearch($email_r)
                ->paginate(10);
        
        

        return view('manage',['result'=>$result_r]);
    }

    public function destroy(Request $request){
        Contact::find($request -> id)->delete();
        return redirect('/manage');
    }


}
