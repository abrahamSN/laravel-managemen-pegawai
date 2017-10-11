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
                        <li @if(!Request::segment(2))class="active"@endif><a href="{{ url('/chat') }}"><i class="fa fa-inbox"></i> Room</a></li>
                        <li @if(Request::segment(2) == 'sent')class="active"@endif><a href="{{ url('/chat/sent') }}"><i class="fa fa-envelope-o"></i> Sent</a></li>
                        <li @if(Request::segment(2) == 'inbox')class="active"@endif><a href="{{ url('/chat/inbox') }}"><i class="fa fa-file-text-o"></i> Inbox</a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <!-- Box Comment -->
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="../dist/img/user2-160x160.jpg" alt="User Image">
                        <span class="username"><a href="#">{{ $rchat->author['name'] }}</a></span>
                        <span class="description">{{ $rchat->subj }} - {{ $rchat->created_at }}</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- post text -->
                    <p>{{ $rchat->body }}</p>

                    <!-- Social sharing buttons -->
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                    <span class="pull-right text-muted">{{ count($rchat->chat) }} balasan</span>
                </div>
                <!-- /.box-body -->
                <div class="box-footer box-comments">
                    @foreach( $rchat->chat as $chat )
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user2-160x160.jpg" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    {{ $chat->author['name'] }}
                                    <span class="text-muted pull-right">{{ $chat->created_at }}</span>
                                </span><!-- /.username -->
                                {{ $chat->body }}
                            </div>
                            <!-- /.comment-text -->
                        </div>
                    @endforeach
                </div>
                <!-- /.box-footer -->
                <div class="box-footer">
                    <form action="{{ url('chat/reply', $rchat->id) }}" method="post">
                        {{ csrf_field() }}
                        <img class="img-responsive img-circle img-sm" src="../dist/img/user2-160x160.jpg"
                             alt="Alt Text">
                        <!-- .img-push is used to add margin to elements next to floating images -->
                        <div class="img-push">
                            <input type="text" class="form-control input-sm" id="body" name="body" placeholder="Press enter to reply" required minlength="20">
                        </div>
                    </form>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('css')
    <script>
        function top() {
            document.getElementById( 'top' ).scrollIntoView();
        };

        function bottom() {
            document.getElementById( 'bottom' ).scrollIntoView();
            window.setTimeout( function () { top(); }, 2000 );
        };

        bottom();
    </script>
@endsection

@section('js')


    <!-- Select2 -->
    <script src="{{ asset('/plugins/moment/moment.js') }}"></script>
@endsection
