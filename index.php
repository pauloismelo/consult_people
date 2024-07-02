<!doctype html>
<html lang="pt-BR">

    <?php include('head.php'); ?>

    <body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <?php include('header.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('sidebar.php'); ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        


                        <?
                        include('index_linha1.php');
                        include('index_linha2.php');?>




                        <!-- end row -->


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <? include('footer.php');?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!-- Right Sidebar -->
        <?php include('right_sidebar.php') ?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include('scripts.php') ?>


    </body>

</html>
