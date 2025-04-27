<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\AdminRequest;
use App\Models\Authorization;
 
class AdminController extends Controller
{
    
    public function __construct(){
        $this->middleware('can:index_admin') ->only('index');
        $this->middleware('can:create_admin') ->only('create');
        $this->middleware('can:edit_admin') ->only('edit');
        $this->middleware('can:delete_admin') ->only('destroy');
        $this->middleware('can:status_admin') ->only('status');
        $this->middleware('can:store_admin') ->only('store');
    }

    public function index()
    {
        try {
            $admins = Admin::where('id', '!=', auth()->user()->id) ->when(request()->keyword, function ($query) {
                $query->where('name', 'like', '%' . request()->keyword . '%')
                    ->orWhere('username', 'like', '%' . request()->keyword . '%');
            })
                ->when( !is_null(request()->status) , function ($query) {
                    $query->where('status', request()->status);
                })

                ->orderBy(request('search_by', 'id'), request('order_dir', 'desc'))

                ->paginate(request('show', 8));

            return view('admin.admins.index', compact('admins'));
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to fetch users: ' . $e->getMessage());
            return redirect()->back();
        }        
    }

    public function create()
    {
        $authorizations = Authorization::select('id', 'role')->get();
        return view('admin.admins.create', compact('authorizations'));
    }

   
    public function store(AdminRequest $request)
    {
        try {
            $request->validated();
            Admin::create($request->all());
            session()->flash('success', 'Admin created successfully');
            return redirect()->route('admin.admins.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create admin: ' . $e->getMessage());
            return redirect()->back();
        }
    }
 
    public function show(string $id)
    {
        //
    }

     
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        $authorizations = Authorization::select('id', 'role')->get();
        return view('admin.admins.edit', compact('admin', 'authorizations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request )
    { 
         try {
            $request->validated();
            $admin = Admin::findOrFail($request->id);
            $admin->update($request->all());
            session()->flash('success', 'Admin updated successfully');
            return redirect()->route('admin.admins.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update admin: ' . $e->getMessage());
            return redirect()->back();
        }
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $admin = Admin::findOrFail($request->id);
        $admin->delete();
        session()->flash('success', 'Admin deleted successfully');
        return redirect()->back(); 
    }
    
    public function status(Request $request){
        $admin = Admin::findOrFail($request->id);
        $admin->update(['status' => !$admin->status]);
        session()->flash('success', 'Admin status updated successfully');
        return redirect()->back();
    }
}
