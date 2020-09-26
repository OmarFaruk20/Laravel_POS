<?php

namespace App\Http\Controllers;

use App\Receipt;
use App\User;
use App\Http\Requests\ReceiptRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserReceiptsController extends Controller
{
    public function __construct()
    {
        $this->data['tab_manu'] = 'receipts';
    }

    public function index($id)
    {
        $this->data['user'] = User::findOrFail($id);
        return view('users.receipts.receipts', $this->data);
    }

    public function store(ReceiptRequest $request, $user_id){
        $formdata = $request->all();
        $formdata['user_id'] = $user_id;
        $formdata['admin_id'] = Auth::id();
        Receipt::create($formdata);
        return redirect()->route('users.receipts', $user_id)->with('message', 'Receipts Added Successfully');
    }

    public function destroy($user_id, $receipts_id){

        Receipt::destroy($receipts_id);
        return redirect()->route('users.receipts', $user_id)->with('message', 'Receipts Deleted Successfully');
    }

}
