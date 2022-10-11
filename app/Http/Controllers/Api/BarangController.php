<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Exceptions;
use App\Models\Modelbarang;
use Exception;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Modelbarang::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Succes', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
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
        try {
            $request->validate([
                'kd_brg' => 'required',
                'nm_brg' => 'required',
                'kategori' => 'required',
                'satuan' => 'required',
                'stok' => 'required',
                'merk' => 'required',
                'spesifikasi' => 'required',
            ]);

            $barang = Modelbarang::create([
                'kd_brg' => $request->kd_brg,
                'nm_brg' => $request->nm_brg,
                'kategori' => $request->kategori,
                'satuan' => $request->satuan,
                'stok' => $request->stok,
                'merk' => $request->merk,
                'spesifikasi' => $request->spesifikasi
            ]);

            $data = Modelbarang::where('id', '=', $barang->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Succes', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
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
        $data = Modelbarang::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Succes', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
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
        try {
            $request->validate([
                'kd_brg' => 'required',
                'nm_brg' => 'required',
                'kategori' => 'required',
                'satuan' => 'required',
                'stok' => 'required',
                'merk' => 'required',
                'spesifikasi' => 'required',
            ]);

            $barang = Modelbarang::findOrFail($id);

            $barang->update([
                'kd_brg' => $request->kd_brg,
                'nm_brg' => $request->nm_brg,
                'kategori' => $request->kategori,
                'satuan' => $request->satuan,
                'stok' => $request->stok,
                'merk' => $request->merk,
                'spesifikasi' => $request->spesifikasi
            ]);

            $data = Modelbarang::where('id', '=', $barang->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Succes', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
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
        try {
            $barang = Modelbarang::findOrFail($id);

            $data = $barang->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Succes Destroyed Data');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch(Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
        
    }
}
