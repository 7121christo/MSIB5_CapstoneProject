<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        // $user_id = Auth::id();
        $user_id = 1;
        $cartItems = Carts::where('user_id', $user_id)->get();

        $data = [
            'user_id' => $user_id,
            'userCart' => $cartItems,
        ];

        return view('cart', $data);
    }

    public function show_cart()
    {
        $user_id = Auth::id();
        $carts = Carts::where('user_id', $user_id)->get();
        return view('cart', compact('carts'));
    }

    public function addToCart(Request $request, Products $product)
    {
        $user = auth()->user();
        // $userId = $user->id;
        $userId = 1;

        $existingCartItem = Carts::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if ($existingCartItem) {
            // Jika produk sudah ada, update jumlahnya
            // $existingCartItem->increment('amount', (int) $request->amount);
            $newAmount = $existingCartItem->amount + (int) $request->amount;
            $totalPrice = $product->price * $newAmount;
            $existingCartItem->update([
                'amount' => $newAmount,
                'total_price' => $totalPrice,
            ]);
        } else {
            Carts::create([
                'product_id' => $product->id,
                'user_id' => $userId,
                'amount' => (int) $request->amount,
                'total_price' => $product->price * (int) $request->amount,
            ]);
        }
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }

    public function updateCart(Request $request, Carts $cart)
    {
        // Update amount
        $cart->update(['amount' => $request->amount]);

        // Recalculate total price based on updated amount
        $totalPrice = $cart->product->price * $request->amount;
        $cart->update(['total_price' => $totalPrice]);

        return response()->json([
            'amount' => $cart->amount,
            'total_price' => $totalPrice,
        ]);
    }

    public function deleteCartItem(Request $request, Carts $cart)
    {
        $cart->delete();

        return response()->json(['success' => true]);
    }

    public function getTotal()
    {
        $userId = 1;
        // $userId = auth()->id();

        $total_price = number_format(Carts::where('user_id', $userId)->sum('total_price'));
        $total = $total_price; // Anda dapat menambahkan biaya pengiriman atau biaya tambahan lainnya di sini

        return response()->json(['total_price' => $total_price, 'total' => $total]);
    }

    public function checkout()
    {
        $user = auth()->user();
        // $userId = $user->id;
        $userId = 1;

        // Ambil semua item keranjang untuk pengguna
        $cartItems = Carts::where('user_id', $userId)->get();

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Kurangkan stok produk
            foreach ($cartItems as $cartItem) {
                $product = $cartItem->product;
                $quantity = $cartItem->amount;

                // Validasi stok cukup
                if ($product->stock < $quantity) {
                    throw new \Exception('Stok produk tidak mencukupi untuk ' . $product->name);
                }

                // Kurangkan stok
                $product->decrement('stock', $quantity);
            }

            // Hapus semua item keranjang setelah checkout
            Carts::where('user_id', $userId)->delete();

            // Commit transaksi
            DB::commit();

            return redirect()->route('cart.index')->with('success', 'Checkout berhasil.');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            return redirect()->route('cart.index')->with('error', $e->getMessage());
        }
    }
}

