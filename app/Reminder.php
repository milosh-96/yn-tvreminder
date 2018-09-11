<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = ["monday","tuesday","wednesday","thursday","friday","saturday","sunday","tv","weekly","user_id","show_id","start_time","end_time"];
}


