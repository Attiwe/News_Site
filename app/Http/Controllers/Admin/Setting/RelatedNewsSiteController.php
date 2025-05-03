<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RelatedNewsSite;

class RelatedNewsSiteController extends Controller
{
    
    public function index()
    {
        $relatedNewsSites = RelatedNewsSite::paginate(8);
        return view('admin.relateNewSite.index', compact('relatedNewsSites'));
    }

    
    public function create()
    {
        return view('admin.relateNewSite.create');
    }

    public function store(Request $request)
    {
         $request->validate($this->filterData());
         $relatedNewsSite = RelatedNewsSite::create($request->all());
         return redirect()->route('admin.related-news-sites.index')->with('success', 'Related News Site created successfully');
    }

    public function filterData(){
        return [
            'name' => 'required',
            'url' => 'required|url',
        ];
    }
 
 
    public function update(Request $request)
    {
        $request->validate($this->filterData());
        $relatedNewsSite = RelatedNewsSite::findOrFail($request->id);
        $relatedNewsSite->update($request->all());
        return redirect()->route('admin.related-news-sites.index')->with('success', 'Related News Site updated successfully');
    }

    public function destroy(Request $request)
    {
        $relatedNewsSite = RelatedNewsSite::findOrFail($request->id);
        $relatedNewsSite->delete();
        return redirect()->route('admin.related-news-sites.index')->with('success', 'Related News Site deleted successfully');
    }
    
}
