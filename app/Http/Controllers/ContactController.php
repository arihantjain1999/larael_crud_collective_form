<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Interface\ContactRepositoryInterface;
// use Illuminate\Support\Facades\View;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $contactRepo ;
    public function __construct(ContactRepositoryInterface $contact)
    {
        $this->contactRepo = $contact;
        $this->middleware('auth');
    }

    public function index()
    {
        // $contacts = contact::orderby('id','asc')->paginate();
        return view('contact.index',['contacts' => $this->contactRepo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $fields = $request->all();
        $this->contactRepo->create($fields);
        
        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        return view('contact.show',['contact'=>$this->contactRepo->find($contact->id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        $contact = $this->contactRepo->find($contact->id);
        return view('contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        $this->contactRepo->update($contact->id,$request);
        return redirect()->route('contact.index')->with('Success','Person details has been updated successfully');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        $this->contactRepo->delete($contact->id);
        return redirect()->route('contact.index')->with('Success','Person details has been deleted successfully');
    
    }
}