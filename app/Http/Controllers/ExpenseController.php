<?php

namespace App\Http\Controllers;

use App\Models\ExpenseHead;
use App\Models\ExpenseInfo;
use App\Models\FinancialYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExpenseController extends Controller
{
    public function expense_list_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'expense');
            Session::put('active', 'expense_list');
            return view(
                'pages.expense.list',
                [
                    'expense_head' => ExpenseHead::get(),
                    'expense_list' => ExpenseInfo::join('expense_heads', 'expense_infos.expense_head', '=', 'expense_heads.id')->join('financial_years','expense_infos.financial_year','=','financial_years.id')->select('expense_infos.*', 'expense_heads.head_name','financial_years.value')->get()
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function expense_create_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'expense');
            Session::put('active', 'expense_create');
            return view(
                'pages.expense.create',
                [
                    'financial_year' => FinancialYear::orderBy('value', 'desc')->get(),
                    'expense_head' => ExpenseHead::get()
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function expense_create_store(Request $request)
    {
        if (Session::get('user') != null) {
            // Validation
            $request->validate([
                'financial_year' => 'required',
                'expense_head' => 'required',
                'amount' => 'required'
            ]);

            if ($request->attachment != null) {
                $attachment = time() . '.' . $request->attachment->extension();
                $request->attachment->move(public_path('uploads/expense'), $attachment);
                $attachment = 'uploads/expense/' . $attachment;
            } else {
                $attachment = null;
            }
            // Save to database
            $object = new ExpenseInfo();
            $object->financial_year = $request->financial_year;
            $object->date = $request->date;
            $object->expense_head = $request->expense_head;
            $object->amount = $request->amount;
            $object->note = $request->note;
            $object->attachment = $attachment;
            $object->status = $request->status;
            if (Session::get('user')['role_id'] == 1 || Session::get('user')['role_id'] == 2) {
                $object->flag = 1;
            }
            $object->created_by = Session::get('user')['id'];
            $object->save();
            return redirect('expense-list')->withSuccess('Created Successfully');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function expense_head_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'expense');
            Session::put('active', 'expense_head');
            return view(
                'pages.expense.head',
                [
                    'expense_head' => ExpenseHead::get()
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }
}
