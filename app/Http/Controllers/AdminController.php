<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddProductRequest;
use App\ProductCategory;
use App\ProductName;
use App\Product;

class AdminController extends Controller
{
    public function index(Request $request)
    {
    	$categories=ProductCategory::All();
    	return view('Admin.addProduct')->with('categories',$categories);
    }
    public function findProductName(Request $request)
    {
    	$data=ProductName:: select ('productnameid','proudctname')->where('productcategoryid',$request->productcategoryid)->get();
    	//$data=DB::table('ProductName')->where('productcategoryid',$request->productcategoryid)-findAll();
    	return response()->json($data);
    }
    public function store(AddProductRequest $request)
    {
    	
    	$unique=$request->Code;
    	$productname=$request->productname;
    	$data=Product::where('uniquecode',$unique)->first();
    	if($data)
    	{
            
    		$request->session()->flash('message', 'Unique Code Already Available');
    		return redirect()->route('admin.index');
    		
    			
    	}
    	else
    	{

    		$product=new Product();
    		$product->uniquecode=$unique;
    		$product->productnameid=$productname;
    		$product->warrentystart= date('Y-m-d');
    		$product->save();
    		return view('Admin.success');
    	}

    	

    }
}
