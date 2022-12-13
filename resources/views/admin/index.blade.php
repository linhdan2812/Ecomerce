@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div style="width:105%;">
                        <canvas id="canvas"></canvas>
                    </div>
                    <br>
                    <br>
                    <button id="replaceDataObject" class="btn btn-primary">Doanh số bán hàng theo tháng</button>
                    <button id="replaceDataObjectYear" class="btn btn-primary">Doanh số bán hàng theo năm</button>
                </div>
                <div class="col-md-6">
                    <div style="width:105%;">
                        <canvas id="myChart"></canvas>
                    </div>
                    <br>
                    <br>
                    <button id="replaceMoneyObject" class="btn btn-primary">Doanh thu bán hàng theo tháng</button>
                    <button id="replaceMoneyObjectYear" class="btn btn-primary">Doanh thu bán hàng theo năm</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            green: 'rgb(75, 192, 192)',
            yellow: 'rgb(255, 205, 86)',
        };
        var config = {
            type: 'bar',
            data: {
                labels: {{ Js::from($labels) }},
                datasets: [{
                    label: "Doanh số bán hàng theo tháng",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: {{ Js::from($data) }},
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };
        var config2 = {
            type: 'bar',
            data: {
                labels: {{ Js::from($moneyLabels) }},
                datasets: [{
                    label: "Doanh thu bán hàng theo tháng",
                    backgroundColor: window.chartColors.green,
                    borderColor: window.chartColors.green,
                    data: {{ Js::from($moneyData) }},
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };
        document.getElementById('replaceMoneyObject').addEventListener('click', function() {
            var newDataObjectYear = {
                labels: {{ Js::from($moneyLabels2) }},
                datasets: [{
                    label: "Doanh thu bán hàng theo tháng",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: window.chartColors.yellow,
                    borderColor: window.chartColors.yellow,
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgb(255, 99, 132)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgb(255, 99, 132)",
                    pointHoverBorderColor: "rgb(255, 99, 132)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: {{ Js::from($moneyData2) }},
                    spanGaps: false,
                }]
            };
            // the newDataObject does not override myLine.data object: why???
            myLine2.data = newDataObjectYear;
            // ... but updating a single value works: why??? 
            myLine2.data.datasets[0].data[0] = {{ Js::from($moneyData2) }}[0];
            window.myLine2.update();
        });
        document.getElementById('replaceMoneyObjectYear').addEventListener('click', function() {
            var newDataObject = {
                labels: {{ Js::from($moneyLabels) }},
                datasets: [{
                    label: "Doanh thu bán hàng theo ngày",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: window.chartColors.green,
                    borderColor: window.chartColors.green,
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: {{ Js::from($moneyData) }},
                    spanGaps: false,
                }]
            };
            // the newDataObject does not override myLine.data object: why???
            myLine2.data = newDataObject;
            // ... but updating a single value works: why??? 
            myLine2.data.datasets[0].data[0] = {{ Js::from($moneyData) }}[0];
            window.myLine2.update();
        });
        document.getElementById('replaceDataObjectYear').addEventListener('click', function() {
            var newDataObjectYear = {
                labels: {{ Js::from($labels) }},
                datasets: [{
                    label: "Doanh số bán hàng theo tháng",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgb(255, 99, 132)",
                    borderColor: "rgb(255, 99, 132)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgb(255, 99, 132)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgb(255, 99, 132)",
                    pointHoverBorderColor: "rgb(255, 99, 132)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: {{ Js::from($data) }},
                    spanGaps: false,
                }]
            };
            // the newDataObject does not override myLine.data object: why???
            myLine.data = newDataObjectYear;
            // ... but updating a single value works: why??? 
            myLine.data.datasets[0].data[0] = {{ Js::from($data) }}[0];
            window.myLine.update();
        });
        document.getElementById('replaceDataObject').addEventListener('click', function() {
            var newDataObject = {
                labels: {{ Js::from($labels2) }},
                datasets: [{
                    label: "Doanh số bán hàng theo ngày",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: {{ Js::from($data2) }},
                    spanGaps: false,
                }]
            };
            // the newDataObject does not override myLine.data object: why???
            myLine.data = newDataObject;
            // ... but updating a single value works: why??? 
            myLine.data.datasets[0].data[0] = {{ Js::from($data2) }}[0];
            window.myLine.update();
        });
        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = getNewChart(ctx, config);
            var ctx2 = document.getElementById("myChart").getContext("2d");
            window.myLine2 = getNewChart(ctx2, config2);
        };

        function getNewChart(canvas, config) {
            return new Chart(canvas, config);
        }
    </script>
@endsection
