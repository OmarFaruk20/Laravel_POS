<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale_item extends Model
{
    protected $fillable = [ 'product_id', 'sales_invoice_id', 'price', 'quantity', 'total' ];

    public function invoice()
    {
    	return $this->belongsTo(SalesInvoice::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }


}
