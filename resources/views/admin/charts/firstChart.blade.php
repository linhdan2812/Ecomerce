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
            var dataChart = result.data;
            var dataArray = Object.entries(_.groupBy(dataChart, data => data.year));
            let dataYear = [];
            let dataYear2 = [];
            dataArray.forEach(element => {
                var dataAmount = _.sumBy(element[1], function(o) { return parseInt(o.vnp_Amount); });
                dataY = {
                        name: element[0],
                        y: dataAmount,
                        drilldown: element[0]
                    };
                dataYear.push(dataY);
                    
                var dataArray2 = Object.entries(_.groupBy(element[1], data2 => data2.month));
                dataArray2.forEach(entries => {
                    var dataAmount2 = _.sumBy(entries[1], function(o) { return parseInt(o.vnp_Amount); });
                    dataY2 = {
                        name: element[0],
                        id: element[0],
                        data: [
                                [
                                    'Tháng' + entries[0],
                                    dataAmount2
                                ]
                            ]
                        };
                        dataYear2.push(dataY2);
                    })
                });
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    align: 'left',
                    text: 'Biểu đồ doanh thu cửa hàng'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Doanh thu'
                    },
                    labels: {
                        format: '{value:,.f}'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:,.f} vnd'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [
                    {
                        name: 'Năm',
                        colorByPoint: true,
                        data: dataYear
                    }
                ],
                drilldown: {
                    breadcrumbs: {
                        position: {
                            align: 'right'
                        }
                    },
                    series: dataYear2
                }
            });
        });
    $('#searchlistOrderASC').click(function(){
        let url = "{{route('firstChart')}}"
        let from = $('#fromlistOrderASC').val()
        let to = $('#tolistOrderASC').val();
        $.get(url,{
            from: from,
            to: to
        }).done(function( result ) {
            var dataChart = result.data;
            var dataArray = Object.entries(_.groupBy(dataChart, data => data.year));
            let dataYear = [];
            let dataYear2 = [];
            dataArray.forEach(element => {
                var dataAmount = _.sumBy(element[1], function(o) { return parseInt(o.vnp_Amount); });
                dataY = {
                        name: element[0],
                        y: dataAmount,
                        drilldown: element[0]
                    };
                dataYear.push(dataY);
                    
                var dataArray2 = Object.entries(_.groupBy(element[1], data2 => data2.month));
                dataArray2.forEach(entries => {
                    var dataAmount2 = _.sumBy(entries[1], function(o) { return parseInt(o.vnp_Amount); });
                    dataY2 = {
                        name: element[0],
                        id: element[0],
                        data: [
                                [
                                    'Tháng' + entries[0],
                                    dataAmount2
                                ]
                            ]
                        };
                        dataYear2.push(dataY2);
                    })
                });
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    align: 'left',
                    text: 'Biểu đồ doanh thu cửa hàng'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Doanh thu'
                    },
                    labels: {
                        format: '{value:,.f}'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:,.f} vnd'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [
                    {
                        name: 'Năm',
                        colorByPoint: true,
                        data: dataYear
                    }
                ],
                drilldown: {
                    breadcrumbs: {
                        position: {
                            align: 'right'
                        }
                    },
                    series: dataYear2
                }
            });
        });
    });
</script>