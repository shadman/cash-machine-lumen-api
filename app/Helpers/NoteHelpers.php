<?php

namespace App\Helpers;

class NoteHelpers
{

	/*
		Return lowest note value, from a given list of notes
	*/
    public static function getMinNote($availableNotes) {
        $notesArray = array_keys($availableNotes, min($availableNotes));
        return $availableNotes[$notesArray[0]];
    }


    /*
    	Return all available notes in sorted array
    	Available notes are congigurable from config/app.php
    */
    public static function getAvailableNotes() {
        $availableNotes = config('app.available_notes'); //[100.00, 50.00, 20.00, 10.00];
        rsort($availableNotes);
        return $availableNotes;
    }

}
