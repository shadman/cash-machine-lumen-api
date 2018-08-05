<?php

namespace App\Facade;

use App\Helpers\NoteHelpers;
use App\Helpers\FormattingHelpers;
use Illuminate\Http\Response;

class WithdrawFacade
{

	/*
		Return lowest note value, from a given list of notes
	*/
    public static function getNotes($amount, $availableNotes, $notes=array() ) {

        for($x=0; $x<sizeof($availableNotes); $x++){
            if ($amount >= $availableNotes[$x]) {
                $notes[] = FormattingHelpers::numberFormat($availableNotes[$x]);
                $amount = FormattingHelpers::numberFormat($amount) - FormattingHelpers::numberFormat($availableNotes[$x]);
                break;
            }
        }

        if ($amount > 0){
            if ( $amount < NoteHelpers::getMinNote($availableNotes) ) { 
                $response['data'] = ["NoteUnavailableException"];
                $response['status'] = Response::HTTP_NOT_FOUND;
                return $response;
            }

            // Check all available notes untill amount become 0 and found all applicable notes
            return self::getNotes($amount, $availableNotes, $notes);
        } else if ( $amount < 0 ) { 
            $response['data'] = ["InvalidArgumentException"];
            $response['status'] = Response::HTTP_BAD_REQUEST;
            return $response;
        } else {
            $response['data'] = $notes;
            $response['status'] = Response::HTTP_OK;
            return $response;
        }
    }




}
