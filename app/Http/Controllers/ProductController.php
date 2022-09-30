<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function data()
    {
        $query = Product::with(relations:'category');
        return DataTables::of($query)
            ->addColumn('action', function($row) {
                $action = '';
                $action .= '<button data-id=' . $row->id . ' data-type="edit" class="btn btn-sm btn-warning action">Edit</button>';
                $action .= ' <button data-id=' . $row->id . ' data-type="delete" class="btn btn-sm btn-danger action">Hapus</button>';
                return $action;
            })
            ->editColumn('created_at', fn ($row) => $row->created_at->format('d-m-Y H:i:s'))
            ->editColumn('updated_at', fn ($row) => $row->updated_at->format('d-m-Y H:i:s'))
            ->make(true);
    }
    
    public function index()
    {
        return view('product.index');
    }

    public function create()
    {
        return view('product.action', [
            'product' => new Product(),
            'categories' => Category::get()
        ]);
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->all());
        return response()->json([
            'status' => '200',
            'message' => 'Tambah produk berhasil!'
        ]);
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('product.action', [
            'product' => $product,
            'categories' => Category::get()
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->purchased_price = $request->purchased_price;
        $product->selling_price = $request->selling_price;
        $product->selling_discount = $request->selling_discount;
        $product->stock = $request->stock;
        $product->save();
        return response()->json([
            'status' => '200',
            'message' => 'Update berhasil!'
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'status' => '200',
            'message' => 'Hapus "'. $product->name .'" berhasil!'
        ]);
    }
}
