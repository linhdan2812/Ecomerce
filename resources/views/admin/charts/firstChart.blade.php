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
    // $('#date').datepicker({  
    // format: 'mm-dd-yyyy'
    // });
    // let url = "{{route('firstChart')}}"
    // $.get(url,{
    //     }).done(function( result ) {
    //         var dataChart = result.data
    //         dataChart.forEach(element => {
    //             if( element.year == dataChart[0]['year']){
    //                 console.log(1);
    //             }
    //         });
    //         Highcharts.chart('container', {
    //             chart: {
    //                 type: 'line'
    //             },
    //             title: {
    //                 text: 'Tổng hợp sản phẩm bán chạy trong 1 thời gian cố định'
    //             },
    //             xAxis: {
    //                 categories: [1,2,3,4,5,6,7,8,9,10,11,12],
    //             },
    //             yAxis: {
    //                 title: {
    //                     text: ''
    //                 }
    //             },
    //             plotOptions: {
    //                 line: {
    //                     dataLabels: {
    //                         enabled: true
    //                     },
    //                     enableMouseTracking: false
    //                 }
    //             },
    //             series: [{
    //                 name: 'Reggane',
    //                 data: [16.0, 18.2, 23.1, 27.9, 32.2, 36.4, 39.8, 38.4, 35.5, 29.2,
    //                     22.0, 17.8]
    //             }, {
    //                 name: 'Tallinn',
    //                 data: [-2.9, -3.6, -0.6, 4.8, 10.2, 14.5, 17.6, 16.5, 12.0, 6.5,
    //                     2.0, -0.9]
    //             }]
    //         });
    //     });
    // $('#search').click(function(){
    //     let url = "{{route('firstChart')}}"
    //     let from = $('#fromlistOrderASC').val()
    //     let to = $('#toListUserASC').val();
    //     $.get(url,{
    //         from: from,
    //         to: to
    //     }).done(function( result ) {
    //         var dataChart = {
    //         ...result.chart
    //         }
    //         Highcharts.chart('container', {
    //             chart: {
    //                 type: 'line'
    //             },
    //             title: {
    //                 text: 'Monthly Average Temperature'
    //             },
    //             subtitle: {
    //                 text: 'Source: ' +
    //                     '<a href="https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature" ' +
    //                     'target="_blank">Wikipedia.com</a>'
    //             },
    //             xAxis: {
    //                 categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    //             },
    //             yAxis: {
    //                 title: {
    //                     text: 'Temperature (°C)'
    //                 }
    //             },
    //             plotOptions: {
    //                 line: {
    //                     dataLabels: {
    //                         enabled: true
    //                     },
    //                     enableMouseTracking: false
    //                 }
    //             },
    //             series: [{
    //                 name: 'Reggane',
    //                 data: [16.0, 18.2, 23.1, 27.9, 32.2, 36.4, 39.8, 38.4, 35.5, 29.2,
    //                     22.0, 17.8]
    //             }, {
    //                 name: 'Tallinn',
    //                 data: [-2.9, -3.6, -0.6, 4.8, 10.2, 14.5, 17.6, 16.5, 12.0, 6.5,
    //                     2.0, -0.9]
    //             }]
    //         });
    //     });
    // });
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
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: 'Browsers',
            colorByPoint: true,
            data: [
                {
                    name: 'Chrome',
                    y: 63.06,
                    drilldown: 'Chrome'
                },
                {
                    name: 'Safari',
                    y: 19.84,
                    drilldown: 'Safari'
                },
                {
                    name: 'Firefox',
                    y: 4.18,
                    drilldown: 'Firefox'
                },
                {
                    name: 'Edge',
                    y: 4.12,
                    drilldown: 'Edge'
                },
                {
                    name: 'Opera',
                    y: 2.33,
                    drilldown: 'Opera'
                },
                {
                    name: 'Internet Explorer',
                    y: 0.45,
                    drilldown: 'Internet Explorer'
                },
                {
                    name: 'Other',
                    y: 1.582,
                    drilldown: null
                }
            ]
        }
    ],
    drilldown: {
        breadcrumbs: {
            position: {
                align: 'right'
            }
        },
        series: [
            {
                name: 'Chrome',
                id: 'Chrome',
                data: [
                    [
                        'v65.0',
                        0.1
                    ],
                    [
                        'v64.0',
                        1.3
                    ],
                    [
                        'v63.0',
                        53.02
                    ],
                    [
                        'v62.0',
                        1.4
                    ],
                    [
                        'v61.0',
                        0.88
                    ],
                    [
                        'v60.0',
                        0.56
                    ],
                    [
                        'v59.0',
                        0.45
                    ],
                    [
                        'v58.0',
                        0.49
                    ],
                    [
                        'v57.0',
                        0.32
                    ],
                    [
                        'v56.0',
                        0.29
                    ],
                    [
                        'v55.0',
                        0.79
                    ],
                    [
                        'v54.0',
                        0.18
                    ],
                    [
                        'v51.0',
                        0.13
                    ],
                    [
                        'v49.0',
                        2.16
                    ],
                    [
                        'v48.0',
                        0.13
                    ],
                    [
                        'v47.0',
                        0.11
                    ],
                    [
                        'v43.0',
                        0.17
                    ],
                    [
                        'v29.0',
                        0.26
                    ]
                ]
            },
            {
                name: 'Firefox',
                id: 'Firefox',
                data: [
                    [
                        'v58.0',
                        1.02
                    ],
                    [
                        'v57.0',
                        7.36
                    ],
                    [
                        'v56.0',
                        0.35
                    ],
                    [
                        'v55.0',
                        0.11
                    ],
                    [
                        'v54.0',
                        0.1
                    ],
                    [
                        'v52.0',
                        0.95
                    ],
                    [
                        'v51.0',
                        0.15
                    ],
                    [
                        'v50.0',
                        0.1
                    ],
                    [
                        'v48.0',
                        0.31
                    ],
                    [
                        'v47.0',
                        0.12
                    ]
                ]
            },
            {
                name: 'Internet Explorer',
                id: 'Internet Explorer',
                data: [
                    [
                        'v11.0',
                        6.2
                    ],
                    [
                        'v10.0',
                        0.29
                    ],
                    [
                        'v9.0',
                        0.27
                    ],
                    [
                        'v8.0',
                        0.47
                    ]
                ]
            },
            {
                name: 'Safari',
                id: 'Safari',
                data: [
                    [
                        'v11.0',
                        3.39
                    ],
                    [
                        'v10.1',
                        0.96
                    ],
                    [
                        'v10.0',
                        0.36
                    ],
                    [
                        'v9.1',
                        0.54
                    ],
                    [
                        'v9.0',
                        0.13
                    ],
                    [
                        'v5.1',
                        0.2
                    ]
                ]
            },
            {
                name: 'Edge',
                id: 'Edge',
                data: [
                    [
                        'v16',
                        2.6
                    ],
                    [
                        'v15',
                        0.92
                    ],
                    [
                        'v14',
                        0.4
                    ],
                    [
                        'v13',
                        0.1
                    ]
                ]
            },
            {
                name: 'Opera',
                id: 'Opera',
                data: [
                    [
                        'v50.0',
                        0.96
                    ],
                    [
                        'v49.0',
                        0.82
                    ],
                    [
                        'v12.1',
                        0.14
                    ]
                ]
            }
        ]
    }
});
</script>