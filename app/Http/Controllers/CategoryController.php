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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.action', ['category' => new Category()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return response()->json([
            'status' => '200',
            'message' => 'Tambah kategori berhasil!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.action', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();
        return response()->json([
            'status' => '200',
            'message' => 'Update berhasil!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'status' => '200',
            'message' => 'Hapus "'. $category->name .'" berhasil!'
        ]);
    }
}
