<?php

namespace App\Repositories;
use App\Models\Account;
use App\Models\Contact;
use App\Interface\AccountRepositoryInterface;

class AccountRepository implements AccountRepositoryInterface 
{
    public function all($fields){
        $accounts = Account::all($fields);
        return $accounts;
    }
   
    public function find($id){
      
        $account = Account::find($id);
        return $account;
    }
    public function update($id,$input){
        $account = Account::find($id);
        $account->update($input);
        return (Account::find($id));
        
    }
    public function delete($id){
        // dd($id);
        $account = Account::find($id);
        $account->delete();
        return true;
    }
    public function create($data)
    {
        // dd($data);
        $account = Account::create($data);
        return $account;
    }
}