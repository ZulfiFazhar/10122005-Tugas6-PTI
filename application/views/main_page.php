<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'inc/head.php'; ?>
</head>

<body class="skin-blue">
    <?php include 'inc/header.php'; ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column: logo and sidebar -->
        <?php include 'sidebar-nav.php'; ?>

        <!-- Right side column: navbar and content -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php if ($level == '1') : ?>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php 
                                            $this->db->select('*');
                                            $this->db->from('t_model');
                                            echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Total Produk</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo site_url('item'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php 
                                            $this->db->select('*');
                                            $this->db->from('t_stock');
                                            echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Total Stok</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-checkbox-outline"></i>
                                </div>
                                <a href="<?php echo site_url('model'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php 
                                            $this->db->select('*');
                                            $this->db->from('t_stock');
                                            $this->db->where('status', 'IN PROCESS');
                                            echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Stok Dalam Proses</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-arrow-graph-up-right"></i>
                                </div>
                                <a href="<?php echo site_url('model'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php 
                                            $this->db->select('*');
                                            $this->db->from('t_stock');
                                            $this->db->where('status', 'UNPROCESSED');
                                            echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Stok Belum Diproses</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-cancel"></i>
                                </div>
                                <a href="<?php echo site_url('model'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                <?php elseif ($level == '2') : ?>
                    <!-- BAGIAN PABRIK -->
                    <div class="row">
                        <div class="col-lg-1 col-xs-6"></div>
                        <div class="col-lg-2 col-xs-6">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php 
                                            $this->db->select('*');
                                            $this->db->from('view_proses');
                                            $this->db->where('nama_proses', 'mesin');
                                            echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Stok Pada Mesin</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-cog"></i>
                                </div>
                                <a href="<?php echo site_url('proses'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Additional columns here -->
                        <!-- ./col -->
                    </div>
                <?php endif; ?>
                
                <!-- Additional rows and columns can go here for other sections -->
                
            </section><!-- /.content -->
            <section class="col-lg-12 connectedSortable"> 
                            <!-- Custom tabs (Charts with tabs)--> 
                            <div class="nav-tabs-custom"> 
                                <!-- Tabs within a box --> 
                                <ul class="nav nav-tabs pull-right"> 
                                    <!-- <li class="active"><a 
href="#alamat-kantor" data-toggle="tab">Kantor</a></li> --> 
                                    <li class="pull-left header"><i 
class="fa fa-inbox"></i> Chart</li> 
                                </ul> 
                                <div class="tab-content no-padding"> 
                                    <!-- Morris chart - Sales --> 
                                    <div class="chart tab-pane active" 
id="alamat-kantor" style="position: relative; height: 250px;"> 
                                        <br/> 
                                        <canvas id="myChart"></canvas> 
                                    </div> 
                                </div> 
                            </div><!-- /.nav-tabs-custom --> 
                        </section> 
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

    <?php include 'inc/jq.php'; ?>
    <script> 
            $(document).ready(function() { 
                var ctx = docu
ment.getElementById('myChart').getContext('2d'); 
                var chart = new Chart(ctx, { 
                    // The type of chart we want to create 
                    type: 'bar', 
                    responsive: true, 
                    mainAspectRation: false, 
 
                    // The data for our dataset 
                    data: { 
                        labels: <?php echo json_encode($chart['label']) ?>, 
                        datasets: [{ 
                            label: 'My First dataset', 
                            backgroundColor: 'rgb(255, 99, 132)', 
                            borderColor: 'rgb(255, 99, 132)', 
                            data: <?php echo json_encode($chart['data']) ?> 
                        }] 
                    }, 
 
                    // Configuration options go here 
                    options: { 
                        scales: { 
                            yAxes: [{ 
                                ticks: { 
                                    beginAtZero: true, 
                                    stepSize: 1, 
                                } 
                            }] 
                        } 
                    } 
                });                 }); 
                chart.canvas.parentNode.style.height = '500px'; 
                chart.canvas.parentNode.style.width = '100%'; 
            }); 
        </script> 
</body>
</html>
