<?php
    require __DIR__ . '/Analytics.class.php';
    $google = new Analytics();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Google Analytics Charts</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/canvasjs.min.js"></script>
        <script src="assets/js/charts.js"></script>
        <style>
            .chart {height: 260px; width: 100%;}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="mt-4"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Page Views and Visiter</div>
                        <div class="card-body">
                            <div class="chart" id="chart-view" data-session='<?php echo $google->session(); ?>' data-pageviews='<?php echo $google->view(); ?>'></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Traffic</div>
                        <div class="card-body">
                            <div class="chart" id="chart-traffic" data-traffic='<?php echo $google->traffic(); ?>'></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Device Category</div>
                        <div class="card-body">
                            <div class="chart" id="chart-device" data-device='<?php echo $google->device(); ?>'></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Browser</div>
                        <div class="card-body">
                            <div class="chart" id="chart-browser" data-browser='<?php echo $google->browser(); ?>'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>