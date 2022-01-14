<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brands_view', compact('brands'));
    }
    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_ja' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name_en.required' => 'Tên Thương hiệu En không được bỏ trống',
            'brand_name_ja.required' => 'Tên Thương hiệu Ja không được bỏ trống',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save(public_path('upload/brand/' . $name_gen));

        // $path = public_path('upload/brand/' . $name_gen);
        // Image::make($image->getRealPath())->resize(300, 300)->save($path);
        $save_url = 'upload/brand/' . $name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_ja' => $request->brand_name_ja,
            // Str::slug($request->input('name'), '-'),
            'brand_slug_en' => Str::slug($request->input('brand_name_en'), '-'),
            'brand_slug_ja' => str_replace(' ', '-', $request->brand_name_ja),
            'brand_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'Thêm Thương Hiệu thành công',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function BrandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brands_edit', compact('brand'));
    }

    public function BrandUpdate(Request $request)
    {
        $brand_id = $request->id;
    	$old_img = $request->old_image;

        if ($request->file('brand_image')) {
            unlink(public_path($old_img));
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('upload/brand/' . $name_gen));

            // $path = public_path('upload/brand/' . $name_gen);
            // Image::make($image->getRealPath())->resize(300, 300)->save($path);
            $save_url = 'upload/brand/' . $name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ja' => $request->brand_name_ja,
                // Str::slug($request->input('name'), '-'),
                'brand_slug_en' => Str::slug($request->input('brand_name_en'), '-'),
                'brand_slug_ja' => str_replace(' ', '-', $request->brand_name_ja),
                'brand_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Cập Nhật thương Hiệu thành công',
                'alert-type' => 'success',
            );

            return redirect()->route('all.brand')->with($notification);
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ja' => $request->brand_name_ja,
                // Str::slug($request->input('name'), '-'),
                'brand_slug_en' => Str::slug($request->input('brand_name_en'), '-'),
                'brand_slug_ja' => str_replace(' ', '-', $request->brand_name_ja),
            ]);
            $notification = array(
                'message' => 'Cập Nhật thương Hiệu thành công',
                'alert-type' => 'info',
            );

            return redirect()->route('all.brand')->with($notification);
        }
    }
    public function BrandDelete($id)
    {
        $brand = Brand::findOrFail($id);
    	$img = $brand->brand_image;
    	unlink(public_path($img));

    	Brand::findOrFail($id)->delete();

    	 $notification = array(
			'message' => 'Brand Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }
}
