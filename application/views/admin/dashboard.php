<h2 class="dash_title">Dashboard</h2>
<div class="row">    
    <div class="col-lg-3 col-sm-6 col-mobile-6">
        <div class="graph_card card_stats">
            <div class="graph_card_header">
                <div class="graph_card_icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <p class="graph_card_name">Total Users</p>
                <h3 class="graph_card_title"><?= $totalUsers ?><small></small></h3>
            </div>
            <div class="graph_card_footer">
                <div class="graph_stats">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <a href="<?= site_url('admin'); ?>">View All</a>
                </div>
            </div>            
        </div>
    </div>    
    <div class="col-lg-3 col-sm-6 col-mobile-6">
        <div class="graph_card card_stats">
            <div class="graph_card_header">
                <div class="graph_card_icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <p class="graph_card_name">Total Offers</p>
                <h3 class="graph_card_title"><?= $totalOffers ?><small></small></h3>
            </div>
            <div class="graph_card_footer">
                <div class="graph_stats">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <a href="<?= base_url().'admin/offers'; ?>">View All</a>
                </div>
            </div>            
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-mobile-6">
        <div class="graph_card card_stats">
            <div class="graph_card_header">
                <div class="graph_card_icon">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                </div>
                <p class="graph_card_name">Completed Offers</p>
                <h3 class="graph_card_title"><?= $totalCompletedOffer ?><small></small></h3>
            </div>
            <div class="graph_card_footer">
                <div class="graph_stats">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                    <a href="javascript:;">Completed Offers</a>
                </div>
            </div>            
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-mobile-6">
        <div class="graph_card card_stats">
            <div class="graph_card_header">
                <div class="graph_card_icon">
                    <i class="fa fa-area-chart" aria-hidden="true"></i>
                </div>
                <p class="graph_card_name">Total Click</p>
                <h3 class="graph_card_title"><?= $totalTrackOffer ?><small></small></h3>
            </div>
            <div class="graph_card_footer">
                <div class="graph_stats">
                    <i class="fa fa-area-chart" aria-hidden="true"></i>
                    <a href="javascript:;">Total Click</a>
                </div>
            </div>            
        </div>
    </div>
    <div class="col-xs-12">
        <div class="chart_wrapper">
            <h3>Completed Offers Chart</h3>
            <div class="chart-container">
                <canvas id="completed_offer_chart"></canvas>
            </div>
        </div>
        <div class="chart_wrapper">
            <h3>Track Offers Chart (<span class="track_offer_chart_geocode">All</span>)</h3>
            <div class="col-sm-4 float-right pt-15">
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