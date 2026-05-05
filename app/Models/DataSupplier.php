<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSupplier extends Model
{
    /**
     * The table associated with the model (M_DataSupplier).
     */
    protected $table = 'm_data_supplier';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'supplier_name',
        'username',
        'password',
        'image',
        'akun_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the account (M_DataAkun) associated with this supplier.
     */
    public function akun()
    {
        return $this->belongsTo(User::class, 'akun_id');
    }
}
