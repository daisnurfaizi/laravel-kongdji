<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.showdataproduk', compact('products'));
    }

    public function createproduct()
    {
        return view('admin.insertproduct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->get('product_name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->whatsapp = $request->get('whatsapp');
        $product->tokopedia = $request->get('tokopedia');
        $product->shopee = $request->get('shoppe');
        $product->bukalapak = $request->get('bukalapak');
        $productphpto = $request->file('photo');
        if ($productphpto) {
            $photo_path = $productphpto->store('Product-photo', 'public');
            $product->photo = $photo_path;
        }
        $product->save();
        if ($product) {
            Session::flash('success', 'Upload Produk berhasil!');
            return redirect()->route('insertproduct');
        } else {
            Session::flash('errors', ['' => 'Upload Produk gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('insertproduct');
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
        $produk = Product::findOrFail($id);
        return view('admin.editdataproduk', ['product' => $produk]);
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
        $produk = Product::findOrFail($id);
        $produk->product_name = $request->get('product_name');
        $produk->description = $request->get('description');
        $produk->price = $request->get('price');
        $produk->whatsapp = $request->get('whatsapp');
        $produk->tokopedia = $request->get('tokopedia');
        $produk->shopee = $request->get('shoppe');
        $produk->bukalapak = $request->get('bukalapak');
        $productphpto = $request->file('photo');
        if ($productphpto) {
            if ($produk->photo && file_exists(storage_path('app/public/' . $produk->photo))) {
                Storage::delete('public/' . $produk->photo);
            }
            $photo_path = $productphpto->store('Product-photo', 'public');
            $produk->photo = $photo_path;
        }
        $produk->save();
        if ($produk) {
            Session::flash('success', 'Update Produk berhasil!');
            return redirect()->route('dataproduk');
        } else {
            Session::flash('errors', ['' => 'update Produk gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('dataproduk');
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
        $produk = Product::findOrFail($id);
        if ($produk->photo && file_exists(storage_path('app/public/' . $produk->photo))) {
            Storage::delete('public/' . $produk->photo);
        }
        $produk->delete();
        if ($produk) {
            Session::flash('success', 'Update Produk berhasil!');
            return redirect()->route('dataproduk');
        } else {
            Session::flash('errors', ['' => 'update Produk gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('dataproduk');
        }
    }
}
