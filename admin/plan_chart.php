<div id="line_chart"></div>

<script class='code-js' id='code-js'>

    var line_chart = document.getElementById('line_chart');
    var data = {
        categories: [
            'June',
            'July',
            'Aug',
            'Sep',
            'Oct',
            'Nov'
        ],
        series: [
            {
                name: 'Budget',
                data: [
                    5000,
                    3000,
                    6000,
                    3000,
                    6000,
                    4000
                ]
            }, {
                name: 'Income',
                data: [
                    8000,
                    1000,
                    7000,
                    2000,
                    5000,
                    3000
                ]
            }, {
                name: 'Outgo',
                data: [
                    900,
                    6000,
                    1000,
                    9000,
                    3000,
                    1000
                ]
            }
        ]
    };
    var options = {
        chart: {
            width: 800,
            height: 350,
            title: '월별 매출액 추이'
        },
        yAxis: {
            title: '매출액',
            pointOnColumn: true
        },
        xAxis: {
            title: '월'
        },
        series: {
            spline: true,
            showDot: false
        },
        legend: {
            align: 'bottom'
        },
        tooltip: {
            suffix: '￦'
        }
    };
    var theme = {
        series: {
            colors: [
                '#83b14e',
                '#458a3f',
                '#295ba0',
                '#2a4175',
                '#289399',
                '#289399',
                '#617178',
                '#8a9a9a',
                '#516f7d',
                '#dddddd'
            ]
        }
    };

    // For apply theme tui.chart.registerTheme('myTheme', theme); options.theme =
    // 'myTheme';

    tui
        .chart
        .lineChart(line_chart, data, options);
</script>