<?php

namespace App\Http\Controllers\User;

use App\Enums\PaymentType;
use App\Http\Controllers\Controller;
use App\Models\PaymentTransaction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Unicodeveloper\Paystack\Exceptions\PaymentVerificationFailedException;
use Unicodeveloper\Paystack\Paystack;

class PaymentController extends Controller
{


    /**
     * @return Redirector|Application|RedirectResponse
     */
    public function redirectToGateway()
    {
        \request()->amount =  \request()->amount ."00";
        try{
            return (new Paystack)->getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            Session::flash('message', "The paystack token has expired. Please refresh the page and try again");
            return Redirect::back();
        }
    }


    /**
     * @return RedirectResponse
     * @throws PaymentVerificationFailedException
     */
    public function handleGatewayCallback(): RedirectResponse
    {
       // dd(\request());
        $paymentDetails = (new Paystack)->getPaymentData();
        $status = $paymentDetails['data']['status']; // Getting the status of the transaction
        $amount = $paymentDetails['data']['amount']; //Getting the Amount
        $reference = $paymentDetails['data']['reference'];

        $char = substr($reference, strpos($reference, "_") + 1);

        $arr = explode("_", $char, 2);
        $product_id = $arr[0];
        $product_type = $arr[1];
        $gateway_response = $paymentDetails['data']['gateway_response'];

        if($status === "success"){ //Checking to Ensure the transaction was succesful

            $data = new PaymentTransaction();
            $data->user_id = Auth::user()->id;
            $data->amount =  $amount;
            $data->ref_no = $reference;
            $data->description = "Transactional Payment";
            $data->extra = json_encode($paymentDetails);
            $data->product_id =  $product_id;
            $data->product_type = $product_type;
            $data->status = 1 ;
            $data->type = PaymentType::CREDIT;
            $data->save();
            Session::flash('message', "Payment Successful");

        } else {
            Session::flash('message', $gateway_response);
        }

        return redirect()->route('user.dashboard');
    }


    public static function handleCoursePayment(Request $request, $ref_no): void {
        $data = new PaymentTransaction();
        $data->user_id = Auth::user()->id;
        $data->amount =  $request->amount;
        $data->ref_no = $ref_no;
        $data->description = "Payment for ".$request->course_title;
        $data->extra = null;
        $data->type = PaymentType::DEBIT;
        $data->status = 1;
        $data->save();
    }


    public function success(Request $request): RedirectResponse
    {
        $data = new PaymentTransaction();
        $data->user_id = Auth::user()->id;
        $data->amount =  $request->amount /100;
        $data->ref_no = $request->reference;
        $data->description = "Speak Token Wallet Funding with Stripe";
        $data->extra = null;
        $data->status = 1 ;
        $data->type = PaymentType::CREDIT;
        $data->save();
        Session::flash('message', "Payment Successful");
        return redirect()->route('user.dashboard.wallet');

    }

    public function checkout(): RedirectResponse
    {
        return redirect()->route('admin.transactions.funding');
    }

}
