<?php

namespace App\Http\Controllers;


use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('products')
                ->withErrors($validator)
                ->withInput();
        }

        $products = new Products();
        $products->name = $request->input('name');
        $products->price = $request->input('price');
        $products->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $products->image = $imageName;
        }

        $products->stock = $request->input('stock');
        $products->save();

        return redirect()->route('products');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, Products $products,string $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string|max:5000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required|integer',
        ]);

        // dd($request->all());

        $products = Products::findOrFail($id);
        $products->name = $request->input('name');
        $products->price = $request->input('price');
        $products->description = $request->input('description');


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $products->image = $imageName;
        }

        $products->stock = $request->input('stock');
        $products->update();

        return redirect()->route('products');
    }

    public function destroy(string $id)
    {
        //
        $products = Products::findOrFail($id);
        $products->delete();
        return redirect()->route('products');
    }

}
