<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use App\Helpers\NoteHelpers;
use App\Helpers\FormattingHelpers;
use App\Facade\WithdrawFacade;

class WithdrawController extends Controller
{

    /**
     * @api {post} /api/withdraw Cash Withdraw
     * @apiVersion 1.0.0
     * @apiName CashWithdraw
     * @apiGroup Cash
     * @apiHeader {String} Content-Type application/json.
     *
     * @apiParam {string} amount required.
     * 
     * @apiParamExample Request-Example:
     *     {
     *      "amount" : 250,
     *     }
     *
     * @apiErrorExample Error-Response: 
     *     HTTP/1.1 400 Bad Request
     *   ["InvalidArgumentException"]
     *
     * @apiErrorExample Error-Response: 
     *     HTTP/1.1 404 Not Found
     *   ["NoteUnavailableException"]
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *   [
     *     "100.00",
     *     "100.00",
     *     "50.00"
     *   ] 
     *
     */
    public function notes(Request $request){
        $params = $request->all();

        $availableNotes = NoteHelpers::getAvailableNotes();
        $response = WithdrawFacade::getNotes($params['amount'],  $availableNotes);

        return response()->json($response['data'], $response['status']);
    }

}
