<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    protected $fillable = ['admin_id', 'user_id', 'challan_no', 'date', 'note',];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function items(){
        return $this->hasMany(sale_item::class);
    }
}
