<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.posting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|integer',

        ];

        $pesan=[
            'name.required'=>'Nama Barang Tidak Boleh Kosong',
            'category_id'=>'Kategori tidak boleh Kosong',
            'price.required'=>'Harga Barang Tidak Boleh Kosong',
            'imageFile.required'=>'Gambar Tidak Boleh Kosong',
            'qty.required'=>'Jumlah Stok Tidak Boleh Kosong'
        ];

        $validator=Validator::make(Input::all(),$rules,$pesan);
        //jika data ada yang kosong
        if ($validator->fails()) {
            //refresh halaman
            return Redirect::to('admin/posting/create')
            ->withErrors($validator);

        }else{

            $image=$request->file('imageFile')->store('productImages','public');

            $product=new \App\Product;

            $product->name=Input::get('name');
            $product->category_id=Input::get('category_id');
            $product->qty=Input::get('qty');
            $product->price=Input::get('price');
            $product->image=$image;
            $product->save();

            Session::flash('message','Berhasil Ditambah');

            return redirect::to('admin/product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
