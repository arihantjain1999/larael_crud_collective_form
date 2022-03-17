<?php

namespace App\Repositories;
use App\Models\Contact;
use App\Interface\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface 
{
    public function all(){
        $contact = Contact::all();
        return $contact;
    }
    public function find($id){
        $contact = Contact::find($id);
        return $contact;
    }
    public function update($id,$request){
        $fields = $request->all();
        $contact = Contact::find($id);
        $contact->update($fields);
       
        return redirect()->route('contact.index')->with('Success','Person details has been updated successfully');
  
    }
    public function delete($id){
        return Contact::find($id)->delete();
    }
    public function create($data){
        Contact::create($data);
   }
}