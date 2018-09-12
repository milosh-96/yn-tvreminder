<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = ["monday","tuesday","wednesday","thursday","friday","saturday","sunday","tv","weekly","user_id","show_id","start_time","end_time"];


    public function display() {
        
        $output = '';

        $output .= $this->monday ? "M " : "";
        $output .= $this->tuesday ? "Tu " : "";
        $output .= $this->wednesday ? "W " : "";
        $output .= $this->thursday ? "Th " : "";
        $output .= $this->friday ? "F " : "";
        $output .= $this->saturday ? "Sa " : "";
        $output .= $this->sunday ? "Su " : "";

        //
        $output .= "@ " . date("H:i",strtotime($this->start_time)) . " on " . $this->tv;
        return $output;
    }

}


