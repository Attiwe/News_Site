<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;




class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'can:category') ->only(' ');
        $this->middleware( 'can:index_category') ->only('index');
        $this->middleware( 'can:edit_category') ->only('update');
        $this->middleware( 'can:delete_category') ->only('destroy');
        $this->middleware( 'can:status_category') ->only('status');
        $this->middleware( 'can:create_category') ->only('create','store'); 
      }
   
    public function index()
    {  

        try {
            $categeries = Category::withCount('posts') ->when(request()->keyword, function ($query) {
                $query->where('name', 'like', '%' . request()->keyword . '%')
                    ->orWhere('slug', 'like', '%' . request()->keyword . '%');
            })
                ->when( !is_null(request()->status) , function ($query) {
                    $query->where('status', request()->status);
                })

                ->orderBy(request('search_by', 'id'), request('order_dir', 'desc'))

                ->paginate(request('show', 5));

            return view('admin.categories.index', compact('categeries'));
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to fetch users: ' . $e->getMessage());
            return redirect()->back();
        }        
    }

    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate($this->filterValidationCategory());
        $categery = Str::slug($request->name);
        $request->merge(['slug'=>$categery]);
        $categery = Category::create($request->all());
        session()->flash('success', 'Category created successfully');
        return redirect()->back();
    }

    private function filterValidationCategory(){
        return [
            'name' => ['required', 'string','max:255'],
            'status' => ['required', 'in:0,1'],    
        ];
    }
    


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request)
    {
        try {
            $request->validate($this->filterValidationCategory());
    
            $categery = Category::findOrFail($request->id);
        
              $slug = Str::slug($request->name);
        
             $request->merge(['slug' => $slug]);
        
            $categery->update($request->except('_token'));
    
             return redirect()->back() ->with('success', 'Category updated successfully');
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to update category: ' . $th->getMessage());
            return redirect()->back();
        }
       
    }
    


    public function destroy(Request $request )
    {
        $categery = Category::findOrFail($request->id);
        $categery->delete();
        session()->flash('success', 'Category deleted successfully');
        return redirect()->back();  
    }

    public function status(Request $request)
    {
         $categery = Category::findOrFail($request->id);
         $categery->update(['status' => !$categery->status]);
         session()->flash('success', 'Category status updated successfully');
         return redirect()->back();
    }
 }
