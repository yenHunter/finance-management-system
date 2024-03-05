<?php

namespace App\Http\Controllers;

use App\Models\BankInfo;
use App\Models\BranchInfo;
use App\Models\FinancialYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function bank_list_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'settings');
            Session::put('active', 'bank_list');
            return view(
                'pages.settings.bank',
                [
                    'bank_list' => BankInfo::get()
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function bank_create(Request $request)
    {
        if (Session::get('user') != null) {
            // Validation
            $request->validate([
                'fund_type' => 'required',
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
            $object = new BankInfo();
            $object->code = 1000;
            $object->fund_type = $request->fund_type;
            $object->financial_year = $request->financial_year;
            $object->bank_id = $request->bank_id;
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
            if (Session::get('user')['role_id'] == 1) {
                $object->flag = $request->flag;
            }
            $object->created_by = Session::get('user')['id'];
            $object->save();
            return redirect('income-list')->withSuccess('Created Successfully');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function branch_list_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'settings');
            Session::put('active', 'branch_list');
            return view(
                'pages.settings.branch',
                [
                    'branch_list' => BranchInfo::join('bank_infos', 'branch_infos.bank_id', '=', 'bank_infos.id')->select('branch_infos.*', 'bank_infos.bank_name', 'bank_infos.logo')->get()
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function branch_list_get($bank_id)
    {
        return response()->json(BranchInfo::join('bank_infos', 'branch_infos.bank_id', '=', 'bank_infos.id')->select('branch_infos.*', 'bank_infos.bank_name', 'bank_infos.logo')->where('branch_infos.bank_id', '=', $bank_id)->get());
    }

    public function financial_year_list_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'settings');
            Session::put('active', 'financial_year_list');
            return view(
                'pages.settings.financial_year',
                [
                    'financial_year_list' => FinancialYear::get()
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }
}
