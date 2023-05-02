@extends('layouts.admin')
@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
<style>
    .highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;
}

#container {
  height: 400px;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
</style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-7">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div style="float: right;">
                        <form action="{{ route('filterdash') }}" class="form-inline" method="GET">
                        <select class="form-control form-control-sm form-select col-5-half" name="month">
                            <option value="">Choose Month</option>
                                    <option value='1'>January</option>
                                    <option value="2">February</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                        </select>
                        &nbsp;
                        <select class="form-control form-control-sm form-select col-4-half" name="yer">
                            <option value="">Choose Year</option>
                            <option value='2018'>2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>       
                        </select>
                        &nbsp;
                        <button class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure?')" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        </div>
                        <div class="col-sm-2">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                </div><!-- /.row -->
                
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        
        <!-- Main content -->
        @if (Auth::user()->role == 'admin')
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ App\Models\TransactionDetail::count() }}</h3>

                                    <p>Jumlah Pesanan Tiket</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('order.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ App\Models\Transaction::count() }}</h3>

                                    <p>Jumlah Pembayaran Tiket</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{ route('pembayaran.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ Auth::user()->count() }}</h3>

                                    <p>Jumlah Pengunjung Wisata</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="{{ route('userr.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ App\Models\Product::count() }}</h3>

                                    <p>Jumlah Tiket Wisata</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{ route('product.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3>Rp {{ number_format($total_tahun, 0, ',', '.') }}</h3>

                                    <p>Penjualan Tiket Tahun {{ now()->format('Y') }}</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-stats-bars"></i>
                                </div>
                                <div id="tahun">

                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>Rp {{ number_format($total_bulan, 0, ',', '.') }}</h3>
                                    <p>Penjualan Tiket Bulan {{ now()->format('F') }}</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-stats-bars"></i>
                                </div>
                                <div id="bulan">

                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3>Rp {{ number_format($total_minggu, 0, ',', '.') }}</h3>
                                    <p>Penjualan Tiket Tanggal {{$startweek}} sampai {{$endweek}}</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>

                                <div id="minggu">

                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    {{-- <hr style="height:2px;border-width:0;color:gray;background-color:gray"> --}}

                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div id="jumlah"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
        @elseif (Auth::user()->role == 'penjual')
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ App\Models\TransactionDetail::count() }}</h3>

                                <p>Jumlah Pesanan Tiket</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('order.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ App\Models\Transaction::count() }}</h3>

                                <p>Jumlah Pembayaran Tiket</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('pembayaran.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ Auth::user()->count() }}</h3>

                                <p>Jumlah Pengunjung Wisata</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ App\Models\Product::count() }}</h3>

                                <p>Jumlah Tiket Wisata</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('product.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <h3>Rp {{ number_format($total_tahun, 0, ',', '.') }}</h3>

                                <p>Penjualan Tiket Tahun {{ now()->format('Y') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion-stats-bars"></i>
                            </div>
                            <div id="tahun">

                            </div>
                            {{-- <a href="{{ route('order.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>Rp </h3>
                                <p>Penjualan Tiket Bulan {{ now()->format('F') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion-stats-bars"></i>
                            </div>
                            <div id="bulan">

                            </div>
                            {{-- <a href="{{ route('article.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>Rp {{ number_format($total_minggu, 0, ',', '.') }}</h3>
                                <p>Penjualan Tiket Tanggal {{$startweek}} sampai {{$endweek}}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <div id="minggu">

                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
          
                <!-- /.row -->

                {{-- <hr style="height:2px;border-width:0;color:gray;background-color:gray"> --}}

                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="jumlah"></div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @else
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Halo Selamat Datang, <span class="text-bold">{{ Auth::user()->name }}!</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        
        <!-- /.content -->
    </div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
Highcharts.chart('jumlah', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Grafik Total Pembayaran Tiket Wisata di Kaldera Toba Nomadic Escape {{ now()->format('Y') }}'
    },
    xAxis: {
      categories: [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Jumlah Penjualan (Rp)'
      }
    },
    tooltip: {
                  headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                      '<td style="padding:0"><b>Rp {point.y:,.0f}</b></td></tr>' + '<b>{point.count:,.1f}</b><br/>',
                  footerFormat: '</table>',
                  shared: true,
                  useHTML: true
              },
    plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0,
                  dataLabels: {
                                enabled: true,
                                format: '{point.y:,.0f}'
                            }
              }
          },
    series: [{
      name: 'Tiket Masuk Wisata',
      data: [0,0,0,{{($total_bulan_wisata4)}}, {{($total_bulan_wisata5)}}],
  
    }, {
      name: 'Tiket Event Wisata',
      data: [0,0,0,{{($total_bulan_event4)}}, {{($total_bulan_event5)}}],
  
    }]
  });
</script>

<script>
   Highcharts.chart('tahun', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '',
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
        valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: Rp {point.y:.0f}'
        }
        }
    },
    series: [{
        name: '',
        colorByPoint: true,
        data: [{
        name: 'Tiket Masuk Wisata',
        y: {{($total_tahun_wisata)}},
        sliced: true,
        selected: true
        }, {
        name: 'Tiket Event Wisata',
        y: {{($total_tahun_event)}},
        }]
    }]
    });
    </script>

<script>
    Highcharts.chart('bulan', {
     chart: {
         plotBackgroundColor: null,
         plotBorderWidth: null,
         plotShadow: false,
         type: 'pie'
     },
     title: {
         text: '',
     },
     tooltip: {
         pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
     },
     accessibility: {
         point: {
         valueSuffix: '%'
         }
     },
     plotOptions: {
         pie: {
         allowPointSelect: true,
         cursor: 'pointer',
         dataLabels: {
             enabled: true,
             format: '<b>{point.name}</b>: Rp {point.y:.0f}'
         }
         }
     },
     series: [{
         name: '',
         colorByPoint: true,
         data: [{
         name: 'Tiket Masuk Wisata',
         y: {{($total_bulan_wisata5)}},
         sliced: true,
         selected: true
         }, {
         name: 'Tiket Event Wisata',
         y: {{($total_bulan_event5)}},
         }]
     }]
     });
</script>

<script>
   Highcharts.chart('minggu', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '',
    },
    tooltip: {
        pointFormat: '{series.name}: <b>point.y:.1f</b>'
    },
    accessibility: {
        point: {
        valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: Rp {point.y:.3f}'
        }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
        name: 'Tiket Masuk Wisata',
        y: {{($total_minggu_wisata)}},
        sliced: true,
        selected: true
        }, {
        name: 'Tiket Event Wisata',
        y: {{($total_minggu_event)}},
        }]
    }]
    });
</script>


@endsection
