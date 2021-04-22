<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    //
    public function createExpenseType(){
        return view('expensetype.expensetype-create');
    }

    public function listAllExpenseTypes(){
        return view('expensetype.expensetype');
    }
}
