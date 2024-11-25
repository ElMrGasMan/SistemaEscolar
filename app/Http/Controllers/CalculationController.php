<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function showForm()
    {
        return view('calculate');
    }

    public function calculate(Request $request)
    {
        
        $operation = $request->input('operation');
        $number1 = $request->input('number1');
        $number2 = $request->input('number2');
        $result = 0;

        switch ($operation) {
            case 'sum':
                $result = $number1 + $number2;
                break;
            case 'subtract':
                $result = $number1 - $number2;
                break;
            case 'multiply':
                $result = $number1 * $number2;
                break;
            case 'divide':
                $result = $number1 / $number2;
                break;
        }

        return view('calculate', ['result' => $result]);
    }
}
