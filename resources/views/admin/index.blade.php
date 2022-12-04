@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Doanh thu bán hàng</h4>
                    </div>
                    <div class="card-body ">
                        <canvas id="myChart3" style="width:100%;max-width:600px;height:505px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Doanh số bán hàng</h4>
                    </div>
                    <div class="card-body ">
                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">2017 Sales</h4>
                        <p class="card-category">All products including Taxes</p>
                    </div>
                    <div class="card-body ">
                        <div id="chartActivity" class="ct-chart"></div>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Tesla Model S
                            <i class="fa fa-circle text-danger"></i> BMW 5 Series
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-check"></i> Data information certified
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Tỷ trọng bán hàng trong tháng</h4>
                    </div>
                    <div class="card-body ">
                        <canvas id="myChart2" style="width:100%;max-width:500px;height:505px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart("myChart3", {
    type: "bar",
    data: {
        labels: {{ Js::from($moneyLabels) }},
        datasets: [{
        backgroundColor: "red",
        data: {{ Js::from($moneyData) }}
        }]
    },
    options: {
        legend: {display: false},
        scales: {
        yAxes: [{
            ticks: {
            beginAtZero: true
            }
        }],
        }
    }
    });

    const data = {
        labels: {{ Js::from($labels) }},
        datasets: [{
        label: 'Doanh số bán hàng',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: {{ Js::from($data) }},
        }]
    };
  
    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors2 = [
    "#b91d47",
    "#00aba9",
    "#2b5797",
    "#e8c3b9",
    "#1e7145"
    ];

    new Chart("myChart2", {
    type: "pie",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors2,
        data: yValues
        }]
    },
    options: {
        title: {
        display: true,
        }
    }
    });
</script>
@endsection