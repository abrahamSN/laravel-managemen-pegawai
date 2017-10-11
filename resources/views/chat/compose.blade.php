@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Folders</h3>

                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ url('/chat') }}"><i class="fa fa-inbox"></i> Room</a></li>
                        <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                        <li><a href="#"><i class="fa fa-file-text-o"></i> Inbox</a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Compose New Message</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ url('/chat/store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <select class="form-control select2" name="penerima">
                                <option selected="selected">To :</option>
                                @foreach( $user as $us )
                                    <option value="{{ $us->id }}">{{ $us->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="subj" placeholder="Subject:">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" style="height: 100px" name="body"></textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                        </div>
                        <a href="{{ url('/chat') }}" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
                    </div>
                </form>
                <!-- /.box-footer -->
            </div>

            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}">
@endsection

@section('js')


    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
@endsection
