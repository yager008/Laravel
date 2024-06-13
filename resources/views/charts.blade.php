<x-app-layout>
    <x-slot name="header">
        <div id="cal-heatmap"></div>
{{--        @include('type_components.chart')--}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const data = {
                    "1686355200": 9, // 2023/06/12
                    "1675641600": 2,  // 2023/02/06
                    "1675728000": 6,  // 2023/02/07
                    "1675814400": 8,  // 2023/02/08
                    "1675900800": 10, // 2023/02/09
                    "1675987200": 4,  // 2023/02/10
                    "1676073600": 2,  // 2023/02/11
                    "1676160000": 1,  // 2023/02/12
                    "1676246400": 5,  // 2023/02/13
                    "1676332800": 7,  // 2023/02/14
                    "1676419200": 3,  // 2023/02/15
                    "1676505600": 2,  // 2023/02/16
                    "1676592000": 6,  // 2023/02/17
                    "1676678400": 8,  // 2023/02/18
                    "1676764800": 10, // 2023/02/19
                    "1676851200": 4,  // 2023/02/20
                    "1676937600": 2,  // 2023/02/21
                    "1677024000": 1,  // 2023/02/22
                    "1677110400": 5,  // 2023/02/23
                    "1677196800": 7,  // 2023/02/24
                    "1677283200": 3,  // 2023/02/25
                    "1677369600": 2,  // 2023/02/26
                    "1677456000": 6,  // 2023/02/27
                    "1677542400": 8,  // 2023/02/28
                    "1677628800": 10, // 2023/03/01
                    "1677715200": 4,  // 2023/03/02
                    "1677801600": 2,  // 2023/03/03
                    "1677888000": 1,  // 2023/03/04
                    "1677974400": 5,  // 2023/03/05
                    "1678060800": 7,  // 2023/03/06
                    "1678147200": 3,  // 2023/03/07
                    "1678233600": 2,  // 2023/03/08
                    "1678320000": 6,  // 2023/03/09
                    "1678406400": 8,  // 2023/03/10
                    "1678492800": 10, // 2023/03/11
                    "1678579200": 4,  // 2023/03/12
                    "1678665600": 2,  // 2023/03/13
                    "1678752000": 1,  // 2023/03/14
                    "1678838400": 5,  // 2023/03/15
                    "1678924800": 7,  // 2023/03/16
                    "1679011200": 3,  // 2023/03/17
                    "1679097600": 2,  // 2023/03/18
                    "1679184000": 6,  // 2023/03/19
                    "1679270400": 8,  // 2023/03/20
                    "1679356800": 10, // 2023/03/21
                    "1679443200": 4,  // 2023/03/22
                    "1679529600": 2,  // 2023/03/23
                    "1679616000": 1,  // 2023/03/24
                    "1679702400": 5,  // 2023/03/25
                    "1679788800": 7,  // 2023/03/26
                    "1679875200": 3,  // 2023/03/27
                    "1679961600": 2,  // 2023/03/28
                    "1680048000": 6,  // 2023/03/29
                    "1680134400": 8,  // 2023/03/30
                    "1680220800": 10, // 2023/03/31
                };

                const cal = new CalHeatmap();
                cal.paint({
                    data: { source: data },
                    range: 12,
                    date: { start: new Date("2023-01-01") },
                    domain: { type: "month", label: { position: "top" } },
                    subDomain: { type: "day", label: { position: "center" }, width: 20, height: 20 },
                    legend: [1, 3, 5, 7, 9, 10],
                    itemSelector: "#cal-heatmap"
                });
                alert('hello world');
            });

        </script>
    </x-slot>
</x-app-layout>
