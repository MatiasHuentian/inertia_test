<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Country;
use App\Models\Organization;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $filters = $request->all('search');
        $contacts = Contact::with('organization')->Filter($filters)
            ->latest('id')
            ->paginate();

        return Inertia::render('Contacts/Index', ['contacts' => $contacts, 'filters' => $filters]);
    }

    public function create()
    {
        $organizations = Organization::all();
        $countries = Country::all();
        return Inertia::render('Contacts/Create' , compact('organizations' , 'countries') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "first_name" => [ 'required' ],
            "last_name" => [ 'required' ],
            "organization_id" => [ 'required' ],
            "email" => [ 'required' ],
            "phone" => [ 'required' ],
            "address" => [ 'required' ],
            "city" => [ 'required' ],
            "state" => [ 'required' ],
            "country_id" => [ 'required' ],
            "postal_code" => [ 'required' ],
        ]);

        $contact = Contact::create($data);

        return redirect()->route('contacts.edit' , $contact->id);
        return $request->all();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return Inertia::render('Contacts/Edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
