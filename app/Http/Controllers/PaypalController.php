<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal;

class PaypalController extends Controller
{
    public function postPaypalCheckout(Request $request)
    {
        $data = [];
        $data['items'] = [
            [
                'name' => $request["item1Name"],
                'desc'  => $request["item1Description"],
                'price' => floatval($request["item1Value"]),
                'qty' => intval($request["item1Quantity"])
            ],
            [
                'name' => $request["item2Name"],
                'desc'  => $request["item2Description"],
                'price' => floatval($request["item2Value"]),
                'qty' => intval($request["item2Quantity"])
            ]
        ];
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order Invoice";
        $data['return_url'] = url('/paypal-checkout-success');
        $data['cancel_url'] = url('/paypal-checkout-cancel');

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
        $data['total'] = $total;
        $provider = PayPal::setProvider('express_checkout');
        try {
            $response = $provider->setExpressCheckout($data);
            return redirect($response['paypal_link']);
        } catch (\Exception $e) {
            dd($e);
        }

        $response = $provider->setExpressCheckout($data);
        return redirect($response['paypal_link']);
    }
    public function getSuccessOrder(Request $request)
    {

        $token = $request->get('token');
        $PayerID = $request->get('PayerID');
        // Verify Express Checkout Token
        $provider = PayPal::setProvider('express_checkout');
        $response = $provider->getExpressCheckoutDetails($token);
        dd($response);
    }
    public function getCancelOrder(Request $request)
    {
        dd($request->all());
    }
}
