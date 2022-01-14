<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));
    }
    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_ja' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name_en.required' => 'Category En không được bỏ trống',
            'category_name_ja.required' => 'Category Ja không được bỏ trống',
        ]);
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ja' => $request->category_name_ja,
            // Str::slug($request->input('name'), '-'),
            'category_slug_en' => Str::slug($request->input('category_name_en'), '-'),
            'category_slug_ja' => str_replace(' ', '-', $request->category_name_ja),
            'category_icon' => $request ->category_icon

        ]);
        $notification = array(
            'message' => 'Thêm Category thành công',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }
    public function CategoryUpdate(Request $request,$id)
    {
        Category::findOrFail($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ja' => $request->category_name_ja,
            // Str::slug($request->input('name'), '-'),
            'category_slug_en' => Str::slug($request->input('category_name_en'), '-'),
            'category_slug_ja' => str_replace(' ', '-', $request->category_name_ja),
            'category_icon' => $request ->category_icon

            ]);
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.category')->with($notification);

    }

    public function CategoryDelete($id){

    	Category::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Category Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    }
}
