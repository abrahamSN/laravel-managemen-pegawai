@extends('layouts.app')

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Form</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" id="form_validation" action="{{ url('/laporan/update',$show->id)}}" method="POST">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="tugaslaporan" class="col-sm-2 control-label">Jenis Tugas</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tugaslaporan" id="tugaslaporan" value="{{ $show->jenis_tugas }}">
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
                            <input type="number" class="form-control" name="durasi" id="durasi" value="{{ $show->durasi }}" placeholder="Durasi pekerjaan dalam hitungan jam">
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
                        <textarea name="description" id="description" class="textarea" placeholder="Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            {{ $show->description }}
                        </textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong> {{$errors->first('description')}} </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ url('/laporan') }}" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
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
@endsection