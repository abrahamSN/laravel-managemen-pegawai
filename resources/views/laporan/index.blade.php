@extends('layouts.app')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                @if(Auth::user()->can(['laporan-create']))
                    <a href="{{ url('/laporan/tambah') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>
                        Tambah</a>
                @endif
            </h3>

            <a type="button" class="btn btn-default btn-sm pull-right" data-toggle="modal"
               data-target="#modal-default">
                <i class="fa fa-print"></i>
                Print Laporan
            </a>

        </div>

        <!-- /.box-header -->
        <div class="box-body no-padding">

            <div class="col-md-12">
                <!-- Custom Tabs (Pulled to the right) -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li @if(Auth::user()->hasRole(['kajur','kalab'])) class="active" @endif><a href="#tab_verif"
                                                                                                   data-toggle="tab">Verified</a>
                        </li>
                        <li @if(Auth::user()->hasRole(['staff','teknisi','admin'])) class="active" @endif><a
                                    href="#tab_pross"
                                    data-toggle="tab">Sedang
                                di Proses</a></li>
                        <li class="pull-left header"><i class="fa fa-th"></i> Data Laporan</li>
                    </ul>
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane @if(Auth::user()->hasRole(['staff','teknisi','admin'])) active @endif"
                             id="tab_pross">
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px" class="text-center">Id</th>
                                    <th>Staff</th>
                                    <th>Jenis Tugas</th>
                                    <th>Durasi</th>
                                    <th>Status</th>
                                    <th>Tgl Buat</th>
                                    @if(Auth::user()->can(['laporan-edit','laporan-delete']))
                                        <th style="width: 150px" class="text-center">Aksi</th>
                                    @endif
                                </tr>

                                @foreach ($proses as $pro)
                                    <tr>
                                        <td class="text-center">{{ $pro->id }}</td>
                                        <td>{{ $pro->user['name']}}</td>
                                        <td>{{ $pro->jenis_tugas}}</td>
                                        <td>{{ $pro->durasi}} jam</td>
                                        <td>
                                            @if($pro->status == 1)
                                                <a
                                                        @if(Auth::user()->can('laporan-kerjakan'))
                                                        href="{{url('/laporan/show', $pro->id)}}"
                                                        @else
                                                        disabled
                                                        @endif
                                                        type="button"
                                                        class="btn btn-sm btn-info">
                                                    <i class="fa fa-edit"></i>
                                                    Sedang di proses
                                                </a>
                                            @else
                                                <a
                                                        @if(Auth::user()->can('laporan-kerjakan'))
                                                        href="{{url('/laporan/show', $pro->id)}}"
                                                        @elseif(Auth::user()->id != $pro->user_id )
                                                        disabled
                                                        @else
                                                        disabled
                                                        @endif
                                                        type="button"
                                                        class="btn btn-sm btn-danger">
                                                    <i class="fa fa-edit"></i>
                                                    Sedang di pending
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $pro->created_at}}</td>

                                        @if(Auth::user()->can(['laporan-edit','laporan-delete']))
                                            <td class="text-center">
                                                @if(Auth::user()->can(['laporan-delete']))
                                                    <a href="{{ url('/laporan/hapus', $pro->id) }}">
                                                        <button type="submit" class="btn btn-danger btn-sm "><i
                                                                    class="fa fa-trash"></i>
                                                            Hapus
                                                        </button>
                                                    </a>
                                                @endif
                                                @if(Auth::user()->can(['laporan-edit']))
                                                    <a href="{{ url('/laporan/edit', $pro->id) }}">
                                                        <button type="submit" class="btn btn-warning btn-sm "><i
                                                                    class="fa fa-edit"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane @if(Auth::user()->hasRole(['kajur','kalab'])) active @endif"
                             id="tab_verif">
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px" class="text-center">Id</th>
                                    <th>Staff</th>
                                    <th>Jenis Tugas</th>
                                    <th>Status</th>
                                    <th>Tgl Buat</th>
                                    @if(Auth::user()->can(['laporan-edit','laporan-delete']))
                                        <th style="width: 150px" class="text-center">Aksi</th>
                                    @endif
                                </tr>

                                @foreach ($verified as $ver)
                                    <tr>
                                        <td class="text-center">{{ $ver->id }}</td>
                                        <td>{{ $ver->user['name']}}</td>
                                        <td>{{ $ver->jenis_tugas}}</td>
                                        <td>
                                            @if($ver->status == 3)
                                                <a
                                                        @if(Auth::user()->can('laporan-verif'))
                                                        href="{{url('/laporan/show', $ver->id)}}"
                                                        @elseif(Auth::user()->id != $ver->user_id )
                                                        disabled
                                                        @else
                                                        disabled
                                                        @endif
                                                        type="button"
                                                        class="btn btn-sm btn-info">
                                                    <i class="fa fa-edit"></i>
                                                    Selesai
                                                </a>
                                            @else
                                                <a
                                                        type="button"
                                                        class="btn btn-sm btn-success">
                                                    <i class="fa fa-edit"></i>
                                                    Verified
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $ver->created_at}}</td>

                                        @if(Auth::user()->can(['laporan-edit','laporan-delete']))
                                            <td class="text-center">
                                                @if(Auth::user()->can(['laporan-delete']))
                                                    <a href="{{ url('/laporan/hapus', $ver->id) }}">
                                                        <button type="submit" class="btn btn-danger btn-sm "><i
                                                                    class="fa fa-trash"></i>
                                                            Hapus
                                                        </button>
                                                    </a>
                                                @endif
                                                @if(Auth::user()->can(['laporan-edit']))
                                                    <a href="{{ url('/laporan/edit', $ver->id) }}">
                                                        <button type="submit" class="btn btn-warning btn-sm "><i
                                                                    class="fa fa-edit"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@section('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <!-- separatecommas -->
    <link rel="stylesheet" href="{{ asset('plugins/separatecommas/css/style.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>
@endsection

@section('js')

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <form action="{{ url('/laporan/pdf') }}" method="POST">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="datepicker" class="col-sm-12 control-label">Tanggal Laporan</label>
                            <input type="text" class="form-control" required name="datepicker" id="datepicker"
                                   placeholder="Print laporan berdasarkan tanggal">
                        </div>
                        <div class="form-group">
                            <label for="kegiatan" class="col-sm-12 control-label">
                                Rencana Kegiatan Besok
                            </label>
                            <small class="label bg-red">pisahkan tiap kegiatan dengan simbol koma.</small><br>
                            <small class="label bg-red">contoh = Membuat Data Pekerjaan, Membuat Surat Keluar, Melisting Data, Membuat Laporan Data</small>
                            <textarea class="form-control" name="kegiatan" id="kegiatan"
                                      placeholder="Rencana Kegiatan Besok"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default pull-left" data-dismiss="modal">Close</a>
                        <button class="btn btn-primary">Print PDF</button>
                    </div>
                </form>
            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- bootstrap datepicker -->
    <script src="{{ asset('plugins/separatecommas/js/index.js') }}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
    </script>
@endsection