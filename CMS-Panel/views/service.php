<?php

include "include/head.inc.php";
$serviceMgr = new ServiceManager();
$service = $serviceMgr->getServiceByNum($_GET['id']);

if(isset($_SESSION['user'])): ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CDN for CKEditor-->
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include "include/sidebar.php" ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include "include/navbar.php" ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Service</h1>
                <hr>

                <form method="post" action="../controllers/serviceController.php?id=<?= $service->getNum() ?>" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="edit">
                    <label for="title">Service title:</label>
                    <input type="text" name="title" id="title" value="<?=  $service->getTitle() ?>"><br><br>
                    <textarea name="text" id="text" rows="10" cols="40"><?=  $service->getText() ?></textarea><br>
                    <input type="file" name="pic" id="img" style="width:180px; margin-bottom: 20px">
                    <?php if (isset($service)): ?>
                        <div>
                            <img src="../upload/<?= $service->getPic() ?>" class="img-fluid" alt="">
                        </div>
                    <?php endif ?>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor 4
                        // instance, using default configuration.
                        CKEDITOR.replace('text');
                        editor.resize( '50%', '150' );
                    </script>
                <hr>

                    <input type="submit" name="Submit" value="Register" class="form-control btn btn-success">
                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include "include/footer.php" ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php else:
    header("Location: login.php");
    ?>
<?php endif;?>