<?php

namespace App\Http\Controllers\api;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cartItems = \Cart::session($user->id)->getContent();
        // dd($cartItems);
        return $this->sendResponse($cartItems, 'Course added successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function cartList()
    {
        $user = Auth::user();
        $cartItems = \Cart::session($user->id)->getContent();
        // dd($cartItems);
        return $this->sendResponse($cartItems, 'successfully.');
    }

    public function addToCart(Request $request)
    {
        $user = Auth::user();
        \Cart::session($user->id)->add([
            'id' => $request->id,
            'name' => $request->title,
            'price' => $request->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $request->image,
            ),
            'associatedModel' => 'Course'
        ]);

        return $this->sendResponse('Success', 'Course added successfully.');
    }

    public function updateCart(Course $course)
    {
        $user = Auth::user();
        \Cart::session($user->id)->update(
            $course->id,
            [
                'quantity' => [
                    'relative' => true,
                    'value' => 1
                ],
            ]
        );

        return $this->sendResponse('success', 'updated successful');
    }

    public function removeItem(Course $course)
    {
        $user = Auth::user();
        \Cart::session($user->id)->remove($course->id);

        return $this->sendResponse('Success', 'Course removed successfully.');
    }

    public function clearAllCart()
    {
        $user = Auth::user();
        \Cart::session($user->id)->clear();

        return $this->sendResponse('success', 'Course added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
