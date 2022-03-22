<?php

namespace App\Repositories;
use App\Models\Account;
use App\Models\Contact;
use App\Interface\AccountRepositoryInterface;

class AccountRepository implements AccountRepositoryInterface 
{
    public function all(){
        $accounts = Account::all();
        
        return $accounts;
    }
    public function find($id){
        $account = Account::find($id);
        // $account = Contact::find($id)->;
        // dd($account);
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
    public function create($data)
    {
        Account::create($data);{
            $contact = Contact::find('9928cc00-5fb8-4026-a182-f1f67bcb79a5');
            $accounts = Account::with('contacts')->first();
            $accounts->contacts()->attach($contact);
        }
   }
}