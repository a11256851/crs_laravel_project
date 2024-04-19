<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerAccountModel;
use App\Models\StoreAccountModel;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class log_in_out_Controller extends Controller
{
    
    public function log_in(Request $request){
        try{
            $request->validate([
                'account' => 'required',
                'password'=>'required',
            ]);
           
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['errors' => $e->errors()], 422);
        } 
        $account=$request->account;
        $password=$request->password;
        $AccountPassword=$request->only('account','password');
        if(strpos($account,'@')===0){
            $storeUser = StoreAccountModel::where('account', $account)->first();

            if ($storeUser && password_verify($password, $storeUser->password)) {
                Auth::login($storeUser);
                return response()->json(['message' => '登入成功'], Response::HTTP_OK);
            }else{
                return response()->json(['message' => '登入失敗'], Response::HTTP_UNAUTHORIZED);
            }

        }else{
            $customerUser = CustomerAccountModel::where('account', $account)->first();
            // 確認使用者存在並且密碼正確
            if ($customerUser && password_verify($password, $customerUser->password)) {
                Auth::login($customerUser);
                return response()->json(['message' => '登入成功'], Response::HTTP_OK);
            }else{
                return response()->json(['message' => '登入失敗'], Response::HTTP_UNAUTHORIZED);
            }
        }
       /* if (Auth::check()) {
            // 如果用戶已經登入
            return response()->json(['message' => '已經登入'], Response::HTTP_OK);
        } else {
            // 如果用戶沒有登入
            return response()->json(['message' => '尚未登入'], Response::HTTP_UNAUTHORIZED);
        }*/
       


    }
    
    public function log_out(){
        Auth::logout();
        return response()->json(['message' => '登出成功'], Response::HTTP_OK);
    }

    public function logcheck(){
        if (Auth::check()) {
            // 如果用戶已經登入
            return response()->json(['message' => '已經登入'], Response::HTTP_OK);
        } else {
            // 如果用戶沒有登入
            return response()->json(['message' => '尚未登入'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
