<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;


class BlogController extends Controller
{
    public function BlogCategory()
    {
        $blogcategory = BlogPostCategory::latest()->get();
    	return view('backend.blog.category.category_view',compact('blogcategory'));
    }

    public function BlogCategoryStore(Request $request)
    {
        $request->validate([
            'blog_category_name_vn' => 'required',
            'blog_category_name_ja' => 'required',
        ], [
            'blog_category_name_vn.required' => 'Category En không được bỏ trống',
            'blog_category_name_ja.required' => 'Category Ja không được bỏ trống',
        ]);
        BlogPostCategory::insert([
            'blog_category_name_vn' => $request->blog_category_name_vn,
            'blog_category_name_ja' => $request->blog_category_name_ja,
            // Str::slug($request->input('name'), '-'),
            'blog_category_slug_vn' => Str::slug($request->input('blog_category_name_vn'), '-'),
            'blog_category_slug_ja' => str_replace(' ', '-', $request->blog_category_name_ja),
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Thêm Danh Mục Bài Viết Thành Công',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function BlogCategoryEdit($id)
    {
        $blogcategory = BlogPostCategory::findOrFail($id);
    	return view('backend.blog.category.category_edit',compact('blogcategory'));
    }

    public function BlogCategoryUpdate(Request $request)
    {
        $blog_id = $request->id;

        BlogPostCategory::findOrFail( $blog_id)->update([
            'blog_category_name_vn' => $request->blog_category_name_vn,
            'blog_category_name_ja' => $request->blog_category_name_ja,
            // Str::slug($request->input('name'), '-'),
            'blog_category_slug_vn' => Str::slug($request->input('blog_category_name_vn'), '-'),
            'blog_category_slug_ja' => str_replace(' ', '-', $request->blog_category_name_ja),
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Chỉnh Sửa Danh Mục Bài Viết Thành Công',
            'alert-type' => 'success',
        );

        return redirect()->route('blog.category')->with($notification);
    }


    public function ListBlogPost()
    {
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_list',compact('blogpost'));

    }


    public function AddBlogPost()
    {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_add',compact('blogpost','blogcategory'));
    }

    public function BlogPostStore(Request $request)
    {
        $request->validate([
            'post_title_vn' => 'required',
            'post_title_ja' => 'required',
            'post_image' => 'required',
        ], [
            'post_title_vn.required' => 'Tên bài viết VN không được bỏ trống',
            'post_title_ja.required' => 'Tên bài viết Ja không được bỏ trống',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save(public_path('upload/post/' . $name_gen));

        // $path = public_path('upload/brand/' . $name_gen);
        // Image::make($image->getRealPath())->resize(300, 300)->save($path);
        $save_url = 'upload/post/' . $name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_vn' => $request->post_title_vn,
            'post_title_ja' => $request->post_title_ja,
            'post_details_vn' => $request->post_details_vn,
            'post_details_ja' => $request->post_details_ja,
            // Str::slug($request->input('name'), '-'),
            'post_slug_vn' => Str::slug($request->input('post_title_vn'), '-'),
            'post_slug_ja' => str_replace(' ', '-', $request->post_title_ja),

            'post_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'Thêm bài viết thành công',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

}
