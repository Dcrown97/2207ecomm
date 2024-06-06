<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Sales;
use App\Models\Sold;
use App\Models\Tag;
use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Image;
use App\Models\Product;
use App\Models\Review;
use App\Models\Shipping;
use App\Models\Size;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function __construct()
    {
        Session::put('currency', 'Naira');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $latest = [];
        $latestProducts = Product::with('category', 'images', 'sizes')->latest()->take(2)->get();
        // dd($latestProducts);
        foreach ($categories as $cat) {
            $latest[] = $cat->products->where('posted', 1)->sortByDesc('created')->take(8);
        }
        $images = Image::inRandomOrder()->limit(5)->get();
        //            if(count($all)>5){
        //                $images = $all->random(5);
        //            } else {
        //                $images = $all->random(count($all));
        //            }
        // dd(session()->get('cart'));
        return view('welcome_new', ['cats' => $latest, 'latestProducts' => $latestProducts, 'images' => $images, 'categories' => $categories]);
    }

    public function shop(Request $request)
    {
        $cate = '';
        if (null != $request->cat && !empty($request->cat)) {
            $cat = Category::where('name', $request->cat)->first();
            $cate = $cat->name;
        }
        $size = 20;
        if (null != $request->size && !empty($request->size)) $size = $request->size;
        $sort = 'desc';
        if (null != $request->sort && !empty($request->sort)) $sort = $request->sort;
        if (isset($cat)) $products = Product::where('category_id', $cat->id)->where('posted', 1)->orderBy('created_at', $sort)->paginate($size);
        else $products = Product::where('posted', 1)->orderBy('created_at', $sort)->paginate($size);
        $cats = Category::all();
        $wishlist = [];
        if (Auth::user() != null) {
            $wish = WishList::where('user_id', Auth::user()->id)->get();
            $wishlist = $wish;
        } else {
            $wishes = $request->session()->get('wish');
            if (!empty($wishes)) {
                if (is_array($wishes)) {
                    foreach ($wishes as $w) {
                        $wish = Product::find($w);
                        $wishlist[] = $wish;
                    }
                } else {
                    $wish = Product::find($wishes);
                    $wishlist[] = $wish;
                }
            }
        }
        return view('newproducts', ['cats' => $cats, 'category' => $cate, 'products' => $products, 'wishlist' => $wishlist]);
    }

    public function cart(Request $request)
    {
        $locs = Shipping::all();
        $carts = [];
        if (Auth::user() != null) {
            $item = Cart::where('status', 1)->where('user_id', Auth::user()->id)->get();
            if ($item->isNotEmpty()) {
                foreach ($item as $c) {
                    $cart = Size::where('id', $c->size_id)->where('product_id', $c->product_id)->first();
                    $carts[] = $cart;
                }
            }
        } else {
            $cart_ids = $request->session()->get('cart');
            if (!empty($cart_ids)) {
                if (is_array($cart_ids)) {
                    foreach ($cart_ids as $id) {
                        $size = Size::where('id', $id['size'])->where('product_id', $id['product'])->first();
                        if (null != $size) $carts[] = $size;
                    }
                } else {
                    $cart = Cart::find($cart_ids);
                    if (null != $cart) $carts[] = $cart;
                }
            }
        }
        return view('cart', ['carts' => $carts, 'locs' => $locs]);
    }

    public function checkout(Request $request)
    {
        $products = [];
        $items = [];
        if ($request->product != null && !empty($request->product)) {
            $prods = json_decode($request->product);
            foreach ($prods as $product) {
                $size = Size::find($product->id);
                if (null != $size && !empty($size)) {
                    $item = [];
                    $item = Arr::add($item, 'name', $size->product->name);
                    $item = Arr::add($item, 'qty', $product->quantity);
                    $item = Arr::add($item, 'size', $product->id);
                    $item = ($request->session()->get('currency') == 'Naira') ? Arr::add($item, 'cost', $size->cost_ngn) : Arr::add($item, 'cost', $size->cost_dol);
                    $items[] = ['item' => $item];
                }
            }
            $products = Arr::add($products, 'items', $items);
            if (null != $request->ship) {
                $loc = Shipping::where('location', $request->ship)->first();
                if (null != $loc) {
                    $products = Arr::add($products, 'loc', $loc->id);
                    $products = ($request->session()->get('currency') == 'Naira') ? Arr::add($products, 'shipping', $loc->cost_ngn) : Arr::add($products, 'shipping', $loc->cost_dol);
                } else {
                    $products = Arr::add($products, 'shipping', 0);
                }
            } else {
                $products = Arr::add($products, 'shipping', 0);
            }
            if (null != $request->coupon) {
                $date = date('Y-m-d H:i:s', time());
                $coupon = Coupon::where('code', $request->coupon)
                    ->where('qty', '>', 'used')
                    ->where('start', '<=', $date)
                    ->where('end', '>=', $date)
                    ->first();
                if (null != $coupon) {
                    $products = Arr::add($products, 'coupon', $coupon->code);
                    $products = ($request->session()->get('currency') == 'Naira') ? Arr::add($products, 'coupon_amt', $coupon->cost_ngn) : Arr::add($products, 'coupon_amt', $coupon->cost_dol);
                } else {
                    $products = Arr::add($products, 'coupon', '');
                }
            } else {
                $products = Arr::add($products, 'coupon', '');
            }
            return view('newcheckout', ['products' => $products]);
        }
        return back();
    }

    public function add_wishlist(Request $request)
    {
        if ($request->product != null && !empty($request->product)) {
            $product = Product::where('name', $request->product)->first();
            if (null != $product && !empty($product)) {
                if (Auth::user() != null) {
                    $wishList = new WishList();
                    $wishList->user_id = $request->user_id;
                    $wishList->product_id = $product->id;
                    $wishList->save();
                    return response()->json(['status' => 'success']);
                } else {
                    if ($request->session()->has('wish')) {
                        $wish = $request->session()->get('wish');
                        if (in_array($product->id, $wish)) return back();
                    }
                    Session::push('wish', $product->id);
                    return response()->json(['status' => 'success']);
                }
            }
        }
        return back();
    }

    public function delete_wishlist(Request $request)
    {
        $product = Product::where('name', $request->product)->first();
        if (Auth::user() == null) {
            $products = $request->session()->pull('wish', []); // Second argument is a default value
            if (($key = array_search($product->id, $products)) !== false) {
                unset($products[$key]);
            }
            session()->put('wish', $products);
        } else {
            $item = WishList::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
            $item->delete();
        }
    }

    public function delete_cart(Request $request)
    {
        if (Auth::user() == null) {
            $products = $request->session()->pull('cart', []); // Second argument is a default value
            $rem = [];
            foreach ($products as $prod) {
                if ($prod['size'] != $request->size) $rem[] = $prod;
            }
            session()->put('cart', $rem);
        } else {
            $item = Cart::where('size_id', $request->size)->where('user_id', Auth::user()->id)->first();
            $item->delete();
        }
        return back();
    }

    public function add_cart(Request $request)
    {
        $product = Product::where('name', $request->product)->first();
        if (null != $product && !empty($product->id)) {
            if (Auth::user() != null) {
                if (null != Auth::user()->carts) {
                    foreach (Auth::user()->carts as $c) {
                        if ($c->size_id == $request->size && $c->product_id == $product->id) return back();
                    }
                }
                $cart = new Cart();
                $cart->size_id = $request->size;
                $cart->user_id = Auth::user()->id;
                $cart->product_id = $product->id;
                $cart->status = 1;
                $cart->save();
            } else {
                if ($request->session()->has('cart')) {
                    $current_cart = $request->session()->get('cart');
                    foreach ($current_cart as $cart) {
                        if ($cart['size'] == $request->size && $cart['product'] == $product->id) return back();
                    }
                }
                $request->session()->push('cart', ['size' => $request->size, 'product' => $product->id]);
            }
        }
        return back();
    }

    public function getCartCount()
    {
        if (Auth::check()) {
            $count = Auth::user()->carts->count();
        } else {
            $count = Session::has('cart') ? count(Session::get('cart')) : 0;
        }

        return response()->json(['count' => $count]);
    }


    public function getWishlistCount()
    {
        if (Auth::check()) {
            $count = Auth::user()->wishlists->count();
        } else {
            $count = Session::has('wish') ? count(Session::get('wish')) : 0;
        }

        return response()->json(['count' => $count]);
    }

    public function view_product($id = null)
    {
        if ($id == null) return back()->with('failed', ['Invalid URL!']);
        $products = Product::where('name', $id)->first();
        if ($products == null) return back()->with('failed', ['Product not found!']);
        $related = [];
        $prod_tag = $products->tags;
        if ($prod_tag->isNotEmpty()) {
            foreach ($prod_tag as $pt) {
                $tag = Tag::find($pt->id);
                if ($tag->products->isNotEmpty()) {
                    foreach ($tag->products as $prod) {
                        if ($prod->id != $products->id && $prod->posted == 1) $related[] = $prod;
                    }
                }
            }
        }
        $rating_sum = Review::selectRaw('SUM(rating) as rating')->where('product_id', $products->id)->first();
        $ratings = $products->reviews();
        $c = $ratings->count();
        $avr_rating = ($c > 0) ? $rating_sum->rating / $c : 0;
        $one = Review::where('product_id', $products->id)->where('rating', 1)->count();
        $two = Review::where('product_id', $products->id)->where('rating', 2)->count();
        $three = Review::where('product_id', $products->id)->where('rating', 3)->count();
        $four = Review::where('product_id', $products->id)->where('rating', 4)->count();
        $five = Review::where('product_id', $products->id)->where('rating', 5)->count();
        return view('newproduct_view', [
            'product' => $products,
            'avr' => $avr_rating,
            'one' => $one,
            'two' => $two,
            'three' => $three,
            'four' => $four,
            'five' => $five,
            'c' => $c,
            'related' => $related
        ]);
    }

    public function post_comment(Request $request)
    {

        $product = Product::where('name', $request->product)->first();
        if (null == $product || empty($product))
            return back()->withInput()->with('failed', ['COmment could not be added.lease try again!']);
        $comment = new Comment();
        $comment->product_id = $product->id;
        if (Auth::user() == null) {
            if (null == $request->name || empty($request->name))
                return back()->withInput()->with('failed', ['You must enter put your name for your comment to be added!']);
            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->phone = $request->phone;
        } else {
            $comment->name = Auth::user()->name;
            $comment->email = Auth::user()->email;
            $comment->phone = Auth::user()->phone;
        }
        $comment->message = $request->message;

        if ($comment->save()) {
            return back()->with('success', 'Thank you for commenting on our product');
        } else {
            return back()->with('failed', ['Your comment could not be added at this time. Please try again!']);
        }
    }

    public function post_review(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer'
        ]);

        $product = Product::where('name', $request->product)->first();
        if (null == $product || empty($product))
            return back()->withInput()->with('failed', ['COmment could not be added.lease try again!']);
        $review = new Review();
        $review->product_id = $product->id;
        if (Auth::user() == null) {
            if (null == $request->name || empty($request->name))
                return back()->withInput()->with('failed', ['You must enter put your name for your comment to be added!']);
            $review->name = $request->name;
            $review->email = $request->email;
            $review->phone = $request->phone;
        } else {
            $review->name = Auth::user()->name;
            $review->email = Auth::user()->email;
            $review->phone = Auth::user()->phone;
        }
        $review->rating = $request->rating;
        $review->message = $request->message;

        if ($review->save()) {
            return back()->with('success', 'Thank you for commenting on our product');
        } else {
            return back()->with('failed', ['Your comment could not be added at this time. Please try again!']);
        }
    }

    public function post_contact(Request $request)
    {
        $contact = new Contact();
        if (Auth::user() == null) {
            if (null == $request->name || empty($request->name))
                return back()->withInput()->with('failed', ['You must enter put your name for your comment to be added!']);
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
        } else {
            $contact->name = Auth::user()->name;
            $contact->email = Auth::user()->email;
            $contact->phone = Auth::user()->phone;
        }
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        if ($contact->save()) {
            return back()->with('success', 'Thank you for contacting us');
        } else {
            return back()->with('failed', ['Operation failed. Please try again!']);
        }
    }

    public function payment(Request $request)
    {
        if (request()->ajax()) {
            if ($request->products != null && $request->ref != null && $request->email != null && $request->last != null && $request->first != null) {
                $product = json_decode($request->products);
                $sale = new Sales();
                $sale->ref = $request->ref;
                $sale->total = $request->total / 100;
                $sale->shipping = (isset($product->loc)) ? $product->loc : 0;
                $sale->currency = $request->session()->get('currency');
                $sale->status = 'pending';
                $sale->coupon = $request->coupon;
                $sale->notes = $request->note;
                if ($sale->save()) {
                    //save sold products
                    foreach ($product->items as $item) {
                        $sold = new Sold();
                        $sold->size_id = $item->item->size;
                        $sold->quantity = $item->item->qty;
                        $sold->sales_id = $sale->id;
                        $sold->product = $item->item->name;
                        $sold->price = $item->item->cost;
                        $sold->save();
                    }

                    //save billing address
                    $billing = new Address();
                    $billing->user_id = (Auth::user() != null) ? Auth::user()->id : 0;
                    $billing->sales_id = $sale->id;
                    $billing->type = 'billing';
                    $billing->first = $request->first;
                    $billing->last = $request->last;
                    $billing->company = $request->company;
                    $billing->email = $request->email;
                    $billing->phone = $request->phone;
                    $billing->country = $request->country;
                    $billing->state = $request->state;
                    $billing->city = $request->city;
                    $billing->street1 = $request->street1;
                    $billing->street2 = $request->street2;
                    $billing->postal = $request->postal;
                    $billing->save();

                    //save shipping address
                    $shipping = new Address();
                    $shipping->user_id = (Auth::user() != null) ? Auth::user()->id : 0;
                    $shipping->sales_id = $sale->id;
                    $shipping->type = 'shipping';
                    $shipping->first = ($request->first_ship != null) ? $request->first_ship : $request->first;
                    $shipping->last = ($request->last_ship != null) ? $request->last_ship : $request->last;
                    $shipping->company = ($request->company_ship != null) ? $request->company_ship : $request->company_ship;
                    $shipping->email = ($request->email_ship != null) ? $request->email_ship : $request->email;
                    $shipping->phone = ($request->phone_ship != null) ? $request->phone_ship : $request->phone;
                    $shipping->country = ($request->country_ship != null) ? $request->country_ship : $request->country;
                    $shipping->state = ($request->state_ship != null) ? $request->state_ship : $request->state;
                    $shipping->city = ($request->city_ship != null) ? $request->city_ship : $request->city;
                    $shipping->street1 = ($request->street1_ship != null) ? $request->street1_ship : $request->street1;
                    $shipping->street2 = ($request->street2_ship != null) ? $request->street2_ship : $request->street2;
                    $shipping->postal = ($request->portal_ship != null) ? $request->portal_ship : $request->postal;
                    $shipping->save();
                }
            }
        }
    }

    public function confirm(Request $request)
    {
        $sale = Sales::where('ref', $request->ref)->first();
        if ($sale == null) {
            return redirect()->route('shop')->with('failed', ['Payment not found']);
        }
        $curl = curl_init();
        $url = config('app.paystack_url') . "/verify/" . $request->ref;

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . config('app.paystack_secret'),
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            Log::error("cURL Error #:" . $err);
        } else {
            $result = json_decode($response);
            if ($result->status == true) {
                if ($sale->status != 'success') {
                    $sale->status = $result->data->status;
                    $sale->save();
                    if ($result->data->status == 'success') {
                        $coupon = Coupon::where('code', $sale->coupon)->first();
                        if ($coupon != null) {
                            $coupon->used += 1;
                            $coupon->save();
                        }
                        foreach ($sale->items as $item) {
                            $size = Size::find($item->size_id);
                            $size->quantity -= $item->quantity;
                            $size->save();
                            if (Auth::user() != null) {
                                $cart = Cart::where('size_id', $size->id)->where('user_id', Auth::user()->id)->first();
                                $cart->status = 2;
                                $cart->save();
                            } else {
                                $products = $request->session()->pull('cart', []); // Second argument is a default value
                                $rem = [];
                                foreach ($products as $prod) {
                                    if ($prod['size'] != $size->id) $rem[] = $prod;
                                }
                                session()->put('cart', $rem);
                            }
                        }
                    }
                }
            }
        }
        return view('confirm', ['sales' => $sale]);
    }

    public function coupon(Request $request)
    {
        if (request()->ajax()) {
            $code = $request->coupon;
            $date = date('Y-m-d H:i:s', time());
            $coupon = Coupon::where('code', $code)
                ->where('qty', '>', 'used')
                ->where('start', '<=', $date)
                ->where('end', '>=', $date)
                ->first();
            $currency = $request->session()->get('currency');
            if ($coupon != null) {
                $amt = ($currency == 'Naira') ? '₦' . number_format($coupon->cost_ngn, 2) : '$' . number_format($coupon->cost_ng, 2);
                $result['amt'] = $amt;
                $result['code'] = $coupon->code;
                return Response::json($result, 200, [], JSON_NUMERIC_CHECK);
            } else {
                $result = false;
                return Response::json($result, 401, [], JSON_NUMERIC_CHECK);
            }
        }
    }

    public function currency($cur = null)
    {
        if ($cur == null) return back()->with('failed', 'currency not recognized');
        Session::forget('currency');
        if ($cur == 'dol') Session::put('currency', 'Dollars');
        else Session::put('currency', 'Naira');

        return back();
    }

    public function pop()
    {
        $sale = Sales::where('status', 'success')->inRandomOrder()->first();
        $sold = Sold::where('sales_id', $sale->id)->inRandomOrder()->first();
        $address = Address::where('type', 'billing')->where('sales_id', $sale->id)->first();
        if ($sold != null) {
            $prod = Product::where('name', $sold->product)->first();
            $html = '<div class="toast-header">';
            $html .= '<img src="' . asset('/img/products/' . $prod->images[0]->file_path) . '" class="rounded mr-2" height="80px" alt="' . $prod->name . '">';
            $html .= '<strong class="mr-auto">Someone in ' . $address->city . ', ' . $address->state . ' just bought <strong>' .  $prod->name . '</strong></strong>';
            $html .= '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                       </div>';
            //            $html .= '<div class="toast-body">';
            //            $html .= '</div>';
            $result['html'] = $html;
            return Response::json($result, 200, [], JSON_NUMERIC_CHECK);
        } else {
            $result = false;
            return Response::json($result, 401, [], JSON_NUMERIC_CHECK);
        }
    }
}
