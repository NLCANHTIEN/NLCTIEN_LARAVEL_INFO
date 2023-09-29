<?php


namespace App\Http\Controllers\Shop;


use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        if (Cart::count() == 0)
            return view('shop.shopcart.cart_empty');
        else return view('shop.shopcart.cart');
    }
    public function add($id)
    {
        $product = Product::where('id', $id)->first();
        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->price,
            'qty' => 1,
            'weight' => 0,
            'options' => [
                'image' => $product->image
            ]
        ]);
        return redirect()->back();
    }
    public function delete($row_id)
    {
        Cart::remove($row_id);
        return redirect()->back();
    }

    public function dec($row_id)
    {
        $row = Cart::get($row_id);
        if ($row->qty >= 1) {
            Cart::update($row_id, $row->qty - 1);
        }
        return redirect()->back();
    }

    public function inc($row_id)
    {
        $row = Cart::get($row_id);
        if ($row->qty < 10) {
            Cart::update($row_id, $row->qty + 1);
        }
        return redirect()->back();
    }
    public function checkout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('shop.shopcart.checkout', compact('user'));
        } else
            return redirect(route('login'))->with('success', 'Please login to checkout');
    }
    public function doCheckout(Request $request)
    {
        $validate = $request->validate([
            //'name' => ['required', 'max:255'],
            //'email' => ['required', ':email'],
            'address' => ['required', 'max:200'],
            'phone' => ['required', ':max:20'],
        ]);
        //Cập nhập thông tin khách hàng
        $user = User::find(Auth::user()->id);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        //Lưu thông tin bảng Orders
        $order = new Order;
        $order->customer_id = Auth::user()->id;
        $order->total = Cart::total();
        $order->note = $request->note;
        $order->status = 1;
        $order->save();

        //Cập nhập thông tin chi tiết đơn hàng
        foreach (Cart::content() as $row) {
            $orderDetail = new OrderDetail;
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $row->id;
            $orderDetail->price = $row->price;
            $orderDetail->quantity = $row->qty;
            $orderDetail->save();
        }
        //Xóa nội dung Cart
        Cart::destroy();
        return view('shop.shopcart.order_success');
    }
}
