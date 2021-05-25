<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = CategoryModel::orderBy('created_at','DESC') -> search()-> paginate(20);
       
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'name' => 'required|unique:category',
            'prioty' => 'required'
        ],[
            'name.required' => 'Ten danh muc khong trong',
            'prioty.required' => 'thu tu uu tien khong trong',
            'name.unique' => 'Danh Muc da co '
        ]);
        if(CategoryModel::created($request -> all())){
            return redirect()-> route('category.index') -> with('success', 'Them moi danh muc thanh cong');
            }
    } 
      

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryModel $category)
    {
        if($category-> products ->count() > 0){
            return redirect() -> route('category.index') -> with('error', 'Khong the xoa!');
        }
        else {
            $category -> delete();
            return redirect()-> route('category.index') -> with('success', 'Xoa thanh cong.');
        }
        $category -> delete();

    }
}
