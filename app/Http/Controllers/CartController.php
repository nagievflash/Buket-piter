<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;
use Validator;

class CartController extends Controller
{
    private $qty;
    private $product;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.cart.cart');
    }

    public function create(Request $request)
    {
        //Cart::destroy();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->qty = $request->input('quantity');
        $this->product = Product::findOrFail($request->id);

        $duplicate = Cart::search(function ($cartItem, $rowId) use ($request) {
            if ($cartItem->id === $request->id) {
                Cart::update($rowId, $cartItem->qty + $this->qty);
                return true;
            }
            else return false;
        });

        if ($duplicate->isEmpty()) {
            Cart::add($request->id, $this->product->title, $this->qty, $this->product->price)->associate('App\Product');
        }
        return response()->json(['success' => true, 'count' => Cart::count()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {

        Cart::update($id, $request->quantity);
        $bonus = number_format((Cart::total(0, '', '') * 0.03 ), 0, '', ' ');
        return response()->json(['success' => true, 'count' => Cart::count(), 'total' => Cart::total().'&nbsp;₽', 'bonus' => $bonus]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        $bonus = number_format((Cart::total(0, '', '') * 0.03 ), 0, '', ' ');
        return response()->json(['success' => true, 'count' => Cart::count(), 'total' => Cart::total().'&nbsp;₽', 'bonus' => $bonus]);
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        return redirect('cart')->withSuccessMessage('Your cart has been cleared!');
    }

    /**
     * Switch item from shopping cart to wishlist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Item is already in your Wishlist!');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect('cart')->withSuccessMessage('Item has been moved to your Wishlist!');

    }
}
