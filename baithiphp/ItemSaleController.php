<?php

namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ItemSale::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_code' => 'required|alpha_num|max:6',
            'item_name' => 'required|alpha_num|max:50',
            'quantity' => 'required|numeric',
            'expried_date' => 'required|date',
            'note' => 'nullable|string|max:60',
        ]);

        ItemSale::create($request->all());
        return redirect()->route('items.index');
    }

    /**
     * Show the form for editing the specified item.
     *
     * @param  \App\Models\ItemSale  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemSale $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemSale  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemSale $item)
    {
        $request->validate([
            'item_code' => 'required|alpha_num|max:6',
            'item_name' => 'required|alpha_num|max:50',
            'quantity' => 'required|numeric',
            'expried_date' => 'required|date',
            'note' => 'nullable|string|max:60',
        ]);

        $item->update($request->all());
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified item from storage.
     *
     * @param  \App\Models\ItemSale  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemSale $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
