<?php

namespace App\Http\Controllers;
use App\User;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;

class UserPaymentsController extends Controller
{
    public function __construct()
    {
        $this->data['tab_manu'] = 'payments';
    }

    public function index($id)
    {
        $this->data['user'] = User::findOrFail($id);
        return view('users.payments.payments', $this->data);
    }

    public function store(PaymentRequest $request, $user_id){
        $formdata = $request->all();
        $formdata['user_id'] = $user_id;
        $formdata['admin_id'] = Auth::id();
        Payment::create($formdata);
        return redirect()->route('users.payments', $user_id)->with('message', 'Payments Added Successfully');
    }

    public function destroy($user_id, $payment_id){

        Payment::destroy($payment_id);
        return redirect()->route('users.payments', $user_id)->with('message', 'Payments Deleted Successfully');
    }
}
