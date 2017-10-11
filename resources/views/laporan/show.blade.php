@extends('layouts.app')

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Form</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" id="selesai" action="{{ url('/laporan/selesai', $show->id) }}" method="POST"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="tugaslaporan" class="col-sm-2 control-label">Jenis Tugas</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tugaslaporan" id="tugaslaporan"
                               value="{{ $show->jenis_tugas }}" disabled>
                        @if ($errors->has('tugaslaporan'))
                            <span class="help-block">
                                <strong> {{$errors->first('tugaslaporan')}} </strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="durasi" class="col-sm-2 control-label">Durasi</label>

                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="number" class="form-control" name="durasi" id="durasi"
                                   value="{{ $show->durasi }}" disabled
                                   placeholder="Durasi pekerjaan dalam hitungan jam">
                            <span class="input-group-addon">jam</span>
                        </div>
                        @if ($errors->has('durasi'))
                            <span class="help-block">
                                <strong> {{$errors->first('durasi')}} </strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-10">
                        <textarea name="description" id="description" disabled class="textarea"
                                  placeholder="Description"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            {{ $show->description }}
                        </textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong> {{$errors->first('description')}} </strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">Created at</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tugaslaporan" id="tugaslaporan"
                               value="{{ $show->created_at }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">Status</label>

                    <div class="col-sm-10">
                        @if($show->status == 1)
                            @if(Auth::user()->can('laporan-kerjakan'))
                                <a href="{{ url('/laporan/pending',$show->id) }}" class="btn btn-warning">Pending
                                    Pekerjaan</a>
                                <a id="slpk" class="btn btn-success">Selesaikan
                                    Pekerjaan</a>
                            @endif
                        @elseif($show->status == 2)
                            @if(Auth::user()->can('laporan-kerjakan'))
                                <a href="{{ url('/laporan/kerjakan',$show->id) }}" class="btn btn-info">Lanjut
                                    Kerjakan</a>
                            @endif
                        @elseif($show->status == 3)
                            @if(Auth::user()->can('laporan-verif'))
                                <a href="{{ url('/laporan/verif',$show->id) }}" class="btn btn-success">Verifikasi</a>
                            @endif
                        @else
                            Verified
                        @endif

                    </div>
                </div>

                @if($show->status == 3)
                    <div class="form-group">

                        <label for="status" class="col-sm-2 control-label">File</label>

                        <div class="col-sm-10">
                            @foreach($show->files as $file)
                                <a class="btn btn-default" href="{{ asset('images/laporan/'.$file->filename) }}">{{$file->filename}}</a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($show->status == 1)
                    <div class="form-group">
                        @if (count($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <label for="file" id="file_label" class="col-sm-2 control-label">File</label>

                        <div class="col-sm-10">
                            <div id="file">
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="file" name="files[]" multiple/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input class="btn btn-success" type="submit" value="Upload & Selesaikan"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ url('/laporan') }}" class="btn btn-default">Batal</a>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
@endsection

@section('css')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endsection

@section('js')
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
        $(function () {
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });
    </script>

    <script>
        $(function () {
            //bootstrap WYSIHTML5 - text editor
            $("#file_label").hide();
            $("#file").hide();
        });
        $("#slpk").click(function () {

            var lable = $("#slpk").text().trim();

            if (lable == "Selesaikan Pekerjaan") {
                $("#slpk").text("Batal Selesaikan Pekerjaan");
                $("#file").show();
                $("#file_label").show();
            }
            else {
                $("#slpk").text("Selesaikan Pekerjaan");
                $("#file").hide();
                $("#file_label").hide();
            }

        });
    </script>
@endsection