<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Sanctum\HasApiTokens;

class StoreAccountModel extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    use HasApiTokens;
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
