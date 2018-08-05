<?php

namespace App\Helpers;

class FormattingHelpers
{

    /*
    	Apply formatting in amount(numbers)
    	Can configure/change for whole application from here
    */
    public static function numberFormat($value){
        return number_format($value, 2, '.', '');
    }

}
