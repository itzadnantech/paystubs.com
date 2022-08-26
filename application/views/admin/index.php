<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">overview</h2>
            </div>
        </div>
    </div>
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                        <div class="text">
                            <h2><?= $totalUsers ?></h2>
                            <span>Total Users</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <div class="text">
                            <h2><?= $totalOffers ?></h2>
                            <span>Total Offers</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>                            
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                    <div class="text">
                        <h2><?= $totalCompletedOffer ?></h2>
                        <span>Completed Offers</span>
                    </div>
                </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart3"></canvas>
                    </div>                        
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fas  fa-mouse-pointer"></i>
                        </div>
                        <div class="text">
                            <h2><?= $totalTrackOffer ?></h2>
                        <span>Total Click</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart4"></canvas>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row m-t-25">
        <div class="col-md-12">
            <div class="au-card">
                <div class="au-card-inner">
                    <h3 class="title-2">Completed Offers Chart</h3>
                    <div class="chart-container">
                        <canvas id="completed_offer_chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="au-card m-t-25">
                <div class="au-card-inner">
                    <h3 class="title-2">Track Offers Chart (<span class="track_offer_chart_geocode">All</span>)</h3>
                    <div class="col-sm-6 float-right pt-15">
                        <select name="geo_code" class="form-control choose-geo-code">
                        <option value="all">Select Geo Code...</option>
                        <?php
                        if ($allGeoCodes) {
                            foreach ($allGeoCodes as $singleGeoCode) {
                            ?>
                                <option value="<?= $singleGeoCode->iso_code_2 ?>"><?= $singleGeoCode->country.' ('.$singleGeoCode->iso_code_2.')' ?></option>
                            <?php
                            }
                        } else {
                        ?>
                                <option>No Geo Code Available.</option>
                        <?php
                        }
                        ?>

                        </select>
                    </div>
                    <div class="chart-container clearfix">
                        <canvas id="track_offer_chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var color = Chart.helpers.color;
        var ctx = document.getElementById('completed_offer_chart').getContext('2d');
        var config = createConfig('top', 'Completed Offers', <?= json_encode($months) ?>, 'Months', <?= json_encode($monthsRecord) ?>, 'Total Completed Offers');
        new Chart(ctx, config);
        
        var tchart = document.getElementById('track_offer_chart').getContext('2d');
        var tconfig = createConfig('top', 'Track Offers', <?= json_encode($tMonths) ?>, 'Months', <?= json_encode($tMonthsRecord) ?>, 'Total Track Offers');
        new Chart(tchart, tconfig);
        
        function createConfig(legendPosition, label, xaxis, xaxislabel, yaxis, yaxislabel) {
            return {
                type: 'line',
                data: {
                    labels: xaxis,
                    datasets: [{
                        label: label,
                        data: yaxis,
                        backgroundColor: color('rgb(54, 162, 235)').alpha(0.5).rgbString(),
                        borderColor: 'rgb(54, 162, 235)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: legendPosition,
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                    display: true,
                                    labelString: xaxislabel
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                    display: true,
                                    labelString: yaxislabel
                            }
                        }]
                    },
                    title: {
                        display: false,
                        text: 'Legend Position: ' + legendPosition
                    }
                }
            };
        }
    });
</script>