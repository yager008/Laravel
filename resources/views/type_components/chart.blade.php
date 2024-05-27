{{--<div class="chart-container" style="position: relative; height:40vh; width:80vw">--}}
{{--    <canvas id="myChart"></canvas>--}}
{{--</div>--}}

<div class="container-fluid">
    <div class="chart-container" style="position: relative; height: 40vh;">
        <canvas id="myChart" style="width: 430vh; height: 100vh"></canvas>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Define chart data and options
        // const data = [
        //     { year: 10 , count: 11 },
        //     { year: 2011, count: 22 },
        //     { year: 2012, count: 13 },
        //     { year: 2013, count: 21 },
        //     { year: 2014, count: 29 },
        //     { year: 2015, count: 331 },
        //     { year: 2016, count: 21 },
        // ];
        // console.log(data);
        const dataphp = {!! json_encode($resultsArray) !!}; // Convert PHP array to JavaScript object
        console.log(dataphp);

        const myData = {
            //labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            labels: dataphp.map(row => row.updated_at),
            datasets: [{
                label: 'all typing results',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                hoverBackgroundColor: 'rgba(255, 99, 132, 0.4)',
                hoverBorderColor: 'rgba(255, 99, 132, 1)',
                data: dataphp.map(row => row.result)
            }]
        };

        const chartOptions = {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true,
                }
            }
        };
        // Call the createChart function
        createChart('myChart', myData, chartOptions);
    });
</script>
