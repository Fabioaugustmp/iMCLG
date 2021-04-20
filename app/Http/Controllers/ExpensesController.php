<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    //

    public function createExpense(){
        return view('expenses.expense-create');
    }

    public function listaAllExpenses(){
        return view('expenses.expenses');
    }
}
