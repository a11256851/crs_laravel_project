<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerAccountModel;
use App\Models\StoreAccountModel;
use Symfony\Component\HttpFoundation\Response;
class registerController extends Controller
{
    //
    public function register(Request $request){
        try{

            $request->validate([
                'account' => 'required',
                'password'=>'required|min:6|max:20|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/',
                'name',
                'phone',
                'email'=>'email|unique:users',

                'birthday',
                'gender',
            ]);


        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['errors' => $e->errors()], 422);
        }

            $account = $request->input('account');
            $password = $request->input('password');
            $name = $request->input('name');
            $phone = $request->input('phone');
            $email = $request->input('email');
            $birthday = $request->input('birthday');
            $gender = $request->input('gender');

            if(strpos($account,'@')===0){
                $StoreAccount = new StoreAccountModel();
                $StoreAccount->account=$account;
                $StoreAccount->password=$password;
                $StoreAccount->name=$name;
                $StoreAccount->phone=$phone;
                $StoreAccount->email=$email;
                $StoreAccount->save();
                return response()->json(['成功'],Response::HTTP_CREATED);
                //return response($StoreAccount, Response::HTTP_CREATED);
            }else{
                $CustomerAccount = new CustomerAccountModel();
                $CustomerAccount->account=$account;
                $CustomerAccount->password=$password;
                $CustomerAccount->name=$name;
                $CustomerAccount->phone=$phone;
                $CustomerAccount->email=$email;
                $CustomerAccount->birthday=$birthday;
                $CustomerAccount->gender=$gender;
                $CustomerAccount->save();
                return response()->json(['成功'],Response::HTTP_CREATED);
                //return response($CustomerAccount, Response::HTTP_CREATED);
            }
    }
}
