@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-edit"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Proses</span>
                    <span class="info-box-number">{{ $proses }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-spinner"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pending</span>
                    <span class="info-box-number">{{ $pending }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-check"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Selesai</span>
                    <span class="info-box-number">{{ $selesai }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-check-square-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Verified</span>
                    <span class="info-box-number">{{ $verified }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="clock"></div>
    </div>

    <div class="box">

        <div class="box-header">
            <h3 class="box-title">
                Grafik tahunan
            </h3>

        </div>

        <!-- /.box-header -->
        <div class="box-body no-padding">

            <canvas id="myChart" height="100px"></canvas>
        </div>
    </div>
@endsection

@section('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/plugins/flipclock/flipclock.css') }}">
@endsection

@section('js')

    <script src="{{ asset('/plugins/flipclock/flipclock.min.js')}}"></script>
    <script type="text/javascript">
        var clock = $('.clock').FlipClock({
            clockFace: 'TwelveHourClock'
        });
    </script>


    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                    label: 'Sedang di Proses',
                    data: [
                        @foreach($pro as $pr)
                        {{ $pr }},
                        @endforeach
                    ],
                    backgroundColor: [
                        @for($i=1; $i<=12; $i++)
                            'rgb(0, 192, 239)',
                        @endfor
                    ],
                    borderColor: [
                        @for($i=1; $i<=12; $i++)
                            'rgb(0, 192, 239)',
                        @endfor
                    ],
                    borderWidth: 1
                },
                    {
                        label: 'Pending',
                        data: [
                            @foreach($pen as $pe)
                            {{ $pe }},
                            @endforeach
                        ],
                        backgroundColor: [
                            @for($i=1; $i<=12; $i++)
                                'rgb(221, 75, 57)',
                            @endfor
                        ],
                        borderColor: [
                            @for($i=1; $i<=12; $i++)
                                'rgb(221, 75, 57)',
                            @endfor
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Selesai',
                        data: [
                            @foreach($sel as $se)
                            {{ $se }},
                            @endforeach
                        ],
                        backgroundColor: [
                            @for($i=1; $i<=12; $i++)
                                'rgb(243, 156, 18)',
                            @endfor
                        ],
                        borderColor: [
                            @for($i=1; $i<=12; $i++)
                                'rgb(243, 156, 18)',
                            @endfor
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Verified',
                        data: [
                            @foreach($ver as $ve)
                            {{ $ve }},
                            @endforeach
                        ],
                        backgroundColor: [
                            @for($i=1; $i<=12; $i++)
                                'rgb(0, 166, 90)',
                            @endfor
                        ],
                        borderColor: [
                            @for($i=1; $i<=12; $i++)
                                'rgb(0, 166, 90)',
                            @endfor
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
    </script>
@endsection
