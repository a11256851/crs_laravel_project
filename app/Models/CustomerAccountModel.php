<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class CustomerAccountModel extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
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
    public function getAuthIdentifierName()
    {
        return $this->primaryKey;
    }
    public function getAuthIdentifier()
    {
        return $this->{$this->primaryKey};
    }
    public function getAuthPassword()
    {
        return $this->password;
    }
}
