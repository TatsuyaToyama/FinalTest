<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 
        'gender' ,
        'email', 
        'postcode', 
        'address', 
        'building_name', 
        'opinion'
    ];

    public static $rules = array(
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'postcode' => ['required', 'size:8'],
            'address' => ['required', 'string', 'max:255'],
            'building_name' => ['max:255'],
            'opinion' => ['required', 'string', 'max:120'],
  );

    public function scopeNameSearch($query, $fullname)
    {
    if (!empty($fullname)) {
        $query->where('fullname', $fullname);
    }
    }

    public function scopeGenderSearch($query, $gender)
    {
    if (!empty($gender)) {
        $query->where('gender', $gender);
    }
    }

    public function scopeDateSearch($query, $date_start, $date_end)
    {
    if (!empty($date_start)&&!empty($date_end)) {
        $query->whereBetween('created_at', [$date_start, $date_end]);
    }elseif(empty($date_start)&&!empty($date_end)){
        $date_start="1900-1-1";
        $query->whereBetween('created_at', [$date_start, $date_end]);
    }elseif(!empty($date_start)&&empty($date_end)){
        $date_end="3000-1-1";
        $query->whereBetween('created_at', [$date_start, $date_end]);
    }
    }
    

    public function scopeEmailSearch($query, $email)
    {
    if (!empty($email)) {
        $query->where('email', $email);
    }
    }
}
