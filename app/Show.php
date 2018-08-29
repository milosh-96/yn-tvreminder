<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = ["title","hash","description","user_id","slug","description","cover_url"];
}
