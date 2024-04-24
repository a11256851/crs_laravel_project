<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class ShopModel extends Model
{
    use HasFactory;
    protected $StoreAccount;
    protected $table=$StoreAccount;
    protected $primaryKey = 'storeID';
    protected $fillable =   [   'storeID',
                                'storeName',
                                'phone',
                                'address',
                                'description',
                                'opening_hours',
                                'image',
                                'type'
];

    public function setStoreAccount($Account){

        $Account='shop.'.$Account.'_shop';

        $this->StoreAccount=$Account;
    }
}
