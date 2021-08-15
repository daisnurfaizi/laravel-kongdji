<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function n(Request $request)
    {
        return strlen($request['code']);
    }
    public function m(Request $request)
    {
        $n = $this->n($request);
        return ($n == 2 ? 5 : ($n == 5 ? 8 : 13));
    }
    public function province()
    {
        // SELECT kode,nama FROM wilayah_2020 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama'
        // SELECT code,name FROM regions WHERE CHAR_LENGTH(code)=2 ORDER BY name
        $province = Region::select('code', 'name')
            ->whereRaw('CHAR_LENGTH(code)=2')
            ->orderBy('name')
            ->get();
        return $province;
    }
    public function district(Request $request)
    {
        $n = $this->n($request);
        $m = $this->m($request);
        $code = $request['code'];
        // SELECT kode,nama FROM wilayah_2020 WHERE LEFT(kode,'$n')=:kode AND CHAR_LENGTH(kode)=$m ORDER BY nama
        $district = Region::select('code', 'name')
            ->whereRaw("LEFT(code,$n)=$code")
            ->whereRaw("CHAR_LENGTH(code)=$m")
            ->orderBy('name')
            ->get();
        return json_encode($district);
    }
    public function subdistrict(Request $request)
    {
        $n = $this->n($request);
        $m = $this->m($request);
        $code = $request['code'];
        // SELECT kode,nama FROM wilayah_2020 WHERE LEFT(kode,'$n')=:kode AND CHAR_LENGTH(kode)=$m ORDER BY nama
        $subdistrict = Region::select('code', 'name')
            ->whereRaw("LEFT(code,$n)=$code")
            ->whereRaw("CHAR_LENGTH(code)=$m")
            ->orderBy('name')
            ->get();
        return json_encode($subdistrict);
    }

    public function vilage(Request $request)
    {
        $code = $request['code'];
        $subdistrict = Region::select('code', 'name')
            ->whereRaw("LEFT(code,8)=$code")
            ->whereRaw("CHAR_LENGTH(code)=13")
            ->orderBy('name')
            ->get();
        return json_encode($subdistrict);
    }
}
