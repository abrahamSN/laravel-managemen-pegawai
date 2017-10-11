<?php

namespace App\Http\Controllers;

use App\FileLaporan;
use App\Laporan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole(['staff', 'teknisi'])) {
            $proses = Laporan::where(function ($q) {
                $q->where('user_id', Auth::user()->id)->where('status', 1);
            })
                ->orWhere(function ($q) {
                    $q->where('user_id', Auth::user()->id)->where('status', 2);
                })->get();
            $verified = Laporan::where(function ($q) {
                $q->where('user_id', Auth::user()->id)->where('status', 3);
            })
                ->orWhere(function ($q) {
                    $q->where('user_id', Auth::user()->id)->where('status', 4);
                })->get();
        } elseif (Auth::user()->hasRole('kalab')) {

            $proses = Laporan::where([['status', 2],['role_id', 7]])->orWhere([['status', 1],['role_id', 7]])->get();
            $verified = Laporan::where([['status', 3],['role_id', 7]])->orWhere([['status', 4],['role_id', 7]])->get();

        } else {
            $proses = Laporan::where('status', 2)->orWhere('status', 1)->get();
            $verified = Laporan::where('status', 3)->orWhere('status', 4)->get();
        }
        return view('laporan.index', compact('proses', 'verified'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tugaslaporan' => 'required',
            'durasi' => 'required',
            'description' => 'required',
        ]);

        /* validate activated */
        $tambah = new Laporan();
        $roles = User::find(Auth::user()->id)->roles()->get();

        $tambah->user_id = Auth::user()->id;
        $tambah->jenis_tugas = $request['tugaslaporan'];
        $tambah->durasi = $request['durasi'];
        foreach ($roles as $ro) {
            $tambah->role_id = $ro->id;
        }
        $tambah->description = $request['description'];
        $tambah->save();
        $request->session()->flash('message', 'Data berhasil ditambahkan');

        return redirect()->to('/laporan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Laporan::where('id', $id)->first();
        return view('laporan.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $show = Laporan::where('id', $id)->first();
        return view('laporan.detail', compact('show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tugaslaporan' => 'required',
            'durasi' => 'required',
            'description' => 'required',
        ]);
        /* validate activated */
        $update = Laporan::find($id);
        $update->jenis_tugas = $request['tugaslaporan'];
        $update->durasi = $request['durasi'];
        $update->description = $request['description'];
        $update->update();

        return redirect()->to('/laporan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Laporan::where('id', $id)->first();
        $destroy->delete();
        \Session::flash('message', 'Data berhasil dihapus');

        return redirect()->to('/laporan');
    }

    public function pending($id)
    {
        $kerja = Laporan::where('id', $id)->first();
        if ($kerja->status == 1) {
            $kerja->status = 2;
        }
        $kerja->update();
        \Session::flash('message', 'Data berhasil diubah');

        return redirect()->to('/laporan');
    }

    public function kerja($id)
    {
        $kerja = Laporan::where('id', $id)->first();
        if ($kerja->status == 2) {
            $kerja->status = 1;
        }
        $kerja->update();
        \Session::flash('message', 'Data berhasil diubah');

        return redirect()->to('/laporan');
    }

    public function selesai($id, Request $request)
    {
        $kerja = Laporan::where('id', $id)->first();
        if ($kerja->status == 1) {
            $kerja->status = 3;
        }
        $kerja->update();

        $files = $request->file('files');

        if ($files) {

            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();

                $file->move("images/laporan", $fileName);

                $tambah = new FileLaporan();

                $tambah->laporan_id = $id;
                $tambah->filename = $fileName;
                $tambah->save();
            }
        } else {
            echo 'test';
        }

        \Session::flash('message', 'Data berhasil diubah');

        return redirect()->to('/laporan');
    }

    public function verif($id)
    {
        $kerja = Laporan::where('id', $id)->first();
        if ($kerja->status == 3) {
            $kerja->status = 4;
        }
        $kerja->update();
        \Session::flash('message', 'Data berhasil diubah');

        return redirect()->to('/laporan');
    }

    public function pdf(Request $request)
    {
        $tanggal = explode('/', $request->get('datepicker'));
        $bulan = $tanggal[0];
        $tgl = $tanggal[1];
        $tahun = $tanggal[2];

        $newDate = date("Y-m-d", strtotime($request->get('datepicker')));

        $dt = strtotime($request->get('datepicker'));
        $kegiatan = explode(',',$request->get('kegiatan'));
        $day = date('D', $dt);

        if (Auth::user()->hasRole(['staff', 'teknisi'])) {
            $laporan_pdf = Laporan::orderBy('created_at', 'ASC')
                ->whereDate('created_at', '=', $newDate)
                ->where('user_id', '=', Auth::user()->id)
                ->where('status', 4)
                ->get();
        } else {
            $laporan_pdf = Laporan::orderBy('created_at', 'ASC')
                ->whereDate('created_at', '=', $newDate)
                ->where('status', 4)
                ->get();
        }
        $kode = 'LAP-' . $tgl . '-' . $bulan . '-' . $tahun;
        $pdf = PDF::loadView('laporan.pdf', compact('kegiatan','day', 'tgl', 'bulan', 'tahun', 'laporan_pdf'));
        return $pdf->stream($kode . '.pdf');
    }
}
