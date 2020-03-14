<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function edit($id)
    {
        $setting = PaymentSetting::find($id);
        return view('dashboard.paymentSetting.edit', compact('setting'));
    }


    public function update($id, Request $request)
    {
        $setting = PaymentSetting::find($id);
        $request->validate([
            'tax'               =>  'required',
            'delivery'          =>  'required',
        ], [] , [
        ]);

        $setting->tax = $request->tax / 100;
        $setting->delivery = $request->delivery;
        $setting->save();

        return redirect()->back()->with('update', 'تم تعديل اعدادات الدفع بنجاح');
    }
}
