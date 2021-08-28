<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubImage;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getFeaturedProduct()
    {
        $products = Product::where(['status'=>1, 'featured_status'=>1])->orderBy('id', 'desc')->take(5)->get(['id','name','image','main_price','discount_price']);
        $results = [];
        foreach ($products as $key => $product){
            $results[$key]['id']     = $product->id;
            $results[$key]['name']   = $product->name;
            $results[$key]['frontImage']  = asset($product->image);
            $results[$key]['backImage']  = asset(SubImage::where('product_id', $product->id)->first()->image);
            $results[$key]['price']  = number_format($product->discount_price,0,'.',',');
        }
        return response()->json($results);
    }

    public function getBestLookProduct()
    {
        $popularProducts = Product::where('status','=',1)->orderBy('hit_count','DESC')->take(8)->get();
        $bestSellerProducts = Product::where('status','=',1)->orderBy('best_seller','DESC')->take(8)->get();
        $specialProducts = Product::where([
            'status'=>1, 'special_status'=>1
        ])->orderBy('id','DESC')->take(8)->get();
        $newProducts = Product::where('status','=',1)->orderBy('id','DESC')->take(8)->get();

        $popular = [];
        foreach ($popularProducts as $key => $product)
        {
            $popular[$key]['id'] = $product->id;
            $popular[$key]['name'] = $product->name;
            $popular[$key]['price'] = number_format($product->discount_price,0,'.',',');
            $popular[$key]['frontImage'] = asset($product->image);
            $popular[$key]['backImage'] = asset(SubImage::where('product_id', $product->id)->first()->image);
        }

        $bestSeller = [];
        foreach ($bestSellerProducts as $key => $product)
        {
            $bestSeller[$key]['id'] = $product->id;
            $bestSeller[$key]['name'] = $product->name;
            $bestSeller[$key]['price'] = number_format($product->discount_price,0,'.',',');
            $bestSeller[$key]['frontImage'] = asset($product->image);
            $bestSeller[$key]['backImage'] = asset(SubImage::where('product_id', $product->id)->first()->image);
        }

        $special = [];
        foreach ($specialProducts as $key => $product)
        {
            $special[$key]['id'] = $product->id;
            $special[$key]['name'] = $product->name;
            $special[$key]['price'] = number_format($product->discount_price,0,'.',',');
            $special[$key]['frontImage'] = asset($product->image);
            $special[$key]['backImage'] = asset(SubImage::where('product_id', $product->id)->first()->image);
        }

        $new = [];
        foreach ($newProducts as $key => $product)
        {
            $new[$key]['id'] = $product->id;
            $new[$key]['name'] = $product->name;
            $new[$key]['price'] = number_format($product->discount_price,0,'.',',');
            $new[$key]['frontImage'] = asset($product->image);
            $new[$key]['backImage'] = asset(SubImage::where('product_id', $product->id)->first()->image);
        }

        $result = [
            0=>['name'=>'Popular',      'products'=>$popular,],
            1=>['name'=>'Best Seller',  'products'=>$bestSeller,],
            2=>['name'=>'Specials',     'products'=>$special,],
            3=>['name'=>'New Products', 'products'=>$new,]
        ];

        return response()->json($result);
    }

    public function getAllCategory()
    {
        $temp = [];
        $results = [];
        $categories = Category::where('status',1)->get(['id','name']);
        foreach ($categories as $key => $category){
            $subCategories = SubCategory::where(['category_id'=>$category->id, 'status'=>1])->get(['id','name']);
            foreach ($subCategories as $key1 => $subCategory){
                $temp[$key1]['id'] = $subCategory->id;
                $temp[$key1]['name'] = $subCategory->name;
            }
            $results[$key]['id'] = $category->id;
            $results[$key]['name'] = $category->name;
            $results[$key]['sub_category'] = $temp;
        }

        return response()->json($results);
    }

    public function getAllCategoryProduct($id)
    {
        $products = Product::where(['status'=>1, 'category_id'=>$id])->get(['id','name','image','main_price','discount_price','short_description']);
        $specials = Product::where([
            'status'=>1, 'special_status'=>1
        ])->orderBy('id','DESC')->take(3)->get(['id','name','image','main_price','discount_price','short_description']);
        $results = [];
        $categoryProduct = [];
        foreach ($products as $key => $product){
            $categoryProduct[$key]['id']            = $product->id;
            $categoryProduct[$key]['name']          = $product->name;
            $categoryProduct[$key]['frontImage']    = asset($product->image);
            $categoryProduct[$key]['backImage']     = asset(SubImage::where('product_id', $product->id)->first()->image);
            $categoryProduct[$key]['price']         = number_format($product->discount_price,0,'.',',');
            $categoryProduct[$key]['description']   = $product->short_description;
        }
        $specialProduct = [];
        foreach ($specials as $key => $special)
        {
            $specialProduct[$key]['id']            = $special->id;
            $specialProduct[$key]['name']          = $special->name;
            $specialProduct[$key]['frontImage']    = asset($special->image);
            $specialProduct[$key]['backImage']     = asset(SubImage::where('product_id', $special->id)->first()->image);
            $specialProduct[$key]['price']         = number_format($special->discount_price,0,'.',',');
            $specialProduct[$key]['description']   = $special->short_description;
        }

        $results = [
            'categoryProduct' =>$categoryProduct,
            'specialProduct' =>$specialProduct,
            'category'=>Category::find($id)->name
        ];

        return response()->json($results);
    }

    public function getAllSubCategoryProduct($id)
    {
        $products = Product::where(['status'=>1, 'sub_category_id'=>$id])->get(['id','name','image','main_price','discount_price','short_description']);
        $specials = Product::where([
            'status'=>1, 'special_status'=>1
        ])->orderBy('id','DESC')->take(3)->get(['id','name','image','main_price','discount_price','short_description']);
        $results = [];
        $subCategoryProduct = [];
        foreach ($products as $key => $product){
            $subCategoryProduct[$key]['id']            = $product->id;
            $subCategoryProduct[$key]['name']          = $product->name;
            $subCategoryProduct[$key]['frontImage']    = asset($product->image);
            $subCategoryProduct[$key]['backImage']     = asset(SubImage::where('product_id', $product->id)->first()->image);
            $subCategoryProduct[$key]['price']         = number_format($product->discount_price,0,'.',',');
            $subCategoryProduct[$key]['description']   = $product->short_description;
        }
        $specialProduct = [];
        foreach ($specials as $key => $special)
        {
            $specialProduct[$key]['id']            = $special->id;
            $specialProduct[$key]['name']          = $special->name;
            $specialProduct[$key]['frontImage']    = asset($special->image);
            $specialProduct[$key]['backImage']     = asset(SubImage::where('product_id', $special->id)->first()->image);
            $specialProduct[$key]['price']         = number_format($special->discount_price,0,'.',',');
            $specialProduct[$key]['description']   = $special->short_description;
        }

        $results = [
            'subCategoryProduct' =>$subCategoryProduct,
            'specialProduct' =>$specialProduct,
        ];

        return response()->json($results);
    }

    public function getSpecialProduct(){
        $specials = Product::where([
            'status'=>1, 'special_status'=>1
        ])->orderBy('id','DESC')->take(3)->get(['id','name','image','main_price','discount_price','short_description']);
        $results = [];
        $specialProduct = [];
        foreach ($specials as $key => $special)
        {
            $specialProduct[$key]['id']            = $special->id;
            $specialProduct[$key]['name']          = $special->name;
            $specialProduct[$key]['frontImage']    = asset($special->image);
            $specialProduct[$key]['backImage']     = asset(SubImage::where('product_id', $special->id)->first()->image);
            $specialProduct[$key]['price']         = number_format($special->discount_price,0,'.',',');
            $specialProduct[$key]['description']   = $special->short_description;
        }
        $results = [
            'specialProduct' =>$specialProduct,
        ];

        return response()->json($results);
    }

    public function getBreadCrumb($id,$type)
    {
        $result = [];
        if ($type=='category')
        {
            $result['title']            = 'Category Product';
            $result['category']         = Category::find($id);
            $result['sub_category']     = '';
        }elseif ($type=='sub_category')
        {
            $result['title']            = 'Sub Category Product';
            $result['sub_category']     = SubCategory::find($id);
            $result['category']         = SubCategory::find($id)->category;
        }elseif ($type=='product')
        {
            $result['title']            = 'Product';
            $result['product']          = Product::find($id);
            $result['sub_category']     = Product::find($id)->subCategory;
            $result['category']         = Product::find($id)->category;
        }

        return response()->json($result);
    }

    public function getProduct($id)
    {
        $result = [];
        $product = Product::find($id);
        $product->image = asset($product->image);
        $product->main_price = number_format($product->main_price,0,'.',',');
        $product->discount_price = number_format($product->discount_price,0,'.',',');
        $product->brand; $product->colors; $product->sizes; $product->category; $product->subCategory; $product->unit;

        $relatedProducts = Product::where(['status'=>1, 'sub_category_id'=>$product->sub_category_id])->where('id','!=',$id)
            ->orderBy('id','desc')->take(5)->get(['id','name','main_price','discount_price','image']);
        foreach ($relatedProducts as $relatedProduct)
        {
            $relatedProduct->main_price = number_format($relatedProduct->main_price,0,'.',',');
            $relatedProduct->discount_price = number_format($relatedProduct->discount_price,0,'.',',');
            $relatedProduct->image = asset($relatedProduct->image);
        }

        $result = [
            'product_info' => [
                'product'       =>$product,
            ],
            'related_products'=>$relatedProducts
        ];


        return response()->json($result);
    }

    public function productImageGallery($id)
    {
        $product = Product::find($id);
        $subImages = [];
        foreach ($product->subImages as $key => $subImage)
        {
            $subImages[$key] = asset($subImage->image);
        }
        $result['product_image'] = asset($product->image);
        $result['product_sub_image'] = $subImages;

        return response()->json($result);
    }

    public function getProductDescription($id)
    {
        $productDescription = Product::find($id)->long_description;
        return response()->json($productDescription);
    }
}


