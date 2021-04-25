<?php

namespace App\Http\Controllers;

use App\Models\ClassExpenses;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    //

    public function createExpense(){

        $expensestypes = ExpenseType::all();
        $classexpenses = ClassExpenses::all();

        return view('expenses.expense-create', [
            'expensetypes' => $expensestypes,
            'classexpenses' => $classexpenses
        ]);
    }

    public function listaAllExpenses(){
        return view('expenses.expenses');
    }
}
