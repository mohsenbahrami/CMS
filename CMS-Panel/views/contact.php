<?php

include "include/head.inc.php";
$pageMgr = new PageManager();
$temp = $pageMgr->getPageByTitle('contact');
$contacts = json_decode($temp->getContent(), true);

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
    <style>
       form label {
            width: 150px;
        }

        input {
            width: 250px;
        }

    </style>
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
                <h1 class="h3 mb-4 text-gray-800">Contact Page</h1>
                <hr>

                <form method="post" action="../controllers/pageController.php?id=contact">
                    <input type="hidden" name="action" value="edit">
                    <h5>Contact Info:</h5><br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="example@gmail.com" value="<?= $contacts['email']?>" required><br><br>
                    <label for="phone">Phone:</label>
                    <input type="tel" name="phone" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" value="<?= $contacts['phone']?>" required><br><br>
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" value="<?= $contacts['address']?>" required>
                    <hr>
                    <h5>Social Media:</h5><br>
                    <label for="fb">Facebook:</label>
                    <input type="url" name="fb" id="fb" placeholder="https://..."  value="<?= $contacts['fb']?>" required><br><br>
                    <label for="twitter">Twitter:</label>
                    <input type="url" name="twitter" id="twitter" placeholder="https://..." value="<?= $contacts['twitter']?>" required><br><br>
                    <label for="instagram">Instagram:</label>
                    <input type="url" name="instagram" id="instagram" placeholder="https://..." value="<?= $contacts['instagram']?>" required><br><br>
                    <label for="linkedin">Linkedin:</label>
                    <input type="url" name="linkedin" id="linkedin" placeholder="https://..." value="<?= $contacts['linkedin']?>" required>
                    <hr>
                    <input type="submit" name="Submit" value="Edit" class="form-control btn btn-success">
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