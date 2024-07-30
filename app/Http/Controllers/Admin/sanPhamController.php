<?php

namespace App\Http\Controllers\Admin;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class sanPhamController extends Controller
{

    public function index()
    {
        $title='Danh Sách Sản Phẩm';
        $listSanPham=SanPham::orderByDesc('is_type')->get();

        return view('admins.sanphams.index',compact('title','listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { $title='Thêm Danh Mục Sản Phẩm';
        $listDanhMuc=DanhMuc::all();
        return view('admins.sanphams.create',compact('title','listDanhMuc'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
