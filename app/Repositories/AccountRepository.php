<?php

namespace App\Repositories;
use App\Models\Account;
use App\Interface\AccountRepositoryInterface;

class AccountRepository implements AccountRepositoryInterface 
{
    public function all(){
        $accounts = Account::all();
        return $accounts;
    }
    public function find($id){
        $account = Account::find($id);
        return $account;
    }
    public function update($id,$request){
        $fields = $request->all();
        // $account = new account;
        $account = account::find($id);
        $account->update($fields);
       
        return redirect()->route('account.index')->with('Success','Person details has been updated successfully');
  
    }
    public function delete($id){
        return Account::find($id)->delete();
    }
    public function create($data){
     
        $account = Account::create($data);
   }
}