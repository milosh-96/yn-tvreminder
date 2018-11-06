<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reminder extends Model
{
    use Notifiable;

    protected $fillable = ["hash","monday","tuesday","wednesday","thursday","friday","saturday","sunday","tv","weekly","user_id","show_id","start_time","end_time","onetime_event","onetime_date"];

    public function findByHash($hash) {
        return Reminder::where('hash','=',$hash)->with('getShow')->first();
    }

    public function getShow() {
        return $this->hasOne('App\Show','id','show_id');
    }
    public function getUser() {
        return $this->hasOne('App\User','id','user_id');
    }

    public function formattedTime() {
        $date = new \DateTime($this->start_time,new \DateTimeZone('Europe/Belgrade');
        $date->setTimezone(new \DateTimeZone(auth()->user()->timezone));
        return $date->format("H:i");
        
    }
    public function getTodayReminders() {
        $day = strtolower(date("l"));

        //$current = date("H:i",strtotime("+15 minutes"));
        $current = date("H:i",strtotime("02:35"));
        return $this->whereTime('start_time','=',$current)->get();
    }
    
    public function display() {
        $output = '';
        if($this->weekly) {

        $output .= $this->monday ? "M " : "";
        $output .= $this->tuesday ? "Tu " : "";
        $output .= $this->wednesday ? "W " : "";
        $output .= $this->thursday ? "Th " : "";
        $output .= $this->friday ? "F " : "";
        $output .= $this->saturday ? "Sa " : "";
        $output .= $this->sunday ? "Su " : "";

        //
        }
        if($this->onetime_event) {
            $output .= date("d.m.Y.",strtotime($this->onetime_date));
        }
        $output .= " @ " . $this->formattedTime() . " on " . $this->tv;

       
        return $output;
    }



}


