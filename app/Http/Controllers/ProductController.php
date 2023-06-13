<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            'title'         => $request->title,
            'price'         => $request->price,
            'description'   => $request->description,
            'image'         => $fileName
        ]);


        return redirect('admin/products/create')->with('message','Successfully Submitted');

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
//        dd($product);
        return view('backend/products/edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        if($request->hasFile('image'))
        {
            if($product->image != null){

                $savedImage = 'products/'.$product->image;

//                dd($savedImage);

                if(File::exists($savedImage)) {
                    File::delete($savedImage);
                }

                $pageImage      = $request->image;
                $imageName        = time() . $pageImage->getClientOriginalName();
                $pageImage->move(public_path('products/'), $imageName);
            }


            $product->update([
                'image'    => $imageName
            ]);
        }

        $product->update([
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

        $image  = public_path("products/") .$product->image;

        if(File::exists($image)) {
            File::delete($image);
        }

        $product->delete();

        return redirect("admin/products")->with("message", "Successfully Deleted..");
    }

}
