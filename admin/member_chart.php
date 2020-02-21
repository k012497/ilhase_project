<!-- css -->
<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/admin/css/tui-chart.css"/>
<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/codemirror.css'/>
<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/lint.css'/>
<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/theme/neo.css'/>

<div id='map_chart'></div>
<div id='donut_chart'></div>

<!-- js -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/core-js/2.5.7/core.js'></script>
<script type='text/javascript' src='https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js'></script>
<script type='text/javascript' src='https://uicdn.toast.com/tui.chart/latest/raphael.js'></script>
<script src='http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/admin/js/tui-chart.js'></script>
<script src='http://<?= $_SERVER['HTTP_HOST'];?>/ilhase/admin/js/south-korea.js'></script>
<script class='code-js' id='code-js'>

    //  map chart : 수요가 많은 업종 ------------
    var map_chart = document.getElementById('map_chart');
    var area_data = {
        series: [
            {
                code: 'KR-SU',
                data: 0
            }, {
                code: 'KR-GW',
                data: 0
            }, {
                code: 'KR-GG',
                data: 0
            }, {
                code: 'KR-SG',
                data: 0
            }, {
                code: 'KR-NG',
                data: 0
            }, {
                code: 'KR-GJ',
                data: 0
            }, {
                code: 'KR-DG',
                data: 0
            }, {
                code: 'KR-DJ',
                data: 0
            }, {
                code: 'KR-BS',
                data: 0
            }, {
                code: 'KR-US',
                data: 0
            }, {
                code: 'KR-IC',
                data: 0
            }, {
                code: 'KR-SJ',
                data: 0
            }, {
                code: 'KR-NJ',
                data: 0
            }, {
                code: 'KR-JJ',
                data: 0
            }, {
                code: 'KR-SC',
                data: 0
            }, {
                code: 'KR-NC',
                data: 0
            }, {
                code: 'KR-SE',
                data: 0
            }
        ]
    };
    var map_options = {
        chart: {
            width: 400,
            height: 500,
            title: '지역별 노인 인력 수요'
        },
        map: 'south-korea',
        legend: {
            align: 'left'
        },
        tooltip: {
            suffix: '개'
        }
    };
    var map_theme = {
        series: {
            startColor: '#eeeeee',
            endColor: '#555555',
            overColor: '#5DB6DE'
        }
    };

    // For apply theme
    tui.chart.registerTheme('myTheme', map_theme);
    map_options.theme = 'myTheme';
    // tui.chart.mapChart(map_chart, area_data, map_options);

    //  donut chart : 수요가 많은 업종 ------------

    var donut_chart = document.getElementById('donut_chart');
    var industry_data = {
        categories: ['직종'],
        series: [
            {
                name: '생산/제조/단순노무',
                data: 0
            },
            {
                name: '경비/시설관리',
                data: 0
            },
            {
                name: '청소/미화',
                data: 0
            },
            {
                name: '도우미',
                data: 0
            },
            {
                name: '음식점/마트/주유',
                data: 0
            },
            {
                name: '배달/운전/택배',
                data: 0
            },
            {
                name: '안내/접수/상담',
                data: 0
            },
            {
                name: '공공/전문',
                data: 0
            },
            {
                name: '취업창업형(시장형)',
                data: 0
            }
        ]
    };
    var donut_options = {
        chart: {
            width: 400,
            height: 500,
            title: '직종별 수요 비율 (%)',
            format: function(value, chartType, areaType, valuetype, legendName) {
                if (areaType === 'makingSeriesLabel') { // formatting at series area
                    value = value + '개';
                }
            
                return value;
            }
        },
        series: {
            radiusRange: ['40%', '100%'],
            showLabel: false
        },
        tooltip: {
            suffix: '개'
        },
        legend: {
            align: 'bottom'
        }
    };

    var donut_theme = {
        series: {
            series: {
                colors: [
                    '#83b14e', '#458a3f', '#295ba0', '#2a4175', '#289399',
                    '#289399', '#617178', '#8a9a9a', '#516f7d', '#dddddd'
                ]
            },
            label: {
                color: '#fff',
                fontFamily: 'sans-serif'
            }
        }
    };

    // For apply theme

    tui.chart.registerTheme('myTheme', donut_theme);
    donut_options.theme = 'myTheme';
    // tui.chart.pieChart(donut_chart, industry_data, donut_options);

    function get_all_area_name(){
        $.get('dml_chart.php?mode=area_name', "", function (area_name_array) {
            name_array = JSON.parse(area_name_array);
            for(let i = 0 ; i < name_array.length ; i++){
                get_count_by_area(name_array[i], i);
            }
        });
    }
    
    function get_count_by_area(area, idx){
        $.get('dml_chart.php?mode=count_by_area', { area : area }, function(count){
            // area_data에 데이터 입력
            area_data.series[idx].data = parseInt(count);
            if(idx === 16){
                // 마지막 데이터 입력 후 차트 그리기 
                tui.chart.mapChart(map_chart, area_data, map_options);
            }
        });
    }
    
    function get_all_industry() {
        $.get('dml_chart.php?mode=industry_name', "", function (industry_name_array) {
            industry_array = JSON.parse(industry_name_array);
            for(let i = 0 ; i < industry_array.length ; i++){
                get_count_by_industry(industry_array[i], i);
            }
        });
    }

    function get_count_by_industry(industry, idx) {
        $.get('dml_chart.php?mode=count_by_industry', { industry : industry }, function(count){
            // area_data에 데이터 입력
            industry_data.series[idx].data = parseInt(count);
            // console.log(industry, count);
            if(idx === 8){
                // 마지막 데이터 입력 후 차트 그리기 
                console.log('draw donut with', industry_data.series[idx].data);
                tui.chart.pieChart(donut_chart, industry_data, donut_options);
            }
        });
    }

    function init_chart(){
        console.log('init_map 5');

        get_all_area_name();
        get_all_industry();
    }

    init_chart();
</script>