<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use DB;

class subcategoryController extends Controller {

    public function addSubCategory() {
        $categories = Category::all();
        return view('admin.home.subcategory.addSubCategory', ['data' => $categories]);
    }

    public function saveSubCategory(Request $request) {
        $this->validate($request, [
            'subCategoryName' => 'required',
            'categoryId' => 'required',
            'subCategoryDescription' => 'required',
        ]);

        /*
          $category=new Category;
          $category->productName = $request->categoryName;
          $category->productDescription = $request->categoryDescription;
          $category->publicationStatus = $request->publicationStatus;
          $category->save();
          //return ('Data Save Succesfully.');
          //return  redirect('backEnd.category.addCategory','message','Data Save Succesfully');
          //return view('backEnd.category.addCategory');
         * */
        // if i use facade for inserting i must have to use 
        // protected $fillable=['categoryName','categoryDescription','publicationStatus'];
        // in model
        Subcategory::create($request->all());
        return redirect('/subcategory/add')->with('message', 'Sub-Category Save Succesfully');

        /*
          DB::table('category_models')->insert([
          'categoryName' => $request->categoryName,
          'categoryDescription' => $request->categoryDescription,
          'publicationStatus' => $request->publicationStatus,
          ]);
         * */
    }

    public function manageSubCategory() {
        //$subCategories = Subcategory::all();
        //$categories=Category::paginate(15);
        $subCategories = DB::table('subcategories')
            ->join('categories', 'subcategories.categoryId', '=', 'categories.id')            
            ->select('subcategories.*', 'categories.categoryName')
            ->get();  
        return view('admin.home.subcategory.manageSubCategory', ['data' => $subCategories]);
    }

    public function editSubCategory($id) {
        //$categories= categoryModel::all();
        //return $id;
        $subCategoryByID = Subcategory::where('id', $id)->first();
        return view('admin.home.subcategory.editSubCategory', ['data' => $subCategoryByID]);
    }

    public function updateSubCategory(Request $request) {
        // dd($request->all()); * it shows the all request form data

        $category = Subcategory::find($request->categoryID);
        $category-> categoryName = $request->categoryName;
        $category-> categoryDescription = $request->categoryDescription;
        $category-> publicationStatus = $request->publicationStatus;
        $category-> save();
        return redirect('/subcategory/manage')->with('message', 'Sub-Category Update Succesfully');
    }

    public function deleteSubCategory($id) {

        $category = Subcategory::find($id);
        $category->delete();
        return redirect('/subcategory/manage')->with('message', 'Sub-Category Delete Succesfully');
    }

}
