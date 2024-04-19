<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreAccountModel extends Model
{
    use HasFactory;
    protected $table = 'account.store_account';
    protected $primaryKey = 'account';
    public $timestamps = true;

    public $fillable =[
        'account',
        'password',
        'name',
        'phone',
        'email',
    ];
}
