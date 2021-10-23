<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();

        return view('welcome', compact('products'));
    }

    public function show(Products $products)
    {
        return view('product', compact('products'));
    }

    public function pay(Request $request, Products $products)
    {
        $pp_Amount = explode(',', $products->price * 100);

        date_default_timezone_set('Asia/Karachi');

        $datetime = new \DateTime();

        $pp_TxnDateTime = $datetime->format('YmdHis');

        $expiredAt = $datetime->add(new \DateInterval('PT03H30S'));

        $pp_TxnExpiryDateTime = $expiredAt->format('YmdHis');

        $pp_TxnRefInfo = "T{$pp_TxnDateTime}";

        $data = [
            'pp_version'    => config('jazzcash.VERSION'),
            'pp_TxnType'    => "MWALLET",
            'pp_Language'   => config('jazzcash.LANGUAGE'),
            'pp_MarchentID' => config('jazzcash.MERCHANT_ID'),
            'pp_SubMarchentID'  => "",
            'pp_Password'   => config('jazzcash.PASSWORD'),
            'pp_BankID'     => "TBANK",
            'pp_ProductID'  => "RETL",
            'pp_TxnRefNo'   => $pp_TxnRefInfo,
            'pp_Amount'     => $pp_Amount[0],
            'pp_TxnCurrency'    => config('jazzcash.CURRENCY_CODE'),
            'pp_TxnDateTime'    => $pp_TxnDateTime,
            'pp_BIllReference'  => "",
            'pp_Description'    => "",
            'pp_TxnExpiryDateTime'  => $pp_TxnExpiryDateTime,
            'pp_ReturnURL'  => config('jazzcash.RETURN_URL'),
            'pp_SecureHash' => "",
            'ppmpf1'    => "1",
            'ppmpf2'    => "2",
            'ppmpf3'    => "3",
            'ppmpf4'    => "4",
            'ppmpf5'    => "5"
        ];

        $data['pp_SecureHash'] = $this->getSecureHash($data);

        Order::create([
            'order_id' => Str::random(6),
            'transection_id' => $pp_TxnRefInfo,
            'amount' => $products->price
        ]);

        Session::put('trxData', $data);

        return view('confirm');
    }

    private function getSecureHash($data)
    {
        ksort($data);

        $str = config('jazzcash.INTEGERITY_SALT');

        foreach ($data as $value) {
            if (!empty($value)) {
                $str = $str . "&" . $value;
            }
        }

        return hash_hmac('sha256', $str, config('jazzcash.INTEGERITY_SALT'));
    }

    public function status(Request $request)
    {
        dd($request->all());
    }
}
