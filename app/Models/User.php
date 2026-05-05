<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The table associated with the model (M_DataAkun).
     */
    protected $table = 'm_data_akun';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'full_name',
        'email',
        'phone_number',
        'profile_picture',
        'address',
        'city',
        'country',
        'district',
        'province',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Check if the user is an admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if the user is a supplier.
     */
    public function isSupplier(): bool
    {
        return $this->role === 'supplier';
    }

    /**
     * Check if the user is a customer.
     */
    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }

    /**
     * Get the supplier data associated with this account.
     */
    public function supplier()
    {
        return $this->hasOne(DataSupplier::class, 'akun_id');
    }

    /**
     * Get the customer data associated with this account.
     */
    public function customer()
    {
        return $this->hasOne(DataCustomer::class, 'akun_id');
    }

    /**
     * Accessor: use full_name as the "name" attribute for compatibility.
     */
    public function getNameAttribute()
    {
        return $this->full_name;
    }
}
