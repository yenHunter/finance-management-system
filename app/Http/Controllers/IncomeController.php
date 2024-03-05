<?php

namespace App\Http\Controllers;

use App\Models\BankInfo;
use App\Models\BranchInfo;
use App\Models\FinancialYear;
use App\Models\IncomeDetails;
use App\Models\IncomeHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IncomeController extends Controller
{
    public function income_list_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'income');
            Session::put('active', 'income_list');
            return view(
                'pages.income.list',
                [
                    'income_head' => IncomeHead::get(),
                    'income_list' => IncomeDetails::join('income_heads', 'income_details.income_head', '=', 'income_heads.id')
                        ->join('financial_years', 'income_details.financial_year', '=', 'financial_years.id')
                        ->join('bank_infos', 'income_details.bank_id', '=', 'bank_infos.id')
                        ->join('branch_infos', 'income_details.branch_id', '=', 'branch_infos.id')
                        ->select('income_details.*', 'income_heads.head_name', 'financial_years.value', 'bank_infos.bank_name','bank_infos.logo', 'branch_infos.branch_name')
                        ->get()
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    // Create income functions
    public function income_create_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'income');
            Session::put('active', 'income_create');
            return view(
                'pages.income.create',
                [
                    'financial_year' => FinancialYear::orderBy('value', 'desc')->get(),
                    'income_head' => IncomeHead::get(),
                    'bank_list' => BankInfo::get(),
                    'branch_list' => BranchInfo::where('bank_id', '=', 1)->get()
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function income_create_store(Request $request)
    {
        if (Session::get('user') != null) {
            // Validation
            $request->validate([
                'fund_type' => 'required',
                'date' => 'required',
                'financial_year' => 'required',
                'income_head' => 'required',
                'number' => 'required',
                'amount' => 'required'
            ]);

            if ($request->attachment != null) {
                $attachment = time() . '.' . $request->attachment->extension();
                $request->attachment->move(public_path('uploads/income'), $attachment);
                $attachment = 'uploads/income/' . $attachment;
            } else {
                $attachment = null;
            }
            // Save to database
            $object = new IncomeDetails();
            $object->fund_type = $request->fund_type;
            $object->date = $request->date;
            $object->financial_year = $request->financial_year;
            $object->bank_id = $request->bank_id;
            $object->branch_id = $request->branch_id;
            $object->income_head = $request->income_head;
            $object->number = $request->number;
            $object->opening_date = $request->opening_date;
            $object->maturity_date = $request->maturity_date;
            $object->duration = $request->duration;
            $object->interest_rate = $request->interest_rate;
            $object->amount = $request->amount;
            $object->note = $request->note;
            $object->attachment = $attachment;
            $object->status = $request->status;
            if (Session::get('user')['role_id'] == 1 || Session::get('user')['role_id'] == 2) {
                $object->flag = 1;
            }
            $object->created_by = Session::get('user')['id'];
            $object->save();
            return redirect('income-list')->withSuccess('Created Successfully');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function income_head_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'income');
            Session::put('active', 'income_head');
            return view(
                'pages.income.head',
                [
                    'income_head' => IncomeHead::get()
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }
}
