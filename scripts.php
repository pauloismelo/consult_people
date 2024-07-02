<!-- JAVASCRIPT -->
<script src="assets\libs\jquery\jquery.min.js"></script>
<script src="assets\libs\bootstrap\js\bootstrap.bundle.min.js"></script>
<script src="assets\libs\metismenu\metisMenu.min.js"></script>
<script src="assets\libs\simplebar\simplebar.min.js"></script>
<script src="assets\libs\node-waves\waves.min.js"></script>
<script src="assets\libs\waypoints\lib\jquery.waypoints.min.js"></script>
<script src="assets\libs\jquery.counterup\jquery.counterup.min.js"></script>

<!-- apexcharts -->
<script src="assets\libs\apexcharts\apexcharts.min.js"></script>

<!-- script src="assets\js\pages\dashboard.init.js"></script> foi substituido pelo codigo puro abaixo: -->

<script>

    function getChartColorsArray(r){if(null!==document.getElementById(r)){var t=document.getElementById(r).getAttribute("data-colors");if(t)return(t=JSON.parse(t)).map(function(r){var t=r.replace(" ","");if(-1===t.indexOf(",")){var e=getComputedStyle(document.documentElement).getPropertyValue(t);return e||t}var a=r.split(",");return 2!=a.length?t:"rgba("+getComputedStyle(document.documentElement).getPropertyValue(a[0])+","+a[1]+")"})}}var options1,chart1,BarchartTotalReveueColors=getChartColorsArray("total-revenue-chart");BarchartTotalReveueColors&&(options1={series:[{data:[25,66,41,89,63,25,44,20,36,40,54]}],fill:{colors:BarchartTotalReveueColors},chart:{type:"bar",width:70,height:40,sparkline:{enabled:!0}},plotOptions:{bar:{columnWidth:"50%"}},labels:[1,2,3,4,5,6,7,8,9,10,11],xaxis:{crosshairs:{width:1}},tooltip:{fixed:{enabled:!1},x:{show:!1},y:{title:{formatter:function(r){return""}}},marker:{show:!1}}},(chart1=new ApexCharts(document.querySelector("#total-revenue-chart"),options1)).render());var RadialchartOrdersChartColors=getChartColorsArray("orders-chart");RadialchartOrdersChartColors&&(options={fill:{colors:RadialchartOrdersChartColors},series:[70],chart:{type:"radialBar",width:45,height:45,sparkline:{enabled:!0}},dataLabels:{enabled:!1},plotOptions:{radialBar:{hollow:{margin:0,size:"60%"},track:{margin:0},dataLabels:{show:!1}}}},(chart=new ApexCharts(document.querySelector("#orders-chart"),options)).render());var RadialchartCustomersColors=getChartColorsArray("customers-chart");RadialchartCustomersColors&&(options={fill:{colors:RadialchartCustomersColors},series:[55],chart:{type:"radialBar",width:45,height:45,sparkline:{enabled:!0}},dataLabels:{enabled:!1},plotOptions:{radialBar:{hollow:{margin:0,size:"60%"},track:{margin:0},dataLabels:{show:!1}}}},(chart=new ApexCharts(document.querySelector("#customers-chart"),options)).render());var options2,chart2,BarchartGrowthColors=getChartColorsArray("growth-chart");BarchartGrowthColors&&(options2={series:[{data:[25,66,41,89,63,25,44,12,36,9,54]}],fill:{colors:BarchartGrowthColors},chart:{type:"bar",width:70,height:40,sparkline:{enabled:!0}},plotOptions:{bar:{columnWidth:"50%"}},labels:[1,2,3,4,5,6,7,8,9,10,11],xaxis:{crosshairs:{width:1}},tooltip:{fixed:{enabled:!1},x:{show:!1},y:{title:{formatter:function(r){return""}}},marker:{show:!1}}},(chart2=new ApexCharts(document.querySelector("#growth-chart"),options2)).render());var options,chart,LinechartsalesColors=getChartColorsArray("sales-analytics-chart");LinechartsalesColors&&(options={chart:{
        height:343,
        type:"line",
        stacked:!1,
        toolbar:{
            show:!1}
        }
        ,stroke:{
            width:[0,2,4],
            curve:"smooth"
        },
        plotOptions:{
            bar:{columnWidth:"30%"}
        },
        colors:LinechartsalesColors,
        series:[
            {name:"Analises",type:"column",data:[<? echo $dados;?>]}
            
            ],
        fill:{
            opacity:[.85,.25,1],
            gradient:{
                inverseColors:!1,
                shade:"light",
                type:"vertical",
                opacityFrom:.85,
                opacityTo:.55,
                stops:[0,100,100,100]
                }
            },
        labels:[<? echo $meses;?>],
        markers:{size:0},
        xaxis:{type:"datetime"},
        yaxis:{title:{text:"registros"}},
        tooltip:{
            shared:!0,
            intersect:!1,
            y:{formatter:function(r){return void 0!==r?r.toFixed(0)+" registros":r}}
        },
        grid:{borderColor:"#f1f1f1"}
        },
        (chart=new ApexCharts(document.querySelector("#sales-analytics-chart"),options)).render());
</script>

<!-- App js -->
<script src="assets\js\app.js"></script>
