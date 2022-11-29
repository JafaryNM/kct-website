<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Color;
use App\Model\Condition;
use App\Model\Feature;
use App\Model\FuelType;
use App\Model\Image;
use App\Model\Order;
use App\Model\Product;
use App\Model\ProductType;
use App\Model\Steering;
use App\Model\Transmition;
use App\Model\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function productsList(Request $request){
        if(!Auth::check() && $request->path() != 'admins/login'){
            return redirect('/admins/login');
        }

        if(!Auth::check() && $request->path() == 'admins/login'){
            return view('admin.pages.productsList');
        }
        $categories = Category::all();
        $transmitions = Transmition::all();
        $fuelTypes = FuelType::all();
        $features = Feature::all();
        $images = Image::all();
        $years = Year::all();
        $conditions = Condition::all();
        $productTypes = ProductType::all();
        $colors = Color::all();
        $steerings = Steering::all();
        $products = Product::orderBy('id', 'desc')
        ->with('transmitions','fuels', 'years', 'categories', 'steerings')
        ->get();

        return view('admin.pages.productsList', compact(
            'categories', 
            'transmitions',
            'fuelTypes',
            'features',
            'images',
            'products',
            'years',
            'productTypes',
            'conditions',
            'colors',
            'steerings',
        ));
    }

    public function productSave(Request $request){
        $this->validate($request,[
            'productFrontImage' =>'required',
            'productFrontImage' => 'mimes:jpeg,png,jpg|max:1024'
        ]);

        $products = new Product();
        $image = $request->file('productFrontImage');
        $uploadedImage = $image->getClientOriginalName();
        $image->move(public_path('productsImages'), $uploadedImage);

        $products->productFrontImage = $uploadedImage;
        $products->productName = $request->productName;
        $products->productModel = $request->productModel;
        $products->productDoors = $request->productDoors;
        $products->productChases = $request->productChases;
        $products->productMiles = $request->productMiles;
        $products->fuelId = $request->productFuelTypeId;
        $products->transmitionId = $request->productTransmitionId;
        $products->seat = $request->seat;
        $products->engineNo = $request->engineNo;
        $products->yearId = $request->yearId;
        $products->selingPrice = $request->selingPrice;
        $products->productTypeId = $request->productTypeId;
        $products->conditionId = $request->condition;
        $products->colorId = $request->color;
        $products->categoryId = $request->productCategoryId;
        $products->steeringId = $request->steering;
        $products->save();

        if($request->hasFile('productImages')){
            foreach($request->file('productImages') as $image){
                $name = $image->getClientOriginalName();
                $image->move(public_path('multImages'), $name);

                $imageSave = new Image();
                $imageSave->image = $name;
                $imageSave->productId = $products->id;
                $imageSave->save();
            }
        }
        return back()->withSuccess('success');
    }

    public function viewProduct($id){
        $products = Product::with('years','transmitions','fuels','colors','types')->where('id', $id)->get();
        return view('admin.pages.viewProduct', compact('products'));
    }

    public function updateProduct($id){
        $products = Product::where('id', $id)
        ->with('transmitions','fuels', 'years', 'categories')
        ->get();

        $categories = Category::all();
        $transmitions = Transmition::all();
        $fuelTypes = FuelType::all();
        $features = Feature::all();
        $images = Image::all();
        $years = Year::all();
        $conditions = Condition::all();
        $productTypes = ProductType::all();
        $colors = Color::all();
        $steerings = Steering::all();

        return view('admin.pages.updateProduct', compact(
            'products',
            'categories',
            'transmitions',
            'fuelTypes',
            'features',
            'images',
            'years',
            'conditions',
            'colors',
            'steerings',
            'productTypes',
        ));
    }

    public function productStoreUpdate(Request $request, $id){
        $products = Product::find($id);

        $filePath = public_path().'/productsImages/'.$products->productFrontImage;
        if(file_exists($filePath)){
            @unlink($filePath);
        }

        $image = $request->file('productFrontImage');
        $uploadedImage = $image->getClientOriginalName();
        $image->move(public_path('productsImages'), $uploadedImage);

        $products->productFrontImage = $uploadedImage;
        $products->productName = $request->productName;
        $products->productModel = $request->productModel;
        $products->productDoors = $request->productDoors;
        $products->productChases = $request->productChases;
        $products->productMiles = $request->productMiles;
        $products->fuelId = $request->productFuelTypeId;
        $products->transmitionId = $request->productTransmitionId;
        $products->seat = $request->seat;
        $products->engineNo = $request->engineNo;
        $products->yearId = $request->yearId;
        $products->selingPrice = $request->selingPrice;
        $products->productTypeId = $request->productTypeId;
        $products->conditionId = $request->condition;
        $products->colorId = $request->color;
        $products->categoryId = $request->productCategoryId;
        $products->steeringId = $request->steering;
        $products->save();
        return redirect('admins/products_list')->withSuccess('success');
    }

    public function deleteProducts($id){
        $products = Product::find($id);
        
        $filePath = public_path().'/productsImages/'.$products->productFrontImage;
        if(file_exists($filePath)){
            @unlink($filePath);
        }
        $products->delete();

        $multImages = Image::where('productId', $id)->get();
        foreach($multImages as $images){
            $multImagesDelete = Image::find($images->id);
            $mutltFilePath = public_path().'/multImages/'.$multImagesDelete->image;
            if(file_exists($mutltFilePath)){
                @unlink($mutltFilePath);
            }
            $multImagesDelete->delete();
        }
        return back()->withSuccess('success');
    }


    public function registerCategory(Request $request){
        $this->validate($request, [
            'categoryName' => 'required',
        ]);

        $categories = new Category();
        $categories->categoryName = $request->categoryName;
        $categories->save();
        return back()->withSuccess('success');
    }


    public function updateCategory($id){
        $categories = Category::where('id', $id)->get();
        return view('admin.pages.updateCategories', compact('categories'));
    }

    public function saveCategory(Request $request, $id){
        $categories = Category::find($id);
        $categories->categoryName = $request->categoryName;
        $categories->save();
        return redirect('admins/products_list')->withSuccess('success');
    }

    public function deleteCategory($id){
        $categories = Category::find($id);
        $categories->delete();
        return back()->withSuccess('success');
    }

    public function registerTransmition(Request $request){
        $this->validate($request, [
            'transmitionName' => 'required',
        ]);

        $transmitions = new Transmition();
        $transmitions->transmitionName = $request->transmitionName;
        $transmitions->save();
        return back()->withSuccess('success');
    }

    public function updateTransmition($id){
        $transmitions = Transmition::where('id', $id)->get();
        return view('admin.pages.updateTransmitions', compact('transmitions'));
    }

    public function saveTransmition(Request $request, $id){
        $transmitions = Transmition::find($id);
        $transmitions->transmitionName = $request->transmitionName;
        $transmitions->save();
        return redirect('admins/products_list')->withSuccess('success');
    }

    public function deleteTransmition($id){
        $transmitions = Transmition::find($id);
        $transmitions->delete();
        return back()->withSuccess('success');
    }

    public function registerFuelType(Request $request){
        $this->validate($request, [
            'fuelType' => 'required',
        ]);

        $fuelTypes = new FuelType();
        $fuelTypes->fuelType = $request->fuelType;
        $fuelTypes->save();
        return back()->withSuccess('success');
    }

    public function updateFuel($id){
        $fuelTypes = FuelType::where('id', $id)->get();
        return view('admin.pages.updateFuelType', compact('fuelTypes'));
    }

    public function saveFuelType(Request $request, $id){
        $fuelTypes = FuelType::find($id);
        $fuelTypes->fuelType = $request->fuelType;
        $fuelTypes->save();
        return redirect('admins/products_list')->withSuccess('success');
    }

    public function deleteFuelType($id){
        $fuelTypes = FuelType::find($id);
        $fuelTypes->delete();
        return back()->withSuccess('success');
    }

    public function registerFeatures(Request $request){
        $this->validate($request, [
            'featureName' => 'required',
        ]);

        $features = new Feature();
        $features->featureName = $request->featureName;
        $features->save();
        return back()->withSuccess('success');
    }

    public function updateFeatures($id){
        $features = Feature::where('id', $id)->get();
        return view('admin.pages.updateFeatures', compact('features'));
    }

    public function saveFeatures(Request $request, $id){
        $features = Feature::find($id);
        $features->featureName = $request->featureName;
        $features->save();
        return redirect('admins/products_list')->withSuccess('success');
    }

    public function deleteFeatures($id){
        $features = Feature::find($id);
        $features->delete();
        return back()->withSuccess('success');
    }

    public function uploadImage(Request $request){
        $this->validate($request,[
            'image' =>'required',
            'image' => 'mimes:jpeg,png,jpg|max:5'
        ]);

        $file = new Image();
        $image = $request->file('image');
        $uploadedImage = $image->getClientOriginalName();
        $image->move(public_path('uploads'), $uploadedImage);
        $file->image = $uploadedImage;
        // $file->image = "uploads/".$uploadedImage;
        $file->save();

        return back()->withSuccess('success');
    }

    public function deleteImage($id){
        $image = Image::find($id);
        $image->delete();
        return back()->withSuccess('success');
    }


    public function registerYears(Request $request){
        $this->validate($request,[
            'year' =>'required',
        ]);

        $years = new Year();
        $years->year = $request->year;
        $years->save();
        return back()->withSuccess('success');

    }

    public function yearsEdit($id){
        $years = Year::where('id', $id)->get();
        return view('admin.pages.updateYears', compact('years'));
    }

    public function deleteYear($id){
        $years = Year::find($id);
        $years->delete();
        return back()->withSuccess('success');
    }

    public function registerProductType(Request $request){
        $this->validate($request,[
            'productType' =>'required',
        ]);
        
        $types = new ProductType();
        $types->productType = $request->productType;
        $types->save();
        return back()->withSuccess('success');
    }

    public function registerUpdateProductType($id){
        $productTypes = ProductType::where('id', $id)->get();
        return view('admin.pages.updateProductType', compact('productTypes'));
    }

    public function saveProductType(Request $request, $id){
        $productTypes = ProductType::find($id);
        $productTypes->productType = $request->vihecleType;
        $productTypes->save();
        return redirect('admins/products_list')->withSuccess('success');
    }

    public function deleteProductType($id){
        $productTypes = ProductType::find($id);
        $productTypes->delete();
        return back()->withSuccess('success');
    }

    public function registerConditions(Request $request){
        $conditions = new Condition();
        $conditions->conditionName = $request->condition;
        $conditions->save();
        return back()->withSuccess('success');
    }

    public function updateConditions($id){
        $conditions = Condition::where('id', $id)->get();
        return view('admin.pages.updateConditions', compact('conditions'));
    }

    public function saveConditions(Request $request, $id){
        $conditions = Condition::find($id);
        $conditions->conditionName = $request->condition;
        $conditions->save();
        return redirect('admins/products_list')->withSuccess('success');
    }

    public function deleteCondition($id){
        $conditions = Condition::find($id);
        $conditions->delete();
        return back()->withSuccess('success');
    }

    public function registerColors(Request $request){
        $colors = new Color();
        $colors->colorType = $request->color;
        $colors->save();
        return back()->withSuccess('success');
    }

    public function updateColors($id){
        $colors = Color::where('id', $id)->get();
        return view('admin.pages.updateColors', compact('colors'));
    }

    public function saveColors(Request $request, $id){
        $colors = Color::find($id);
        $colors->colorType = $request->color;
        $colors->save();
        return redirect('admins/products_list')->withSuccess('success');
    }

    public function deleteColors($id){
        $colors = Color::find($id);
        $colors->delete();
        return back()->withSuccess('success');
    }

    public function invoiceLists(){
        $invoices = Order::where('orderType', '=', 'invoice')
        ->orderBy('id', 'desc')
        ->get();

        $inquiries = Order::where('orderType', '=', 'inquiry')
        ->orderBy('id', 'desc')
        ->get();
        return view('admin.pages.invoicesLists', compact('invoices','inquiries'));
    }

    public function viewInvoice($id){
        $invoices = Order::where('id',$id)->where('orderType', '=', 'invoice')->get();
        return view('admin.pages.viewInvoice', compact('invoices'));
    }

    public function deleteInvoice($id){
        $invoices = Order::find($id);
        
        $filePath = public_path().'/paySlip/'.$invoices->paySlip;
        if(file_exists($filePath)){
            @unlink($filePath);
        }
        $invoices->delete();
        return back()->withSuccess('success');
    }

    public function inquiryView($id){
        $inquiries = Order::where('id',$id)->where('orderType', '=', 'inquiry')
        ->orderBy('id', 'desc')
        ->get();
        return view('admin.pages.inquiriesView', compact('inquiries'));
    }

    public function deleteInquiry($id){
        $inquiries = Order::find($id);
        $inquiries->delete();
        return back()->withSuccess('success');
    }

    public function registerSteering(Request $request){
        $this->validate($request, [
            'steering' => 'required',
        ]);

        $steerings = new Steering();
        $steerings->steeringType = $request->steering;
        $steerings->save();
        return back()->withSuccess('success');
    }

    public function updateSteering($id){
        $steerings = Steering::where('id', $id)->get();
        return view('admin.pages.updateSteering', compact('steerings'));
    }

    public function saveSteering(Request $request, $id){
        $steerings = Steering::find($id);
        $steerings->steeringType = $request->steering;
        $steerings->save();
        return redirect('admins/products_list')->withSuccess('success');
    }

    public function deleteSteering($id){
        $steerings = Steering::find($id);
        $steerings->delete();
        return back()->withSuccess('success');
    }
}
