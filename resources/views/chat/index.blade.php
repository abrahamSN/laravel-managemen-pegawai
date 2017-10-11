@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <a href="{{ url('chat/compose') }}" class="btn btn-primary btn-block margin-bottom">Compose</a>

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
                        <li @if(!Request::segment(2))class="active"@endif><a href="{{ url('/chat') }}"><i
                                        class="fa fa-inbox"></i> Room</a></li>
                        <li @if(Request::segment(2) == 'sent')class="active"@endif><a href="{{ url('/chat/sent') }}"><i
                                        class="fa fa-envelope-o"></i> Sent</a></li>
                        <li @if(Request::segment(2) == 'inbox')class="active"@endif><a
                                    href="{{ url('/chat/inbox') }}"><i class="fa fa-file-text-o"></i> Inbox</a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Inbox</h3>

                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <input type="text" class="form-control input-sm" placeholder="Search Mail">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-controls">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>

                        <div class="pull-right">

                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                            @if (count($rchat) != 0)
                                @foreach($rchat as $rc )
                                    <tr>
                                        <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a>
                                        </td>
                                        <td class="mailbox-name"><a
                                                    href="{{ url('/chat', $rc->id) }}">{{ $rc->author->name }}</a></td>
                                        <td class="mailbox-subject"><b>{{ $rc->subj }}</b> -
                                            @if(count($rc->chat) == 0)
                                                {{ $rc->body }}
                                            @else
                                                @foreach( $rc->chat() as $cht)
                                                    {{ $cht->first() }}
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date pull-right">
                                            {{ $rc->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <center><H1>Data anda kosong</H1></center>
                            @endif
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                </div>
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('css')
@endsection

@section('js')
@endsection
