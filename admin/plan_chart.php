<div id="line_chart"></div>

<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/admin/dml_revenue.php";
?>

<script class='code-js' id='code-js'>
    
    let line_chart = document.getElementById('line_chart');
    let monthly_data_array = <?= json_encode($monthly_data_array)?>;
    const month_array= <?= count($month_array)?>;
    const total_products_count= <?= count($products_array)?>;
    const total_products = <?= json_encode($products_array)?>;

    // 데이터 가져오기
    let data = {
        categories: [
            <?php
                foreach($month_array as $month){
                    echo "'".$month."',";
                }
            ?>
        ],
        series: [

        ]
    };
    let options = {
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
    let theme = {
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

    for(let product_count = 0 ; product_count < total_products_count ; product_count++){ // 4번 실행 
        // series name 넣기

        //series 배열에 담을 객체를 만듦
        let revenue_data = {
            name : total_products[product_count],
            data : ''// 해당 상품에 대한 월별 매출 배열 
        };

        // 0, 6, 12, ..
        let start_idx = product_count * <?=$limit?>;

        data.series['name'] = total_products[product_count];
        // console.log(total_products[product_count], data.series[product_count]['name']);

        let data_array = new Array();
        for(let month_data = 0 ; month_data < <?=$limit?> ; month_data++){
            // series name에 따른 매출 데이터 넣기
            if(monthly_data_array[start_idx]['revenue']){
                data_array.push(monthly_data_array[start_idx]['revenue']);
            } else {
                data_array.push(0);
            }
            start_idx++;
        }
        
        revenue_data['data'] = data_array;

        //series 배열에 추가
        data.series.push(revenue_data);
    }


    // For apply theme tui.chart.registerTheme('myTheme', theme); options.theme =
    // 'myTheme';

    tui
        .chart
        .lineChart(line_chart, data, options);
</script>