<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Seller;
use App\User;
use PDF;
use DB;
class ReportController extends Controller
{
    public function stock_report(Request $request)
    {
        if($request->has('category_id')){
            $products = Product::where('category_id', $request->category_id)->get();
        }
        else{
            $products = Product::all();
        }
        return view('reports.stock_report', compact('products'));
    }

    public function in_house_sale_report(Request $request)
    {
        if($request->has('category_id')){
            $products = DB::select('select products.name,products.tags,COUNT(order_details.product_id) as total,order_details.variation from products join order_details on products.id=order_details.product_id where products.category_id='.$request->category_id.' GROUP by order_details.product_id,order_details.variation');
        }
        else{

            $products = DB::select('select products.name,products.tags,COUNT(order_details.product_id) as total,order_details.variation from products join order_details on products.id=order_details.product_id GROUP by order_details.product_id,order_details.variation');
        }
        return view('reports.in_house_sale_report', compact('products'));
    }

    public function seller_report(Request $request)
    {
        if($request->has('verification_status')){
            $sellers = Seller::where('verification_status', $request->verification_status)->get();
        }
        else{
            $sellers = Seller::all();
        }
        return view('reports.seller_report', compact('sellers'));
    }

    public function seller_sale_report(Request $request)
    {
        if($request->has('verification_status')){
            $sellers = Seller::where('verification_status', $request->verification_status)->get();
        }
        else{
            $sellers = Seller::all();
        }
        return view('reports.seller_sale_report', compact('sellers'));
    }

    public function wish_report(Request $request)
    {
        if($request->has('category_id')){
            $products = Product::where('category_id', $request->category_id)->get();
        }
        else{
            $products = Product::all();
        }
        return view('reports.wish_report', compact('products'));
    }

    //downloads stock report
    public function stock_report_download(Request $request)
    {
        if($request->has('category_id')){
            $products = Product::where('category_id', $request->category_id)->get();
        }
        else{
            $products = Product::all();
        }
        
        $pdf = PDF::setOptions([
                        'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
                        'logOutputFile' => storage_path('logs/log.htm'),
                        'tempDir' => storage_path('logs/')
                    ])->loadView('reports.stock_report_download', compact('products'));
        return $pdf->download('stock-report-'.date('d-m-Y').'.pdf');
    }

    //downloads salr report
    public function sale_report_download(Request $request)
    {
        if($request->has('category_id')){
            
            $products = DB::select('select products.name,products.tags,COUNT(order_details.product_id) as total,order_details.variation from products join order_details on products.id=order_details.product_id where products.category_id='.$request->category_id.' GROUP by order_details.product_id,order_details.variation');
        }
        else{

            $products = DB::select('select products.name,products.tags,COUNT(order_details.product_id) as total,order_details.variation from products join order_details on products.id=order_details.product_id GROUP by order_details.product_id,order_details.variation');
        }

        $pdf = PDF::setOptions([
                        'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
                        'logOutputFile' => storage_path('logs/log.htm'),
                        'tempDir' => storage_path('logs/')
                    ])->loadView('reports.sale_report_download', compact('products'));
        return $pdf->download('sale-report-'.date('d-m-Y').'.pdf');
    }
}
