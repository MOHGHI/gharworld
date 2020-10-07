<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalContactRequest;
use App\LocalContact;
use App\Service\LocalContactService;
use Illuminate\Support\Facades\Storage;

class LocalContactController extends Controller
{
    private $localContactService;

    public function __construct(LocalContactService $localContactService)
    {
        $this->localContactService = $localContactService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LocalContact $localContact = null)
    {
        $localContacts=LocalContact::latest()->paginate(20);
        return view('local-contact.index', compact('localContacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('local-contact.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalContactRequest $request)
    {
        $this->localContactService->create($request->validated());
        return redirect()->route('local-contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LocalContact  $localContact
     * @return \Illuminate\Http\Response
     */
    public function show(LocalContact $localContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LocalContact  $localContact
     * @return \Illuminate\Http\Response
     */
    public function edit(LocalContact $localContact)
    {
        return view('local-contact.create-edit', compact('localContact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LocalContact  $localContact
     * @return \Illuminate\Http\Response
     */
    public function update(LocalContactRequest $request, LocalContact $localContact)
    {
        $this->localContactService->update($localContact, $request->validated());

        return redirect()->back()->with('success', 'Alright, the information got updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LocalContact  $localContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocalContact $localContact)
    {
        Storage::delete($localContact->image);
        $localContact->delete();
        return redirect()->back()->with('success','Local Contact Data deleted');
    }
}
