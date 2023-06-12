<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);

        return view("backend.products.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        if($request->hasFile('image')){

            $product    = $request->image;
            $fileName   = time() . $product->getClientOriginalName();
            $product->move(public_path('products/'), $fileName );
        }

        Product::create([
            'title'     => $request->title,
            'price'     => $request->price,
            'description' => $request->description,
            'image'   => $fileName
        ]);


        return redirect()->back()->with('message','Successfully Submitted');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = Product::findOrFail($id);

        return view('banner.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
//        $product = Product::findOrFail($id);

        if($request->hasFile('image'))
        {
            if($product->image != null){

                $savedImage = 'banners/'.$product->image;

                if(File::exists($savedImage)) {
                    File::delete($savedImage);
                }

                $pageImage      = $request->image;
                $product         = time() . $pageImage->getClientOriginalName();
                $pageImage->move(public_path('products/'), $product);
            }

            $product->update([
                'image'    => $product,
            ]);
        }

        Product::update([
            'title'     => $request->title,
            'price'     => $request->price,
            'description' => $request->description
        ]);


        return back()->with("message","Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
//        $banner = Banner::findOrFail($id);

        $image  = public_path("banners/") .$product->image;

        if(File::exists($image)) {
            File::delete($image);
        }

        $image->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

}
