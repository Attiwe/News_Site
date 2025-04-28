<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $contacts = Contact::when(request()->keyword, function ($query) {
                $query->where('name', 'like', '%' . request()->keyword . '%')
                    ->orWhere('email', 'like', '%' . request()->keyword . '%')
                    ->orWhere('title', 'like', '%' . request()->keyword . '%');
            })
                ->when( !is_null(request()->status) , function ($query) {
                    $query->where('status', request()->status);
                })

                ->orderBy(request('search_by', 'id'), request('order_dir', 'desc'))

                ->paginate(request('show', 5));

            return view('admin.contactUs.index', compact('contacts'));
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to fetch users: ' . $e->getMessage());
            return redirect()->back();
        }            

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['status' => 1]);
        return view('admin.contactUs.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();
            session()->flash('success', 'Contact deleted successfully');
            return redirect()->route('admin.contact-us.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete contact: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
