<?php


namespace App\Models;


class Statistics
{
    public $message;
    public $date;

    public function insertMessage(){
        return \DB::table("statistics")
            ->insert([
                'message' => $this->message,
                'date' => $this->date
            ]);
    }

    public function getAll(){
        return \DB::table("statistics")
            ->get();
    }
}
