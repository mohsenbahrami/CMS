<?php
include "include/head.inc.php";

$userMgr = new UserManager();
$users = $userMgr->getAllUsers();

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
                <h1 class="h3 mb-2 text-gray-800">Users</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Change to</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user):  ?>
                                <tr>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?php
                                        if($user['status'] == 1){
                                            echo "Admin";
                                        }else{
                                            echo "Moderator";
                                        } ?></td>
                                    <td style="text-align: center">
                                        <?php if($user['status'] == 1): ?>
                                        <a href="../controllers/userController.php?action=moderator&id=<?= $user['id'] ?>" class="btn btn-primary editBtn" >Moderator</a>
                                        <?php else: ?>
                                        <a href="../controllers/userController.php?action=admin&id=<?= $user['id'] ?>" class="btn btn-warning editBtn" >Admin</a>
                                        <?php endif; ?>
                                    </td>

                                    <td style="text-align: center"><a href="../controllers/userController.php?action=delete&id=<?= $user['id']  ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger deleteBtn">Delete</a></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <a href="register.php" class="btn btn-success float-right mb-4">Add
                    New User</a>
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
