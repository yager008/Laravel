<x-app-layout>
    <x-slot name="header">
        @include('type_components.chart')

        <div id="cal-heatmap"></div>
        <div id="cal-heatmap"></div>

        <script type="text/javascript">
            window.createSimpleHeatMap();
        </script>


{{--        <script>window.renderHeatMap()</script>--}}

    </x-slot>
</x-app-layout>

<html>
<head>
    <script type="text/javascript" src="https://d3js.org/d3.v3.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" />
</head>
<body>
<div class="flex items-center justify-center h-full w-full p-5 ">
    <div id="sample-heatmap"></div>
</div>
</body>
<script type="text/javascript">
    var datas = {
        "1530370800" : 1, // 2018/07/01
        "1530457200" : 3, // 2018/07/02
        "1533049200" : 5, // 2018/08/01
        "1533135600" : 7, // 2018/08/02
        "1546268400" : 10 // 2019/01/01
    };
    var cal = new CalHeatMap();
    var now = new Date();
    cal.init({
        itemSelector: '#sample-heatmap',
        domain: "month",
        data: datas,
        domainLabelFormat: '%Y-%m',
        start: new Date(now.getFullYear(), now.getMonth() - 11),
        cellSize: 10,
        range: 12,
        legend: [1, 3, 5, 7, 10],
    });
</script>
</html>
