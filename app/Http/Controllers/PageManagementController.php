<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageManagementController extends Controller
{
    public $pages = [
        ['name'=>'registration_rules','title'=>'Registration Rules','thumbnail'=>null,'content'=>'--','status'=>2],
        ['name'=>'results','title'=>'Result','thumbnail'=>null,'content'=>'--','status'=>2]
    ];

    public function __construct(){
        foreach ($this->pages as $page){
            $checked = Page::where('name','=',$page['name'])->first();
            if (!isset($checked)){
                $createPage = new Page();
                $createPage->name  = $page['name'];
                $createPage->title      = $page['title'];
                $createPage->thumbnail  = $page['thumbnail'];
                $createPage->content    = $page['content'];
                $createPage->status     = $page['status'];
                $createPage->save();
            }
        }
    }

    public function index(){
        return view('pages.manage',[
            'pages'=>Page::all(),
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $page = new Page();
            $page->name = $request->name;
            $page->title = $request->title;
            $page->content = $request->page_content;
            if (isset($request->thumbnail)){
                $page->thumbnail = fileUpload($request->file('thumbnail'),'page-thumbnail');
            }
            $page->status = 2;
            $page->save();
            return redirect('/pages')->with('success','Page added successfully');
        }else{
            return back();
        }
    }

    public function pageEdit(Request $request){
        return view('pages.edit',[
            'page'=>Page::find($request->id)
        ]);
    }

    public function update(Request $request){
        if ($request->post()){
            $page = Page::find($request->id);
            $page->name = $request->name;
            $page->title = $request->title;
            $page->content = $request->page_content;
            if (isset($request->thumbnail)){
                if (file_exists($page->thumbnail)){unlink($page->thumbnail);}
                $page->thumbnail = fileUpload($request->file('thumbnail'),'page-thumbnail');
            }
            $page->save();
            return redirect('/pages')->with('success','Page updated successfully');
        }
    }

    public function delete($id){
        $page = Page::find($id);
        $page->status = 3;
        $page->save();

        return redirect('/pages')->with('success','Page deleted successfully');
    }

    public function updateStatus($id){
        $page = Page::find($id);
        $page->status == 1 ? $page->status = 2 : $page->status = 1;
        $page->save();
        return redirect('/pages')->with('success',"Page status updated");
    }
}
