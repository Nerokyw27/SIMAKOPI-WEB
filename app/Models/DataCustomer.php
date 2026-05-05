<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataCustomer extends Model
{
    /**
     * The table associated with the model (M_DataCustomer).
     */
    protected $table = 'm_data_customer';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'product_name',
        'quantity',
        'total_price',
        'akun_id',
    ];

    /**
     * Get the account (M_DataAkun) associated with this customer.
     */
    public function akun()
    {
        return $this->belongsTo(User::class, 'akun_id');
    }
}
