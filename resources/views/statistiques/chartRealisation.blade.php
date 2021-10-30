@extends('general-layout')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

 <div class="the-chart col-md-12 row shadow-sm" style="margin:2px">
    <div class="col-md-12">
                <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Réalisations</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
    </div>
    <!-- /.card -->
</div>
 <!-- script -->
<script>
var year = <?php echo $year; ?>;
    var realisation = <?php echo $realisation; ?>;
    var barChartData = {
        labels: year,
        datasets: [{
            label: 'Realisation',
            backgroundColor: "green",
            data: realisation
        }]
    };
 
    window.onload = function() {
        var ctx = document.getElementById("barChart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#ffa0a0',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Réalisations annuelles'
                }
            }
        });
    };  
</script>
@endsection