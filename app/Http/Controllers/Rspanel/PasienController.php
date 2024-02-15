<?php

namespace App\Http\Controllers\Rspanel;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pasen = Pasien::with('rumahSakit')->get();
        $rs = RumahSakit::all();
        return view('rspanel.pasien.index', [
            'title' => 'Data Pasien',
            'pasen' => $data_pasen,
            'rs'    => $rs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rs = RumahSakit::all();
        return view('rspanel.pasien.create', [
            'title' => 'Create Data Pasien',
            'rs'    => $rs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien'       => 'required',
            'alamat'            => 'required',
            'telepon'           => 'required|numeric',
            'rumah_sakit'       => 'required',
        ]);

        try {
            Pasien::create([
                'nama_pasien' => $request->nama_pasien,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'id_rumah_sakit'    => $request->rumah_sakit
            ]);
            return redirect('/pasien')->with('success', 'Data pasien berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect('/pasien')->with('error', 'Data pasien gagal disimpan. Silakan coba lagi.');
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
        $detail_pasen = Pasien::with('rumahSakit')->findOrFail($id);
        return view('rspanel.pasien.show', [
            'title'     => 'Detail Data Pasien',
            'detail'    => $detail_pasen,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail_pasen = Pasien::with('rumahSakit')->findOrFail($id);
        $data_rs  = RumahSakit::all();
        return view('rspanel.pasien.edit', [
            'title'         => 'Edit Data Pasien',
            'detail_pasen'  => $detail_pasen,
            'rs'            => $data_rs,
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
        $request->validate([
            'nama_pasien'       => 'required',
            'alamat'            => 'required',
            'telepon'           => 'required|numeric',
            'rumah_sakit'       => 'required',
        ]);
        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->update([
                'nama_pasien' => $request->nama_pasien,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'id_rumah_sakit'    => $request->rumah_sakit
            ]);
            return redirect('/pasien')->with('success', 'Data pasien berhasil dirubah.');
        } catch (\Exception $e) {
            return redirect('/pasien')->with('error', 'Terjadi kesalahan Data pasien gagal dirubah.');
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
            $rumahSakit = Pasien::findOrFail($id);
            $rumahSakit->delete();
            return response()->json(['success'  => 'Data pasien berhasil di hapus.']);
        } catch (\Exception $e) {
            return response()->json(['error'  => 'Terjadi kesalahan saat menghapus data pasien.']);
        }
    }

    public function filterByRs(Request $request)
    {
        $id_rumah_sakit = $request->id_rumah_sakit;

        if ($id_rumah_sakit) {
            if ($id_rumah_sakit == "ALL") {
                $pasien = Pasien::with('rumahSakit')->get();
            } else {
                $pasien = Pasien::with('rumahSakit')->where('id_rumah_sakit', $id_rumah_sakit)->get();
            }
            return response()->json($pasien);
        } else {
            $pasien = Pasien::with('rumahSakit')->get();
            return response()->json($pasien);
        }
    }
}
