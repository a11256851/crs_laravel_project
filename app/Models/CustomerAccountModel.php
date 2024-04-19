<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAccountModel extends Model
{
    use HasFactory;
    protected $table = 'account.customer_account';
    protected $primaryKey = 'account';
    public $timestamps = true;

    public $fillable =[
        'account',
        'password',
        'name',
        'phone',
        'email',
        'birthday',
        'gender',
    ];
}
