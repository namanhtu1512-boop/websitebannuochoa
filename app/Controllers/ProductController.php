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
    public function create()
    {
        $title = "Trang thêm khách hàng";
        return view('products.Create', compact('title'));
    }

    public function store()
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
            'created_at' => $_POST['created_at'] ?? '',
            'updated_at' => $_POST['updated_at'] ?? '',
        ];
        if (is_upload('img_thumbnail')) {
            $data['img_thumbnail'] = $this->uploadFile($_FILES['img_thumbnail'], 'products');
        }
        Product::create($data);
        return redirect('products');
    }

    public function edit($id)
    {
        $products = Product::find($id);
        if (!$products) {
            return redirect('products');
        }
        $title = 'Trang sửa thông tin khách hàng';
        return view('products.Edit', compact('products', 'title'));
    }


    public function update($id)
    {
        $products = Product::find($id);
        if (!$products) {
            return redirect('products');
        }

        $data = [
            'name' => $_POST['name'] ?? $products->name,
            'description' => $_POST['description'] ?? $products->description,
            'created_at' => $_POST['created_at'] ?? $products->created_at,
            'updated_at' => $_POST['updated_at'] ?? $products->updated_at,
        ];


        if (is_upload('img_thumbnail')) {
            //kieemr tra có ảnh cũ không có thì xóa
            if ($products->img_thumbnail && file_exists($products->img_thumbnail)) {
                unlink($products->img_thumbnail);
            }
            $data['img_thumbnail'] = $this->uploadFile($_FILES['img_thumbnail'], 'products');
        }
        $products->update($data);
        return redirect('products');
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
