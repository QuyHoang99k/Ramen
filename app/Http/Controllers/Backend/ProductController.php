<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));
    }

    public function StoreProduct(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        // ]);
        // if ($files = $request->file('file')) {
        //     $destinationPath = 'upload/pdf'; // upload path
        //     $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //     $files->move($destinationPath, $digitalItem);
        // }
        $image = $request->product_thambnail;
        $path = 'upload/products/thambnail/';
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save($path.$name_gen);
        $save_url = $path.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ja' => $request->product_name_ja,
            'product_slug_en' =>  Str::slug($request->input('product_name_en'), '-'),
            'product_slug_ja' => str_replace(' ', '-', $request->product_name_ja),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ja' => $request->product_tags_ja,
            'product_size_en' => $request->product_size_en,
            'product_size_ja' => $request->product_size_ja,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ja' => $request->short_descp_ja,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ja' => $request->long_descp_ja,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $save_url,
            // 'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);
        // Multiple Image Upload Start

        $images = $request->file('multi_img');
        if ($request->hasFile('multi_img')) {
            foreach ($images as $img) {
                $path_multi = 'upload/products/multi-image/';
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(917, 1000)->save($path_multi.$make_name);
                $uploadPath = $path_multi.$make_name;
                MultiImg::insert([
                    'product_id' => $product_id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(),
                ]);
            }
        }
        // Een Multiple Image Upload Start
        $notification = array(
            'message' => 'Thêm sản phẩm thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function ManageProduct()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }
    public function EditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategory', 'subsubcategory', 'products', 'multiImgs'));
    }
    public function ProductDataUpdate(Request $request)
    {
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ja' => $request->product_name_ja,
            'product_slug_en' =>  Str::slug($request->input('product_name_en'), '-'),
            'product_slug_ja' => str_replace(' ', '-', $request->product_name_ja),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ja' => $request->product_tags_ja,
            'product_size_en' => $request->product_size_en,
            'product_size_ja' => $request->product_size_ja,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ja' => $request->short_descp_ja,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ja' => $request->long_descp_ja,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Cập Nhật Sản Phẩm Thành Công',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    }
    public function MultiImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink(public_path($imgDel->photo_name));

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save(public_path('upload/products/multi-image/' . $make_name));
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),

            ]);
        } // end foreach
        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
    public function ThambnailImageUpdate(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink(public_path($oldImage));

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save(public_path('upload/products/thambnail/' . $name_gen));
        $save_url = 'upload/products/thambnail/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),

        ]);

        $notification = array(
            'message' => 'Product Image Thambnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
    public function MultiImageDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        unlink(public_path($oldimg->photo_name));
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Ẩn Sản Phẩm',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Hiện Sản Phẩm',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function ProductDelete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method


    public function ProductStock()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_stock',compact('products'));
    }

}
