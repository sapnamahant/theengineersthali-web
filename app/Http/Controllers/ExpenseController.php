<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index(){
        $this->data['expense'] = Expense::select('expenses.*','users.name as user')->join('users','users.id','=','expenses.user_id')->get();
        return view('expense.index',$this->data);
    }

    public function addExpense(){
        return view('expense.add');
    }

    public function add(Request $request){
        if(!empty($request->id)){
            $expense = Expense::firstwhere('id',$request->id);
            $expense->title = $request->title;
            $expense->description = $request->description;
            $expense->amount = $request->amount;
            $expense->user_id = Auth::user()->id;
            $expense->expense_date = $request->expense_date;
            $expense->save();
        }else{
            $expense = new Expense();
            $expense->title = $request->title;
            $expense->description = $request->description;
            $expense->amount = $request->amount;
            $expense->user_id = Auth::user()->id;
            $expense->expense_date = $request->expense_date;
            $expense->save();
        }

        return back()->with('message','Expense updated successfully');
    }

    public function editExpense($id){
        $this->data['expense'] = Expense::where('id',base64_decode($id))->first();
        return view('expense.add',$this->data);
    }

    public function destroy($id){
        Expense::where('id',base64_decode($id))->delete();
        return back()->with('message','expense deleted successfully');
    }
}
