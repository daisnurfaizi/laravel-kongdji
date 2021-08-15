<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Franchise;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $franchise = Franchise::count();
        $user = User::count();
        $produk = Product::count();
        return view('admin.index', [
            'countfranchise' => $franchise,
            'countuser' => $user,
            'countproduk' => $produk
        ]);
    }

    public function customer()
    {
        $profile = Content::all();
        $produk = Product::latest()->paginate(6);
        return view('customer.customer', [
            'profile' => $profile,
            'products' => $produk
        ]);
    }

    public function customerProduk()
    {
        $profile = Content::all();
        $produk = Product::latest()->paginate(9);
        return view('customer.produk', [
            'profile' => $profile,
            'products' => $produk
        ]);
    }

    public function content()
    {
        $content = Content::all();
        return view('admin.content', ['contents' => $content]);
    }
}
