<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function data()
    {
        return DataTables::of(Category::query())
            ->addColumn('action', function($row) {
                $action = '';
                $action .= '<button data-id=' . $row->id . ' data-type="edit" class="btn btn-sm btn-warning action">Edit</button>';
                $action .= ' <button data-id=' . $row->id . ' data-type="delete" class="btn btn-sm btn-danger action">Hapus</button>';
                return $action;
            })
            ->make(true);
    }
    
    public function index()
    {
        return view('category.index');
    }

    public function create()
    {
        return view('category.action', ['category' => new Category()]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return response()->json([
            'status' => '200',
            'message' => 'Tambah kategori berhasil!'
        ]);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('category.action', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();
        return response()->json([
            'status' => '200',
            'message' => 'Update berhasil!'
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'status' => '200',
            'message' => 'Hapus "'. $category->name .'" berhasil!'
        ]);
    }
}
