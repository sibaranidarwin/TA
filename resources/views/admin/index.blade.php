@extends('layouts.admin')
@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
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
                                    <h3>{{ App\Models\Transaction::count() }}</h3>

                                    <p>Jumlah Pesanan</p>
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
                                    <h3>{{ App\Models\Article::count() }}</h3>

                                    <p>Jumlah Pembayaran</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{ route('article.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ Auth::user()->count() }}</h3>

                                    <p>Jumlah Pengunjung</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
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

                                    <p>Jumlah Event Wisata</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{ route('product.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3>Rp 3.600.000</h3>

                                    <p>Jumlah Pembayaran Tiket (Pertahun)</p>
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
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>Rp 2.600.000</h3>

                                    <p>Hasil Pembayaran Tiket (Perbulan)</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-stats-bars"></i>
                                </div>
                                <a href="{{ route('article.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3>Rp 600.000</h3>

                                    <p>Hasil Pembayaran Tiket (Perminggu)</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div id="jumlah"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                <div id="bulan"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                <div id="minggu"></div>
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
Highcharts.setOptions({
    lang: {
      thousandsSep: ' '
    },
    colors: [ '#779bd9','#2750a8']
  })
  Highcharts.chart('jumlah', {
      chart: {
          type: 'column',
          zoomType: 'y',
          //backgroundColor:"#FBFAE4"
      },
      title: {
          text: 'Penjualan Tiket Pertahun'
      },
      xAxis: {
          categories: [
              'January',
              'February',
              'Maret',
              'April',
              'May',
              'June',
              'July',
              'Agustus',
              'September',
              'Oktober',
              'November',
              'December'
          ],
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
                text: 'Total Penjualan Tiket Pertahun'
              }
      },
      tooltip: {
              headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:,.0f}M</b></td></tr>' + 'Count: <b>{point.count:,.1f}</b><br/>',
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
          data: [56],
  
      }, {
          name: 'Tiket Event Wisata',
          data: [80]
  
      }]
  });
  </script>

<script>
    Highcharts.setOptions({
        lang: {
          thousandsSep: ' '
        },
        colors: [ '#779bd9','#2750a8']
      })
      Highcharts.chart('bulan', {
          chart: {
              type: 'column',
              zoomType: 'y',
              //backgroundColor:"#FBFAE4"
          },
          title: {
              text: 'Penjualan Tiket Perbulan'
          },
          xAxis: {
            categories: [
                  '2023',
              ],
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                text: 'Total Penjualan Tiket Perbulan'
              }
          },
          tooltip: {
                  headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                      '<td style="padding:0"><b>{point.y:,.0f}M</b></td></tr>' + 'Count: <b>{point.count:,.1f}</b><br/>',
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
              data: [12],
      
          }, {
              name: 'Tiket Event Wisata',
              data: [15],
      
          }]
      });
</script>

<script>
    Highcharts.setOptions({
        lang: {
          thousandsSep: ' '
        },
        colors: [ '#779bd9','#2750a8']
      })
      Highcharts.chart('minggu', {
          chart: {
              type: 'column',
              zoomType: 'y',
              //backgroundColor:"#FBFAE4"
          },
          title: {
              text: 'Penjualan Tiket Perminggu'
          },
          xAxis: {
            categories: [
                  '2023',
              ],
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                text: 'Total Penjualan Tiket Perminggu'
              }
          },
          tooltip: {
                  headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                      '<td style="padding:0"><b>{point.y:,.0f}M</b></td></tr>' + 'Count: <b>{point.count:,.1f}</b><br/>',
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
              data: [12],
      
          }, {
              name: 'Tiket Event Wisata',
              data: [15],
      
          }]
      });
</script>
@endsection
