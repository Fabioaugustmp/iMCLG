<?php

namespace App\Http\Controllers;

use App\Models\ClassExpenses;
use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\Properties;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    //

    public function showCreateExpense()
    {

        $expensestypes = ExpenseType::all();
        $classexpenses = ClassExpenses::all();
        $properties = Properties::all();

        return view('expenses.expense-create', [
            'expensetypes' => $expensestypes,
            'classexpenses' => $classexpenses,
            'properties' => $properties
        ]);
    }

    public function createExpense(Request $request)
    {
        $request->validate([
            'id_propertie' => 'required',
            'expensetype' => 'required',
            'classexpense' => 'required',
            'includedate' => 'required|date',
            'expiredate' => 'required|date',            
            'competence' => 'required',
            'value' => 'required|numeric',           
        ]);

        $data = $request->only([
            'id_propertie',
            'expensetype',
            'classexpense',
            'includedate',
            'expiredate',
            'paymentdate',
            'competence',
            'value',
            'observations'
        ]);

        $expense = Expense::create($data);

        return redirect()
        ->route('expense')
        ->with('success', 'Despesa de(a) ' . $expense->name . 'criado com sucesso!');
    }

    public function listaAllExpenses(Expense $expenses)
    {

        $expenses = Expense::all();

       // $properties = $expenses->propertie()->first();

        return view('expenses.expenses', [
            'expenses' => $expenses            
        ]);
    }

   public function showExpensePropertie(Properties $properties){

    $properties = Properties::where('id', $properties->id)->first();

    $expenses = $properties->expenses()->get();


    dd($expenses);

    return view();

   }

}
