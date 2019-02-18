<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use App\Shipping;
use App\Order;
use App\Payment;
use App\OrderDetail;
use Cart;

class checkoutController extends Controller {

    public function index() {
        return view('frontEnd.checkout.checkOutContent');
    }

    public function customerRegistration(Request $request) {
        $customer = new Customer();

        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->emailAddress = $request->emailAddress;
        $customer->password = bcrypt($request->password);
        $customer->address = $request->address;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->districtName = $request->districtName;
        $customer->save();
        $customerId = $customer->id; // after insert this , it will get customer id which has inserted in the last time.
        Session::put('customerId', $customerId);
        Session::put('customerName', $request->firstName);
        return redirect('/checkout/shipping');
    }

    public function showShippingForm() {
        $customerId = Session::get('customerId');
        $customerByID = Customer::where('id', $customerId)->first();
        return view('frontEnd.checkout.shippingContent', ['customerByID' => $customerByID]);
    }

    public function saveShippingInfo(Request $request) {
        $shipping = new Shipping();
        $shipping->fullName = $request->fullName;
        $shipping->emailAddress = $request->emailAddress;
        $shipping->address = $request->address;
        $shipping->phoneNumber = $request->phoneNumber;
        $shipping->districtName = $request->districtName;
        $shipping->save();
        $shippingId = $shipping->id; // after insert this is, it will get customer id which has inserted the last time.
        Session::put('shippingId', $shippingId);
        return redirect('/checkout/payment');
    }

    public function showPaymentForm() {
        return view('frontEnd.checkout.paymentForm');
    }

    public function saveOrderInfo(Request $request) {
        $paymentType = $request->paymentType;
        if ($paymentType == 'cashOnDelivery') {

            $order = new Order();
            $order->customerId = Session::get('customerId');
            $order->shippingId = Session::get('shippingId');
            $order->orderTotal = Session::get('orderTotal');
            $order->save();
            $orderId = $order->id;
            Session::put('orderId', $orderId);

            $payment = new Payment();
            $payment->orderId = Session::get('orderId');
            $payment->paymentType = $paymentType;
            $payment->save();

            $orderDetail = new OrderDetail();
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail->orderId = Session::get('orderId');
                $orderDetail->productId = $cartProduct->id;
                $orderDetail->productName = $cartProduct->name;
                $orderDetail->productPrice = $cartProduct->price;
                $orderDetail->productQuantity = $cartProduct->qty;
                $orderDetail->save();
                Cart::remove($cartProduct->rowId);
            }
            return redirect('/checkout/my-home');
        } else if ($paymentType == 'bkash') {
            return ('Bkash is under construction.Please use Cash On Delivery.');
        } else if ($paymentType == 'paypal') {
            return ('Paypal is under construction.Please use Cash On Delivery.');
        }
    }

    public function orderConfirmation() {
        return view('frontEnd.checkout.orderConfirmation');
    }

}
