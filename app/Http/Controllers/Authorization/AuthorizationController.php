<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorizationRequest;
use App\Models\Authorization;

class AuthorizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:index_authorization')->only('index');
        $this->middleware('can:create_authorization')->only('create','store' );
        $this->middleware('can:edit_authorization')->only('edit', 'update');
         $this->middleware('can:delete_authorization')->only('destroy');
    }
     
    public function index()
    {
        $authorizations = Authorization::latest()->paginate(8);
        return view('admin.authorization.index', compact('authorizations'));  
    }

    public function create()
    {
        return view('admin.authorization.create');
    }
 
    public function store(AuthorizationRequest $request)
    {
      try {
        $request->validated();
        Authorization::create($request->all());
        session()->flash('success', 'Permission created successfully');
        return redirect()->back();
     } catch (\Exception $e) {
        session()->flash('error', 'Failed to create permission: ' . $e->getMessage());
        return redirect()->back();
     }
      
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $authorizations = Authorization::findOrFail($id);
        return view('admin.authorization.edit', compact('authorizations'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorizationRequest $request )
    {
        try {
            $request->validated();
            $authorizations = Authorization::findOrFail($request->id);
            $authorizations->update($request->all());
            session()->flash('success', 'Permission updated successfully');
            return redirect()->route('admin.authorization.index',['page' => request()->page]);
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update permission: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    
    public function destroy(Request $request)
    {
        $authorizations = Authorization::findOrFail($request->id);
        if($authorizations->admins()->count() > 0){
            session()->flash('warning', 'Cannot delete permission as it is associated with an admin');
            return redirect()->back();
        }
        $authorizations->delete();
        session()->flash('success', 'Permission deleted successfully');
        return redirect()->back();
    }
}
