<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\LinkProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userID = Auth::user();

        $links = Link::where("user_id", 1)->get();

        return view("backend.links.index",compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {
        $link = Link::create([
            'user_id' => $request->user()->id,
            'code' => Str::random(6)
        ]);

        foreach ($request->input('products') as $product_id){
            LinkProduct::create([
                'link_id' => $link->id,
                'product_id' => $product_id
            ]);
        }

        return view('backend.links.index', compact('link'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        //
    }
}
