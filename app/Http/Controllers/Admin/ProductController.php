<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::with("products")->get();
        $products = Product::all();
        return view("pages.admin.products.index")->with(["products" => $products, "cats" => $cats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view("pages.admin.products.create")->with(["cats" => $cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"  =>  'required',
            "price" =>  'required|numeric',
            'brand' =>  'required',
            'category_id'   =>  'required|numeric',
            "thumb_link"    =>  "mimetypes:image/jpg,image/jpeg,image/png"
        ]);
        $thumb_link = "";
        if($request->thumb_link) {
            $thumb_link = $this->uploadFile($request->thumb_link);
        }
        $product = Product::create([
            "name"          => $request->name,
            "price"         =>  $request->price,
            "brand"         =>  $request->brand,
            "category_id"   => $request->category_id,
            "sale"          =>  $request->sale,
            "tags"          =>  $request->tags,
            "desc"          =>  $request->desc,
            "thumb_link"    =>  $thumb_link
            ]);
        return redirect("/admin/products");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::withTrashed()->where("id",$id)->first();
        return view("pages.admin.products.view")->with(["product"=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::withTrashed()->where("id",$id)->first();
        $cats = Category::all();
        return view("pages.admin.products.edit")->with(["product" => $product, "cats" => $cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name"  =>  'required',
            "price" =>  'required|numeric',
            'brand' =>  'required',
            'category_id'   =>  'required|numeric',
            "thumb_link"    =>  "mimetypes:image/jpg,image/jpeg,image/png"
        ]);
        $product = Product::withTrashed()->where("id",$id)->first();

        $thumb_link = $product->thumb_link;

        if($request->thumb_link) {
            if($product->thumb_link && file_exists("images$product->thumb_link")) {
                unlink("images".$product->thumb_link);
            }
            $thumb_link = $this->uploadFile($request->thumb_link);
        }
        $product->update([
            "name"          => $request->name,
            "price"         =>  $request->price,
            "brand"         =>  $request->brand,
            "category_id"   => $request->category_id,
            "sale"          =>  $request->sale,
            "tags"          =>  $request->tags,
            "desc"          =>  $request->desc,
            "thumb_link"    =>  $thumb_link
            ]);
        return redirect("/admin/products");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }

    /**
     * upload the given file to images/product
     *
     * @param Illuminate\Http\UploadedFile $file
     * @param string $old
     * @return string
     */
    private function uploadFile($file, $old = "")
    {
        $hash = $file->hashName("/products");
        $file->move("images/products", $hash);
        return $hash;
    }

    /**
     * view all trashed product
     *
     * @param Illuminate\Http\Request
     * @return Illuminate\Http\Response
     */
    public function viewTrashed()
    {
        $products = Product::onlyTrashed()->get();
        return view("pages.admin.products.trashed")->with(["products" => $products]);
    }

    /**
     * restore trashed product
     *
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function restore($id)
    {
        $product = Product::withTrashed()->where("id",$id)->first();
        $product->restore();
        return redirect("admin/products");
    }
}
