<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceProductRequest;
use Illuminate\Support\Facades\Auth;
use App\SalesInvoice;
use App\Product;
use App\sale_item;
use Illuminate\Http\Request;

class UserSalesController extends Controller
{
    public function __construct()
    {
        $this->data['tab_manu'] = 'sales';
    }

    public function index($id)
    {
        $this->data['user'] = User::findOrFail($id);
        return view('users.sales.sales', $this->data);
    }

    public function CreateInvoice(InvoiceRequest $request, $user_id){
        $formData   = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        $Invoice = SalesInvoice::create($formData);
        return redirect()->route('users.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $Invoice->id]);
    }

    public function Invoice($user_id, $invoice_id){
        $this->data['user'] = User::findOrFail($user_id);
        $this->data['invoice'] = SalesInvoice::findOrFail($invoice_id);
        $this->data['products'] = Product::ArrayForSelect();
        return view('users.sales.invoice', $this->data);
    }

   public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id){
        $formData = $request->all();
        $formData['sales_invoice_id'] = $invoice_id;
        sale_item::create($formData);
        return redirect()->route('users.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id])->with('message', 'Item Added Successfully');
   }

   public function Destroy($user_id, $invoice_id){
            $delete = SalesInvoice::find($invoice_id)->delete();
            return redirect()->route('users.sales', ['id' => $user_id])->with('message', 'Invoice Deleted Successfully');
   }

   public function destroyItem($user_id, $invoice_id, $item_id){
        $delete = sale_item::find($item_id)->delete();
        return redirect()->route('users.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id])->with('message', 'Item Added Successfully');

   }

}
