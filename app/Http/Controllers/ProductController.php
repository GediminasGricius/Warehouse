<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search=$request->session()->get('product_search',null);
        $filter_warehouse=$request->session()->get('product_filter_warehouse',null);

        /*
        if ($search==null && $filter_warehouse==null){
            $products=Product::all();
        }else{
            $products=Product::orderBy('name');
            if ($search!=null){
                $products=$products->where('name','like',"%$search%");
            }
            if ($filter_warehouse!=null){
                $products=$products->where('warehouse_id',$filter_warehouse);
            }
            $products=$products->get();
        }
        */

        $products=Product::search($search)->fromWarehouse($filter_warehouse)->with('warehouse')->get();

        $warehouses=Warehouse::all();


        return view('products.index',[
            'products'=>$products,
            'warehouses'=>$warehouses,
            'search'=>$search,
            'filter_warehouse'=>$filter_warehouse
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouses=Warehouse::all();
        return view('products.create',[
            'warehouses'=>$warehouses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product=new Product();
        $product->name=$request->name;
        $product->quantity=$request->quantity;
        $product->warehouse_id=$request->warehouse_id;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $warehouses=Warehouse::all();

        return view('products.edit',[
            'warehouses'=>$warehouses,
            'product'=>$product
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name=$request->name;
        $product->quantity=$request->quantity;
        $product->warehouse_id=$request->warehouse_id;
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


    public function search(Request $request){
        $request->session()->put('product_search',$request->search);
        return redirect()->route('products.index');
    }

    public function reset(Request $request){
        $request->session()->put('product_search', null);
        $request->session()->put('product_filter_warehouse', null);
        return redirect()->route('products.index');
    }

    public function filter(Request $request){
        $request->session()->put('product_filter_warehouse',$request->filter_warehouse);
        return redirect()->route('products.index');
    }
}
