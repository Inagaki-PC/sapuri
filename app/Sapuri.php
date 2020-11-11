<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sapuri extends Model
{
     protected $guarded = array('id');
    
    // 以下を追記
    public static $rules = array(
        'sapuri_name' => 'required',
        'per_day' => 'required',
        'total' => 'required',
    );
}