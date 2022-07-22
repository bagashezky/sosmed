<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\posting;

class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //refresh halaman
        return view('admin.posting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //refresh halaman
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
        //validasi data seperti caption maximal 250
        $validatedData = $request->validate([
            'caption' => 'required|max:250',
        ]);
        //memasukan data ke database melalui model
        $posting = Posting::create($validatedData);

        return redirect('/admin/dashboard')->with('success', 'Caption is successfully saved');
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
        $posting = posting::findOrFail($id);

        return view('admin.posting.edit', compact('posting'));
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
        //Validasi
        $rules=[
            'caption'=>'required|max:250',
        ];
        //akan muncul pesan jika kosong
        $pesan=[
            'caption.required'=>'Caption Tidak Boleh Kosong!!',
        ];


        $validator=Validator::make(Input::all(),$rules,$pesan);

        if ($validator->fails()) {
            return Redirect::to('admin/posting/'.$id.'/edit')
            ->withErrors($validator);

        }else{

            $image="";

            if (!$request->file('imageFile')) {
                # code...
                $image=Input::get('imagePath');
            }else{
                $image=$request->file('imageFile')->store('categoryImages','public');
            }

            $posting=\App\posting::find($id);

            $posting->caption=Input::get('caption');
            $posting->save();

            Session::flash('message','Data Barang Berhasil Diubah');

            return Redirect::to('admin/dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //untuk melakukan hapus data
        $posting=\App\posting::find($id);
        $posting->delete();

        Session::flash('message','Berhasil Dihapus');
        return Redirect::to('admin/dashboard');
    }
}
