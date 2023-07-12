<?php

namespace App\Http\Controllers;

use App\Contracts\CurrencyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{
    private $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }
    
    public function exchange(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source' => 'required|in:USD,TWD,JPY',
            'target' => 'required|in:USD,TWD,JPY',
            'amount' => 'required|regex:/^\$?(\d{1,3}(,\d{3})*(\.\d{2})?)?$/',
        ]);
 
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $source = $request->input('source');
        $target = $request->input('target');
        $amount = preg_replace('/[^0-9.]/', '', $request->input('amount'));

        $result = $this->currencyService->exchange($source, $target, $amount);

        return response()->json([
            'msg' => 'success',
            'amount' => '$' . number_format($result, 2),
        ]);
    }
}
