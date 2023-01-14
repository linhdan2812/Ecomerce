<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
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
<div class="col-md-6">
    <figure class="highcharts-figure">
        <div class="form-group">
            <div class="row">
            <div class="col-sm-4">
                <label for="">Từ:</label>
                <input class="date form-control" id="fromlistOrderASC" width="50%" value="" type="text">
            </div>
            <div class="col-sm-4">
                <label for="">Tới:</label>
                <input class="date form-control" id="tolistOrderASC" width="50%" value="" type="text">
            </div>
            <div class="col-sm-4">
                <button class="btn btn-success" id="searchlistOrderASC">Tìm kiếm</button>
            </div>
            </div>
        </div>
        <div id="container"></div>
    </figure>
</div>
<script>
    $('#date').datepicker({  
    format: 'mm-dd-yyyy'
    });
    let url = "{{route('firstChart')}}"
    $.get(url,{
        }).done(function( result ) {
            var dataChart = result.data
            dataChart.forEach(element => {
                if( element.year == dataChart[0]['year']){
                    console.log(1);
                }
            });
            Highcharts.chart('container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Tổng hợp sản phẩm bán chạy trong 1 thời gian cố định'
                },
                xAxis: {
                    categories: [1,2,3,4,5,6,7,8,9,10,11,12],
                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Reggane',
                    data: [16.0, 18.2, 23.1, 27.9, 32.2, 36.4, 39.8, 38.4, 35.5, 29.2,
                        22.0, 17.8]
                }, {
                    name: 'Tallinn',
                    data: [-2.9, -3.6, -0.6, 4.8, 10.2, 14.5, 17.6, 16.5, 12.0, 6.5,
                        2.0, -0.9]
                }]
            });
        });
    $('#search').click(function(){
        let url = "{{route('firstChart')}}"
        let from = $('#fromlistOrderASC').val()
        let to = $('#toListUserASC').val();
        $.get(url,{
            from: from,
            to: to
        }).done(function( result ) {
            var dataChart = {
            ...result.chart
            }
            // var xAxis = Object.assign({}, result.xAxis);
            // var yAxis = Object.assign({}, result.yAxis);

            // // dataChart.xAxis.labels.formatter = function() {
            // //   var value = xAxis[this.value];
            // //   return value !== 'undefined' ? value : this.value;
            // // }
            // dataChart.yAxis.labels.formatter = function() {
            // var value = yAxis[this.value];
            // return value !== 'undefined' ? value : this.value;
            // }
            // dataChart.tooltip.formatter = function() {
            // return  this.x;
            // }
            // new Highcharts.Chart(dataChart);
            Highcharts.chart('container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Monthly Average Temperature'
                },
                subtitle: {
                    text: 'Source: ' +
                        '<a href="https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature" ' +
                        'target="_blank">Wikipedia.com</a>'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Temperature (°C)'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Reggane',
                    data: [16.0, 18.2, 23.1, 27.9, 32.2, 36.4, 39.8, 38.4, 35.5, 29.2,
                        22.0, 17.8]
                }, {
                    name: 'Tallinn',
                    data: [-2.9, -3.6, -0.6, 4.8, 10.2, 14.5, 17.6, 16.5, 12.0, 6.5,
                        2.0, -0.9]
                }]
            });
        });
    });
</script>