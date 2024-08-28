<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nafezly\Payments\Classes\PaymobWalletPayment;
use Illuminate\Support\Facades\Auth;

class PaymentdController extends Controller
{
    public function payment_verify(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id = $user->id;
            $first_name = $user->first_name;
            $last_name = $user->last_name;
            $email = $user->email;
            $phone = $user->phone;
            $currency = config('nafezly-payments.PAYMOB_CURRENCY');
            $amount = 200;
        } else {
            $id = $request->input('user_id');
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $currency = config('nafezly-payments.PAYMOB_CURRENCY');
            $amount = 200;
        }

        $payment = new PaymobWalletPayment();

        $payment->setUserId($id)
            ->setUserFirstName($first_name)
            ->setUserLastName($last_name)
            ->setUserEmail($email)
            ->setUserPhone($phone)
            ->setCurrency($currency)
            ->setAmount($amount);

        $payment->pay();

        $verificationResult = $payment->verify($request);

        return response()->json($verificationResult);
    }
}
