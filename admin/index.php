<?php
require 'function.php';

$select = new Select();

$dashboard = View::Dashboard();

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
    <div id="wrapper">

        <?php include "menu_sidebar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <?php include "menu_topbar.php"; ?>

                <div class="container-fluid">
                    <div class="page-title d-flex justify-content-between mb-2">
                        <div>
                            <h1 style="font-weight:600; color: black; font-size: 30px; margin: 0px">Dashboard</h1>
                            <p>Ringkasan Aplikasi Anda.</p>
                        </div>
                    </div>
                </div>

                <div class="row mx-3 mb-2">
                    <div class="card mt-2 mr-3" style="width: 220px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div style="color: black;">Total Data Kost</div>
                            </div>

                            <div class="d-flex align-items-baseline mt-3">
                                <div class="h1 mb-0 me-2" style="font-size: 30px;"><?php echo $dashboard['kost'] ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2 mr-3" style="width: 220px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div style="color: black;">Total Rekomendasi</div>
                            </div>

                            <div class="d-flex align-items-baseline mt-3">
                                <div class="h1 mb-0 me-2" style="font-size: 30px;"><?php echo $dashboard['kost'] ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2 mr-3" style="width: 220px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div style="color: black;">Total Data Pengguna</div>
                            </div>

                            <div class="d-flex align-items-baseline mt-3">
                                <div class="h1 mb-0 me-2" style="font-size: 30px;"><?php echo $dashboard['user'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-3">
                    <div class="card h-100 mt-2 w-100">
                        <div class="card-body">
                            <h3 class="card-title" style="color: black; font-size:15px">Data Kost dan Rekomendasi 10 Hari Terakhir</h3>

                            <div id="chart-mentions" class="chart-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="./js/libs/apexcharts/dist/apexcharts.min.js"></script>

    <script>
        const item = document.getElementById('chart-mentions');
        window.ApexCharts && (new ApexCharts(item, {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 380,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
                stacked: true,
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                    name: "Data Kost",
                    data: <?= json_encode($dashboard['chart']['kost']['data']) ?>
                },
                {
                    name: "Data Rekomendasi",
                    data: <?= json_encode($dashboard['chart']['recomendation']['data']) ?>
                }
            ],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
                xaxis: {
                    lines: {
                        show: true
                    }
                },
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: <?= json_encode($dashboard['chart']['kost']['date']) ?>,
            colors: ["#1d4ed8", "#4ade80"],
            legend: {
                show: false,
            },
        })).render();
    </script>

</body>

</html>