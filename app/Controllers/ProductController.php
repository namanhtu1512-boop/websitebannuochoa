<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        usort($products, function ($a, $b) {
            return $b->id <=> $a->id;
        });
        $title = "danh sách";

        // debug($productss);
        // require_once './views/listproducts.php';
        return view('products.List', compact('products', 'title'));
    }


    public function destroy($id)
    {

        $products = Product::find($id);
        if ($products) {
            if ($products->img_thumbnail && file_exists($products->img_thumbnail)) {
                unlink($products->img_thumbnail);
            }
            $products->delete();
        }
        return redirect('products');
    }
}
