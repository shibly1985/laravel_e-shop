<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class cateController extends Controller {

    public function addCategory() {
        return view('admin.home.category.addCategory');
    }

    public function saveCategory(Request $request) {
        $this->validate($request, [
            'categoryName' => 'required',
            'categoryDescription' => 'required',
        ]);

        /*
          $category=new Category;
          $category->categoryName = $request->categoryName;
          $category->categoryDescription = $request->categoryDescription;
          $category->publicationStatus = $request->publicationStatus;
          $category->save();
          //return ('Data Save Succesfully.');
          //return  redirect('backEnd.category.addCategory','message','Data Save Succesfully');
          //return view('backEnd.category.addCategory');
         * */
        // if i use facade for inserting i must have to use 
        // protected $fillable=['categoryName','categoryDescription','publicationStatus'];
        // in model
        Category::create($request->all());
        return redirect('/category/add')->with('message', 'Category Save Succesfully');

        /*
          DB::table('category_models')->insert([
          'categoryName' => $request->categoryName,
          'categoryDescription' => $request->categoryDescription,
          'publicationStatus' => $request->publicationStatus,
          ]);
         * */
    }

    public function manageCategory() {
       // $categories = Category::all();
        $categories=Category::paginate(50);
        return view('admin.home.category.manageCategory', ['data' => $categories]);
    }

    public function editCategory($id) {
        //$categories= categoryModel::all();
        //return $id;
        $categoryByID = Category::where('id', $id)->first();
        return view('admin.home.category.editCategory', ['data' => $categoryByID]);
    }

    public function updateCategory(Request $request) {
        // dd($request->all()); * it shows the all request form data

        $category = Category::find($request->categoryID);
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        return redirect('/category/manage')->with('message', 'Category Update Succesfully');
    }

    public function deleteCategory($id) {

        $category = Category::find($id);
        $category->delete();
        return redirect('/category/manage')->with('message', 'Category Delete Succesfully');
    }

}
