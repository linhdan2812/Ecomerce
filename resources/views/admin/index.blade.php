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
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Doanh thu bán hàng</h4>
                        </div>
                        <div class="card-body ">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // new Chart("myChart3", {
        // type: "bar",
        // data: {
        //     labels: {{ Js::from($moneyLabels) }},
        //     datasets: [{
        //     backgroundColor: "red",
        //     data: {{ Js::from($moneyData) }}
        //     }]
        // },
        // options: {
        //     legend: {display: false},
        //     scales: {
        //     yAxes: [{
        //         ticks: {
        //         beginAtZero: true
        //         }
        //     }],
        //     }
        // }
        // });

        // const data = {
        //     labels: {{ Js::from($labels) }},
        //     datasets: [{
        //     label: 'Doanh số bán hàng',
        //     backgroundColor: 'rgb(255, 99, 132)',
        //     borderColor: 'rgb(255, 99, 132)',
        //     data: {{ Js::from($data) }},
        //     }]
        // };

        // const config = {
        //     type: 'line',
        //     data: data,
        //     options: {}
        // };

        // const myChart = new Chart(
        //     document.getElementById('myChart'),
        //     config
        // );
        // // logic to get new data
        // var getData = function() {
        //     var e = document.getElementById("brgyselector");
        //     var strUser = e.value;
        //     $.ajax({
        //         url: 'url_to_controller_action',
        //         success: function(data) {
        //         // process your data to pull out what you plan to use to update the chart
        //         // e.g. new label and a new data point

        //         // you can use loop through response data
        //         // add new label and data point to chart's underlying data structures
        //         myChart.data.labels.push("Label");
        //         myChart.data.datasets[0].data.push('set point');

        //         // re-render the chart
        //         myChart.update();
        //         }
        //     });
        // };

        // const brgy = document.getElementById('brgyselector');
        // brgy.addEventListener('change', getData);

        window.chartColors = {
            red: 'rgb(255, 99, 132)',
        };
        var config = {
            type: 'line',
            data: {
                labels: {{ Js::from($labels) }},
                datasets: [{
                    label: "Doanh số bán hàng theo năm",
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

        document.getElementById('replaceDataObjectYear').addEventListener('click', function() {
            var newDataObjectYear = {
                labels: {{ Js::from($labels) }},
                datasets: [{
                    label: "Doanh số bán hàng theo năm",
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
                    label: "Doanh số bán hàng theo tháng",
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
        };

        function getNewChart(canvas, config) {
            return new Chart(canvas, config);
        }
    </script>
@endsection
