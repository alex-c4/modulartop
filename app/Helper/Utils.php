<?php

namespace App\Helper;
use DB;

class Utils
{
    public static function getCountNews(){
        $countNews = DB::select('CALl sp_CountNews');
        
        return $countNews[0]->countNews;
    }
}
