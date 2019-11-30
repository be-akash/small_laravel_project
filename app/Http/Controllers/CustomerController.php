<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\ProductName;
use App\Product;
use Carbon\Carbon;
use DB;

class CustomerController extends Controller
{
    public function search()
    {
    	return view('Customer.productsearch');
    }
    public function find(Request $request)
    {
    	$product=Product::where('uniquecode',$request->code)->first();
    	if($product)
    	{
    		$productname=ProductName::where('productnameid',$product->productnameid)->first();
    		$ProductCategory=ProductCategory::where('productcategoryid',$productname->productcategoryid)->first();
    		$category=$ProductCategory->productcategoryname;
    		$name=$productname->proudctname;
    		$startdate=$product->warrentystart;
    		$warrenty=$ProductCategory->warrenty;
            $months=floor($warrenty);
            $day=$warrenty-$months;
            $day=30*$day;
    		$dt=Carbon::create($startdate);
    		$EndWarrenty=$dt->addMonthsWithOverflow($months);
            $EndWarrenty=$dt->addDays($day);
            $EndWarrenty=Carbon::parse($EndWarrenty)->format('Y-m-d');
    		$data=array();
    		$data['name']=$name;
    		$data['category']=$category;
    		$data['startdate']=$startdate;
    		$data['EndWarrenty']=$EndWarrenty;
    		return view('Customer.productdetails')->with('data',$data);

    	}
    	else
    	{
    		$request->session()->flash('message', 'This Unique code doesnot belong to any product');
    		return redirect()->route('customer.search');
    		
    	}
    	


    }
    public function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query=$request->get('query');
            $data=DB::table('products')->where('uniquecode','LIKE',"%{$query}%")->get(); 
            if($data->count()>0){

            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
                <li><a href="#">'.$row->uniquecode.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
        }
    }
}
