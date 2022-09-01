@extends('admin/include/app_admin')
@section('title','dashboard')

@section('content')
    <div class="container text-center" style="margin-bottom:70px">
        <h1>---- Welcome {{ Auth::user()->name }} ({{  Auth::user()->level  }}) ----</h1>
    </div>
<div class="container">
  <div class="row d-flex justify-content-center align-items-center" style="min-height: 100%">
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="d-flex justify-content-end mr-3" >
              <small class="mt-2 mr-2">bulan</small>
              <form action="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}" method="post">
                @csrf
                <select name="bulan" id="" class="custom-select text-center" onchange="if(this.value !=0 ) {this.form.submit()}">
                  @php
                      $m = date('n');
                  @endphp
                      <option value="1" {{ $bulan != null ? ($bulan == 1 ? 'selected' : '') : ($m == 1 ? 'selected' : '')}}>January</option>
                      <option value="2" {{ $bulan != null ? ($bulan == 2 ? 'selected' : '') : ($m == 2 ? 'selected' : '')}}>February</option>
                      <option value="3" {{ $bulan != null ? ($bulan == 3 ? 'selected' : '') : ($m == 3 ? 'selected' : '')}}>March</option>
                      <option value="4" {{ $bulan != null ? ($bulan == 4 ? 'selected' : '') : ($m == 4 ? 'selected' : '')}}>April</option>
                      <option value="5" {{ $bulan != null ? ($bulan == 5 ? 'selected' : '') : ($m == 5 ? 'selected' : '')}}>May</option>
                      <option value="6" {{ $bulan != null ? ($bulan == 6 ? 'selected' : '') : ($m == 6 ? 'selected' : '')}}>June</option>
                      <option value="7" {{ $bulan != null ? ($bulan == 7 ? 'selected' : '') : ($m == 7 ? 'selected' : '')}}>July</option>
                      <option value="8" {{ $bulan != null ? ($bulan == 8 ? 'selected' : '') : ($m == 8 ? 'selected' : '')}}>August</option>
                      <option value="9" {{ $bulan != null ? ($bulan == 9 ? 'selected' : '') : ($m == 9 ? 'selected' : '')}}>September</option>
                      <option value="10" {{ $bulan != null ? ($bulan == 10 ? 'selected' : '') : ($m == 10 ? 'selected' : '') }}>October</option>
                      <option value="11" {{ $bulan != null ? ($bulan == 11 ? 'selected' : '') : ($m == 11 ? 'selected' : '') }}>November</option>
                      <option value="12" {{ $bulan != null ? ($bulan == 12 ? 'selected' : '') : ($m == 12? 'selected' : '') }}>December</option>
                </select>  
              </form>
            </div>
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        @php
                            $month = array( 1 => 'January',2 => 'February',3 => 'March',4 => 'April',5 => 'May',6 => 'June',
                                            7 => 'July',8 => 'August',9 => 'September',10 => 'October',11 => 'November',12 => 'December',
                                          );
                        @endphp

                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Pendapatan Bulanan ( {{ $month[$bulan != null ? $bulan : $m] }} )</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ number_format($bulanan) }}</div>

                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Pendapatan Admin </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ number_format($adminbulanan) }}</div>

                      </div>
                      <div class="col-auto">
                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        <!-- Earnings (Year) Card Example -->
      <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="d-flex justify-content-end mr-3" >
            <small class="mt-2 mr-2">Tahun</small>
            <form action="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}" method="post">
              @csrf
              <select name="tahun" id="" class="custom-select" onchange="if(this.value !=0 ) {this.form.submit()}">
                  @php
                      $y = '20'.date('y');
                  @endphp
                      <option value="2015" {{ $tahun !=null ?($tahun == 2015 ? 'selected' : '') : ($y == 2015 ? 'selected' : '') }}>2015</option>
                      <option value="2016" {{ $tahun !=null ?($tahun == 2016 ? 'selected' : '') : ($y == 2016 ? 'selected' : '') }}>2016</option>
                      <option value="2017" {{ $tahun !=null ?($tahun == 2017 ? 'selected' : '') : ($y == 2017 ? 'selected' : '') }}>2017</option>
                      <option value="2018" {{ $tahun !=null ?($tahun == 2018 ? 'selected' : '') : ($y == 2018 ? 'selected' : '') }}>2018</option>
                      <option value="2019" {{ $tahun !=null ?($tahun == 2019 ? 'selected' : '') : ($y == 2019 ? 'selected' : '') }}>2019</option>
                      <option value="2020" {{ $tahun !=null ?($tahun == 2020 ? 'selected' : '') : ($y == 2020 ? 'selected' : '') }}>2020</option>
                      <option value="2021" {{ $tahun !=null ?($tahun == 2021 ? 'selected' : '') : ($y == 2021 ? 'selected' : '') }}>2021</option>
                      <option value="2022" {{ $tahun !=null ?($tahun == 2022 ? 'selected' : '') : ($y == 2022 ? 'selected' : '') }}>2022</option>
                      <option value="2023" {{ $tahun !=null ?($tahun == 2023 ? 'selected' : '') : ($y == 2023 ? 'selected' : '') }}>2023</option>
                      <option value="2024" {{ $tahun !=null ?($tahun == 2024 ? 'selected' : '') : ($y == 2024 ? 'selected' : '') }}>2024</option>
                      <option value="2025" {{ $tahun !=null ?($tahun == 2025 ? 'selected' : '') : ($y == 2025 ? 'selected' : '') }}>2025</option>
                      <option value="2026" {{ $tahun !=null ?($tahun == 2026 ? 'selected' : '') : ($y == 2026 ? 'selected' : '') }}>2026</option>
                      <option value="2027" {{ $tahun !=null ?($tahun == 2027 ? 'selected' : '') : ($y == 2027 ? 'selected' : '') }}>2027</option>
                      <option value="2028" {{ $tahun !=null ?($tahun == 2028 ? 'selected' : '') : ($y == 2028 ? 'selected' : '') }}>2028</option>
                      <option value="2029" {{ $tahun !=null ?($tahun == 2029 ? 'selected' : '') : ($y == 2029 ? 'selected' : '') }}>2029</option>
                      <option value="2030" {{ $tahun !=null ?($tahun == 2030 ? 'selected' : '') : ($y == 2030 ? 'selected' : '') }}>2030</option>
                      <option value="2031" {{ $tahun !=null ?($tahun == 2031 ? 'selected' : '') : ($y == 2031 ? 'selected' : '') }}>2031</option>
                      <option value="2032" {{ $tahun !=null ?($tahun == 2032 ? 'selected' : '') : ($y == 2032 ? 'selected' : '') }}>2032</option>
                      <option value="2033" {{ $tahun !=null ?($tahun == 2033 ? 'selected' : '') : ($y == 2033 ? 'selected' : '') }}>2033</option>
                      <option value="2034" {{ $tahun !=null ?($tahun == 2034 ? 'selected' : '') : ($y == 2034 ? 'selected' : '') }}>2034</option>
                      <option value="2035" {{ $tahun !=null ?($tahun == 2035 ? 'selected' : '') : ($y == 2035 ? 'selected' : '') }}>2035</option>
              </select>
            </form>
          </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pendapatan Pertahun ({{ $tahun != null ? $tahun : $y }})</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ number_format($tahunan) }}</div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pendapatan Admin ({{$tahun != null ? $tahun : $y  }})</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ number_format($admintahunan) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>



<!-- Page level plugins -->
<script src="{{ asset('sb-admin') }}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example  
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [4215, 5312, 6251, 7841, 9821, 14984, 1234, 15342, 6644, 3333, 45664, 12364],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});


</script>
@endsection
