<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function ReviewStore(Request $request)
    {
        $product_id = $request->product_id;

        $request->validate([
            'summary' => 'required',
            'comment' => 'required',
        ]);
        Review::insert([
            'product_id' => $product_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'rating' => $request->quality,
            'created_at' =>Carbon::now(),
        ]);

        $notification = array(
			'message' => 'Đánh giá sẽ được phê duyệt bởi quản trị viên',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function PendingReview()
    {
        $review = Review::where('status',0)->orderBy('id','DESC')->get();
    	return view('backend.review.pending_review',compact('review'));
    }

    public function ReviewApprove($id){

    	Review::where('id',$id)->update(['status' => 1]);

    	$notification = array(
            'message' => 'Phê duyệt thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end mehtod

    public function PublishReview(){
        $review = Review::where('status',1)->orderBy('id','DESC')->get();
            return view('backend.review.publish_review',compact('review'));
        }


        public function DeleteReview($id){
            Review::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Xóa đánh giá thành công',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } // end method
}
