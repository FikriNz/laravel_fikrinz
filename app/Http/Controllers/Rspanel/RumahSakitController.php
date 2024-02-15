<?php

namespace App\Http\Controllers\Rspanel;

use App\Http\Controllers\Controller;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_rs    = RumahSakit::all();
        return view('rspanel.rumahsakit.index', [
            'title'     => 'Data Rumah Sakit',
            'data_rs'   => $data_rs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rspanel.rumahsakit.create', [
            'title'     => 'Tambah Data Rumah Sakit'
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
            'nama_rumahsakit'   => 'required',
            'alamat'            => 'required',
            'email'             => 'required|email',
            'telepon'           => 'required|numeric',
        ]);

        try {
            RumahSakit::create([
                'nama_rumah_sakit' => $request->nama_rumahsakit,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'telepon' => $request->telepon,
            ]);
            return redirect('rumah-sakit')->with('success-rumahsakit', 'Data rumah sakit berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect('rumah-sakit')->with('error-rumahsakit', 'Data rumah sakit gagal disimpan. Silakan coba lagi.');
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
        $detail_rs  = RumahSakit::findOrFail($id);
        return view('rspanel.rumahsakit.show', [
            'title'     => 'Detail Data Rumah Sakit',
            'detail'    => $detail_rs,
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
        $data_rs  = RumahSakit::findOrFail($id);
        return view('rspanel.rumahsakit.edit', [
            'title'     => 'Edit Data Rumah Sakit',
            'data_rs'   => $data_rs,
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
            'nama_rsedit'   => 'required',
            'alamat_edit'   => 'required',
            'email_edit'    => 'required|email',
            'tlp_edit'      => 'required|numeric',
        ]);

        try {
            $rumahSakit = RumahSakit::findOrFail($id);
            $rumahSakit->update([
                'nama_rumah_sakit' => $request->nama_rsedit,
                'alamat' => $request->alamat_edit,
                'email' => $request->email_edit,
                'telepon' => $request->tlp_edit,
            ]);
            return redirect('rumah-sakit')->with('success-rumahsakit', 'Data rumah sakit berhasil di rubah.');
        } catch (\Exception $e) {
            return redirect('rumah-sakit')->with('error-rumahsakit', 'Data rumah sakit gagal di rubah. Silakan coba lagi.');
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
            $rumahSakit = RumahSakit::findOrFail($id);
            $rumahSakit->delete();
            return response()->json(['success'  => 'Data rumah sakit berhasil di hapus.']);
        } catch (\Exception $e) {
            return response()->json(['error'  => 'Terjadi kesalahan saat menghapus data rumah sakit.']);
        }
    }
}
