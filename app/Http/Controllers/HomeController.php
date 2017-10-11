<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole(['staff', 'teknisi'])) {
            $proses = Laporan::where('status', 1)
                ->where('user_id', Auth::user()->id)->count();
            $pending = Laporan::where('status', 2)
                ->where('user_id', Auth::user()->id)->count();
            $selesai = Laporan::where('status', 3)
                ->where('user_id', Auth::user()->id)->count();
            $verified = Laporan::where('status', 4)
                ->where('user_id', Auth::user()->id)->count();

            for ($i = 1; $i <= 12; $i++) {
                $pro[$i] = Laporan::where([
                    ['status', 1]
                ])->where('user_id', Auth::user()->id)
                    ->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->count();
                $pen[$i] = Laporan::where([
                    ['status', 2]
                ])->where('user_id', Auth::user()->id)
                    ->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->count();
                $sel[$i] = Laporan::where([
                    ['status', 3]
                ])->where('user_id', Auth::user()->id)
                    ->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->count();
                $ver[$i] = Laporan::where([
                    ['status', 4]
                ])->where('user_id', Auth::user()->id)
                    ->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->count();
            }
        } elseif (Auth::user()->hasRole('kalab')) {
            $proses = Laporan::where('status', 1)->where('role_id', 7)->count();
            $pending = Laporan::where('status', 2)->where('role_id', 7)->count();
            $selesai = Laporan::where('status', 3)->where('role_id', 7)->count();
            $verified = Laporan::where('status', 4)->where('role_id', 7)->count();

            for ($i = 1; $i <= 12; $i++) {
                $pro[$i] = Laporan::where([['status', 1],['role_id', 7]])
                    ->whereMonth('created_at', '=', $i)
                    ->whereYear('created_at', '=', date('Y'))->count();
                $pen[$i] = Laporan::where([['status', 2],['role_id', 7]])
                    ->whereMonth('created_at', '=', $i)
                    ->whereYear('created_at', '=', date('Y'))->count();
                $sel[$i] = Laporan::where([['status', 3],['role_id', 7]])
                    ->whereMonth('created_at', '=', $i)
                    ->whereYear('created_at', '=', date('Y'))->count();
                $ver[$i] = Laporan::where([['status', 4],['role_id', 7]])
                    ->whereMonth('created_at', '=', $i)
                    ->whereYear('created_at', '=', date('Y'))->count();
            }
        } else {
            $proses = Laporan::where('status', 1)->count();
            $pending = Laporan::where('status', 2)->count();
            $selesai = Laporan::where('status', 3)->count();
            $verified = Laporan::where('status', 4)->count();

            for ($i = 1; $i <= 12; $i++) {
                $pro[$i] = Laporan::where([['status', 1]])
                    ->whereMonth('created_at', '=', $i)
                    ->whereYear('created_at', '=', date('Y'))->count();
                $pen[$i] = Laporan::where([['status', 2]])
                    ->whereMonth('created_at', '=', $i)
                    ->whereYear('created_at', '=', date('Y'))->count();
                $sel[$i] = Laporan::where([['status', 3]])
                    ->whereMonth('created_at', '=', $i)
                    ->whereYear('created_at', '=', date('Y'))->count();
                $ver[$i] = Laporan::where([['status', 4]])
                    ->whereMonth('created_at', '=', $i)
                    ->whereYear('created_at', '=', date('Y'))->count();
            }
        }
        return view('home',
            compact('proses', 'pending', 'selesai', 'verified',
                'pro', 'pen', 'sel', 'ver'));
    }
    public function check() {
	$data = Auth::user()->id;
    }
}
