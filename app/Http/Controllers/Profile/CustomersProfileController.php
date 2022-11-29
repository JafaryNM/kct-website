<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\FuelType;
use App\Model\Order;
use App\Model\Product;
use App\Model\ProductType;
use Barryvdh\DomPDF\Facade\Pdf;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomersProfileController extends Controller
{
    public function customersProfile(){
        $types = ProductType::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')
        ->with('transmitions','fuels', 'years')
        ->paginate(2);

        $customerIvoice = Order::where('customerId', Auth::user()
        ->id)->where('orderType', '=', 'invoice')
        ->get();

        return view('pages.customersProfile', compact(
            'categories',
            'types',
            'products',
            'customerIvoice'
        ));
    }

    public function getInquiry(){
        $types = ProductType::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')
        ->with('transmitions','fuels', 'years')
        ->paginate(2);
        $customerInquiries = Order::where('customerId', Auth::user()->id)
        ->where('orderType', '=', 'inquiry')
        ->get();
        return view('pages.inquiries', compact('customerInquiries'));
    }

    public function deleteInquiry($id){
        $customerInquiries = Order::find($id);
        $customerInquiries->delete();
        return back()->withSuccess('success');
    }

    public function viewInvoice($id){
        $customerInvoices = Order::where('id', $id)->get();
        return view('pages.viewInvoice', compact('customerInvoices'));
    }

    public function deleteInvoice($id){
        $customerInvoices = Order::find($id);
        
        $filePath = public_path().'/paySlip/'.$customerInvoices->paySlip;
        if(file_exists($filePath)){
            @unlink($filePath);
        }
        $customerInvoices->delete();
        return back()->withSuccess('success');
    }

    public function attachmentView($id){
        $orders = Order::where('id', $id)->get();
        return view('pages.attachment', compact('orders'));
    }

    public function attachmentSave(Request $request, $id){
        $this->validate($request,[
            'fileUpload' =>'required',
            'fileUpload' => 'mimes:jpeg,png,jpg,pdf|max:1024'
        ]);

        $orders = Order::find($id);
        $pdf = $request->file('fileUpload');
        $uploadedPdf = $pdf->getClientOriginalName();
        $pdf->move(public_path('paySlip'), $uploadedPdf);
        $orders->paySlip = $uploadedPdf;
        $orders->status = 'Complited';
        $orders->save();
        return back()->withSuccess('success');
    }
}
