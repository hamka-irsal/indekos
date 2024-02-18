<?php
require 'function.php';

$select = new Select();

if (!empty($_SESSION["id"])) {
    $user = $select->selectUserById($_SESSION["id"]);
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "menu_topbar.php"; ?>
                <div class="row mx-3">
                    <div class="card mt-2 flex mr-2">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div style="color: black;">Total Data Kost</div>
                            </div>

                            <div class="d-flex align-items-baseline mt-3">
                                <div class="h1 mb-0 me-2" style="font-size: 30px;">10</div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2 flex">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div style="color: black;">Total Data Ulasan</div>
                            </div>

                            <div class="d-flex align-items-baseline mt-3">
                                <div class="h1 mb-0 me-2" style="font-size: 30px;">10</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-3">
                    <div class="card h-100 mt-2 w-100">
                        <div class="card-body">
                            <h3 class="card-title"></h3>

                            <div id="chart-mentions" class="chart-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <script src="./js/libs/apexcharts/dist/apexcharts.min.js"></script>

    <script>
        var options = {
            series: [{
                name: 'PRODUCT A',
                data: [44, 55, 41, 67, 22, 43, 21, 49]
            }, {
                name: 'PRODUCT B',
                data: [13, 23, 20, 8, 13, 27, 33, 12]
            }, {
                name: 'PRODUCT C',
                data: [11, 17, 15, 15, 21, 14, 15, 13]
            }],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                stackType: '100%'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }],
            xaxis: {
                categories: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2',
                    '2012 Q3', '2012 Q4'
                ],
            },
            fill: {
                opacity: 1
            },
            legend: {
                position: 'right',
                offsetX: 0,
                offsetY: 50
            },
            colors: ["#008ffb", "#00e396", "#80f1cb"],
        };

        var chart = new ApexCharts(document.querySelector("#chart-mentions"), options);
        chart.render();
    </script>

</body>

</html>