<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceOrderMailable;
use App\Model\Category;
use App\Model\Image;
use App\Model\Order;
use App\Model\Product;
use App\Model\ProductType;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        $types = ProductType::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')
        ->with('transmitions','fuels', 'years')
        ->paginate(9);
        
        return view('home', compact('products','categories','types'));
    }

    public function customersLogin(){
        return view('auth.customer_login');
    }

    public function customerSignUp(Request $request){
        
    }

    public function customerRegister(){
        return view('auth.customer_register');
    }

    public function customerForgetPassword(){
        return view('auth.forget_password');
    }

    public function productDetails($id){
        $types = ProductType::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $products = Product::where('id', $id)
        ->orderBy('id', 'desc')
        ->with('transmitions','fuels', 'years')
        ->get();
        $images = Image::where('productId', $id)->get();
        $categoriesId = $products[0]->categoryId;
        $related_vehicles = Product::where('categoryId', $categoriesId)->get();
        return view('pages.productDetails', compact(
            'categories',
            'types',
            'products',
            'images',
            'related_vehicles',
        ));
    }

    public function createEnquiry(Request $request){
        if(!Auth::check()){
            return back()->withErrors('In order to do this function, you should login first!.');
        }
        $orders = new Order();
        $orders->productName = $request->productName;
        $orders->firstName = $request->firstName;
        $orders->lastName = $request->lastName;
        $orders->phoneNumber = $request->phoneNumber;
        $orders->email = $request->email;
        $orders->country = $request->country;
        $orders->city = $request->city;
        $orders->productImage = $request->productImage;
        $orders->category = $request->categoryName;
        $orders->year = $request->year;
        $orders->sellingPrice = $request->sellingPrice;
        $orders->address = $request->address;
        $orders->orderType = 'inquiry';
        $orders->status = 'Pending';
        $orders->gender = $request->gender;
        $orders->inquiry = $request->inquiry;
        $orders->customerId = Auth::user()->id;
        $orders->engineNo = $request->engineNo;
        $orders->milles = $request->milles;
        $orders->color = $request->color;
        $orders->save();
        return back()->withSuccess('success');
    }

    public function createInvoice(Request $request){
        if(!Auth::check()){
            return back()->withErrors('In order to do this function, you should login first!.');
        }
        $orders = new Order();
        $orders->productName = $request->productName;
        $orders->firstName = $request->firstName;
        $orders->lastName = $request->lastName;
        $orders->phoneNumber = $request->phoneNumber;
        $orders->email = $request->email;
        $orders->country = $request->country;
        $orders->city = $request->city;
        $orders->productImage = $request->productImage;
        $orders->category = $request->categoryName;
        $orders->year = $request->year;
        $orders->sellingPrice = $request->sellingPrice;
        $orders->firstInstallment = $request->sellingPrice * 0.5;
        $orders->secondInstallment = $request->sellingPrice - $orders->firstInstallment;
        $orders->address = $request->address;
        $orders->orderType = 'invoice';
        $orders->status = 'pending';
        $orders->gender = $request->gender;
        $orders->inquiry = $request->inquiry;
        $orders->customerId = Auth::user()->id;
        $orders->engineNo = $request->engineNo;
        $orders->milles = $request->milles;
        $orders->color = $request->color;
        $orders->save();

        $product = Order::where('id', $orders->id)->get();
        $data['product'] = $product;
        $pdf = PDF::loadView('pages.pdfMailInvoice', $data);
        $to_email = "deogratiuspeter90@gmail.com";
        Mail::to($to_email)->send(new InvoiceOrderMailable($pdf, $product));

        return redirect('customers/profile')->withSuccess('success');
    }

    public function invoiceEmail($id){
        $product = Order::where('id', $id)->get();
        $data['product'] = $product;
        $pdf = PDF::loadView('pages.pdfMailInvoice', $data);
        $to_email = "`$product[0]->email`";
        Mail::to($to_email)->send(new InvoiceOrderMailable($pdf, $product));
        return back()->withSuccess('success');

        // return view('pages.pdfMailInvoice', compact('product'));
        // $data["email"] = "deogratiuspeter90@gmail.com";
        // $data["title"] = "Fro KCT Motors";
        // $data["body"] = "This is demo";

        // $pdf = PDF::loadView('pages.invoiceEmail',$data);
        // Mail::send('pages.invoiceEmail',$data,function($message) use($data,$pdf){
        //     $message->to($data["email"])
        //             ->subject($data["title"])
        //             ->attachData($pdf->output(), "invoice.pdf");
        // });
        // return $pdf->download('invoice.pdf');
    }

    public function searchByCategory($id){
        $types = ProductType::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $products = Product::where('categoryId', $id)->orderBy('id', 'desc')
        ->with('transmitions','fuels', 'years', 'steerings')
        ->paginate(9);

        return view('pages.searchByMake', compact('types','categories','products'));
    }
}
