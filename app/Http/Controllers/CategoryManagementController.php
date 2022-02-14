<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryClass;
use App\Models\ClassName;
use Illuminate\Http\Request;

class CategoryManagementController extends Controller
{
    protected $categories, $classes;

    public function __construct(){
        $this->classes = ClassName::where('status','!=',3)->get();
        $this->categories = Category::where('status','!=',3)->get();
    }

    public function index(){
        return view('category.manage',[
            'categories'=>$this->categories,
            'classes'=>$this->classes,
            ''
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $category = Category::whereRaw( 'LOWER(`name`) LIKE ?', [ $request->name ] )->first();
            if (!isset($category)){
                $category = new Category();
                $category->name = $request->name;
                $category->code = $request->code;
                $category->status = $request->status;
                $category->save();
                $categoryId = $category->id;
                $classError = $this->categoryClassSave($request,$categoryId);
                if ($classError==0){
                    return redirect('/category')->with('success','Category added successfully');
                }else{
                    return redirect('/category')->with('info','Category added successfully. But '.$classError.' class already included into another category was skipped. Please check !!');
                }
            }else{
                return redirect('/category')->with('info','Category already exist in the database');
            }
        }else{
            return back();
        }
    }

    public function categoryClassSave($request, $categoryId){
        $classError = 0;
        foreach ($request->classes as $classId){
            $categoryClass = CategoryClass::where('class_id','=',$classId)->first();
            if (!isset($categoryClass)){
                $categoryClass = new CategoryClass();
                $categoryClass->category_id = $categoryId;
                $categoryClass->class_id = $classId;
                $categoryClass->save();
            }else{
                $classError ++;
            }
        }
        return $classError;
    }

    public function update(Request $request){
        if ($request->post()){
            $category = Category::find($request->id);
            $category->name = $request->name;
            $category->code = $request->code;
            $category->status = $request->status;
            $category->save();

            if (count($request->classes)>0){
                $categoryClass = CategoryClass::where('category_id','=',$category->id)->get();
                foreach ($categoryClass as $class){
                    $class->delete();
                }
                $categoryId = $category->id;
                $classError = $this->categoryClassSave($request,$categoryId);
                if ($classError==0){
                    return redirect('/category')->with('success','Category updated successfully');
                }else{
                    return redirect('/category')->with('info','Category updated successfully. But '.$classError.' classes already included into another category was skipped. Please check !!');
                }
            }else{
                return redirect('/category')->with('success','Category info updated successfully');
            }
        }
    }

    public function delete($id){
        $category = Category::find($id);
        $category->status = 3;
        $category->save();

        $categoryClass = CategoryClass::where('category_id','=',$category->id)->get();
        foreach ($categoryClass as $class){
            $class->delete();
        }

        return redirect('/category')->with('success','Category info deleted successfully');
    }

    public function updateStatus($id){
        $category = Category::find($id);
        $category->status == 1 ? $category->status = 2 : $category->status = 1;
        $category->save();
        return redirect('/category')->with('success',"Category status updated successfully");
    }
}
