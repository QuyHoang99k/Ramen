<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thambnail],
            ]);
            return response()->json(['success' => 'Thêm vào giỏ hàng thành công']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['image' => $product->product_thambnail],
            ]);
            return response()->json(['success' => 'Thêm vào giỏ hàng thành công']);
        }
    }
    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => number_format($cartTotal),

        ));
    } //End method
    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Xóa sản phẩm khỏi giỏ hàng thành công']);
    }

    public function AddToWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
            } else {
                return response()->json(['error' => 'Sản phẩm đã có trong danh sách yêu thích ']);
            }

            return response()->json(['success' => 'Thêm vào danh sách yêu thích thành công ']);
        } else {
            return response()->json(['error' => 'Vui lòng đăng nhập tài khoản ']);
        }
    }

    public function CouponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            $request->session()->put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => number_format(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => number_format(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),

            ]);
            return response()->json(array(
                'validity' => true,
                'success' => 'Sử dụng mã giảm giá thành công'
            ));
        } else {
            return response()->json(['error' => 'Mã giảm giá không hợp lệ ']);
        }
    }
    public function CouponCalculation(Request $request)
    {
        if ($request->session()->has('coupon')) {
            $cartTotal = Cart::total();

            return response()->json(array(

                'subtotal' => number_format($cartTotal),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            $cartTotal = Cart::total();

            return response()->json(array(
                'total' => number_format($cartTotal),
            ));
        }
    }
    public function CouponRemove(Request $request)
    {
        $request->session()->forget('coupon');
        return response()->json(['success' => 'Xóa mã giảm giá thành công']);
    }
    // Checkout Method
    public function CheckoutCreate()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
                return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal', 'divisions'));
            } else {

                $notification = array(
                    'message' => 'Giỏ hàng không có sản phẩm',
                    'alert-type' => 'error'
                );

                return redirect()->to('/')->with($notification);
            }
        } else {

            $notification = array(
                'message' => 'Bạn Cần Đăng Nhập',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);
        }
    } // end method
}
