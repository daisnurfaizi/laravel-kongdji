<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Franchise;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FranchiseController extends Controller
{
    public function index($request)
    {
        $profile = Content::all();

        if ($request == "JABODETABEK") {
            $jabodetabek = Franchise::where('district', 'like', '%jakarta%')
                ->orWhere('district', 'like', '%bogor%')
                ->orWhere('district', 'like', '%depok%')
                ->orWhere('district', 'like', '%tangerang%')
                ->orWhere('district', 'like', '%bekasi%')->paginate(6);
            return view('customer.showlocation', [
                'franchises' => $jabodetabek,
                'profile' => $profile,
            ]);
        } else {
            $datafrinchise = explode('-', $request);
            $dataprovinsi = implode(' ', $datafrinchise);
            $franchise = Franchise::where('province', 'like', "%$dataprovinsi%")->paginate(6);
            return view('customer.showlocation', [
                'franchises' => $franchise, 'profile' => $profile,
            ]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $province = explode("/", $request->get('province'));
        $district = explode("/", $request->get('district'));
        $subdistrict = explode("/", $request->get('subdistrict'));
        $village = explode("/", $request->get('village'));
        $franchise = new Franchise();
        $franchise->name = $request->get('name');
        $franchise->owner = $request->get('owner');
        $franchise->province = $province[1];
        $franchise->district = $district[1];
        $franchise->subdistrict = $subdistrict[1];
        $franchise->village = $village[1];
        $franchise->address = $request->get('address');
        $simpan = $franchise->save();
        if ($simpan) {
            Session::flash('success', 'Upload Franchise berhasil!');
            return redirect()->route('RegisFranchise');
        } else {
            Session::flash('errors', ['' => 'Upload Franchise gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('RegisFranchise');
        }
    }

    public function showFormFranchise()
    {
        $provinsi = Region::select('code', 'name')
            ->whereRaw('CHAR_LENGTH(code)=2')
            ->orderBy('name')
            ->get();
        return view('admin.registerfranchise', ['provinsi' => $provinsi]);
    }

    public function showFranchise()
    {
        $franchise = Franchise::latest()->paginate(10);
        return view('admin.franchise.showfanchise', ['franchises' => $franchise]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Franchise::findOrFail($id);
        $user->delete();
        if ($user) {
            Session::flash('success', 'Delete franchise berhasil!');
            return redirect()->route('listfranchise');
        } else {
            Session::flash('errors', ['' => 'Delete franchise gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('listfranchise');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Region::select('code', 'name')
            ->whereRaw('CHAR_LENGTH(code)=2')
            ->orderBy('name')
            ->get();
        $franchise = Franchise::findOrFail($id);
        return view('admin.franchise.edit', [
            'Franchises' => $franchise,
            'provinsi' => $provinsi
        ]);
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
        // dd($request);
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'owner'                 => 'required|min:3|max:35',
            'province'              => 'required|min:3|max:35',
            'district'              => 'required|min:3|max:35',
            'subdistrict'           => 'required|min:3|max:35',
            'village'               => 'required|min:3',
        ];

        $messages = [
            'name.required'         => 'Nama Toko wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'province.required'     => 'Provinsi Wajib Di Pilih',
            'district.required'     => 'Kota/Kabupaten Wajib Di Pilih',
            'subdistric.required'   => 'Kecamatan Di Pilih',
            'village.required'      => 'Kelurahan/Desa Wajib Di Pilih',


        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $franchise = Franchise::findOrFail($id);
        $province = explode("/", $request->get('province'));
        $district = explode("/", $request->get('district'));
        $subdistrict = explode("/", $request->get('subdistrict'));
        $village = explode("/", $request->get('village'));
        $franchise = new Franchise();
        $franchise->name = $request->get('name');
        $franchise->owner = $request->get('owner');
        $franchise->province = $province[1];
        $franchise->district = $district[1];
        $franchise->subdistrict = $subdistrict[1];
        $franchise->village = $village[1];
        $franchise->address = $request->get('address');
        $simpan = $franchise->save();
        // dd($simpan);
        if ($simpan) {
            Session::flash('success', 'update berhasil!');
            return redirect()->route('listfranchise');
        } else {
            Session::flash('errors', ['' => 'Update gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('listfranchise');
        }
    }
}
