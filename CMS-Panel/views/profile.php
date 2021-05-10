<?php

include "include/head.inc.php";

if (isset($_SESSION['user'])): ?>

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

        <!--    CDN for jQuerry-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!--        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>-->

        <!-- CDN for CKEditor-->
        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

        <style>
            label {
                width: 180px;
            }

            input {
                width: 220px;
            }

            form span {
                color: #ee0a42;
                display: none;
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
                    <h1 class="h3 mb-4 text-gray-800">User Register:</h1>
                    <hr>

                    <form action="../controllers/userController.php" method="post" id="editProfile">
                        <input type="hidden" name="action" value="edit">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="<?= $_SESSION['name'] ?>">
                                <span>Minimum 2 Characteres</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       value="<?= $_SESSION['email'] ?>">
                                <span>Minimum 5 Characteres</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" class="form-control"
                                       value="<?= $_SESSION['username'] ?>">
                                <span>Minimum 5 Characteres</span>
                            </div>
                        </div>
                        <input type="submit" name="register"  value="Save"
                               class="btn btn-success btn-user">
                        <br><br>
                        <input type="button" name="changePass" value="Change Password" data-toggle="modal"
                               data-target="#myModal" class="btn btn-warning btn-user">
                    </form>
                    <?php if (isset($_SESSION['msg3'])): ?>
                        <p><?= $_SESSION['msg3'] ?></p>
                    <?php endif; ?>
                    <br>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Change password</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="../controllers/userController.php" method="post" id="changePass">
                                        <input type="hidden" name="action" value="password">
                                        <div class="form-group">
                                            <label for="oldPassword" style="margin-right: 117px">Old Password:</label>
                                            <input type="password" class="form-control" id="oldPassword"
                                                   name="oldPassword">
                                            <span>Enter Old Password</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="newPassword" class="w-50" style="margin-right: 115px">New
                                                Password:</label>
                                            <input type="password" class="form-control" id="newPassword"
                                                   name="newPassword">
                                            <span>Minimum 6 Characteres</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="cNewPassword" class="w-50">Confirm New Password:</label>
                                            <input type="password" class="form-control" id="cNewPassword">
                                            <span>Password does not match</span>
                                        </div>
                                        <input type="submit" name="submitPass" value="Save" class="btn btn-success">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    var errorColor = "#ff0000";
                    var validColor = "#20e720";
                    var orangeColor = "#f78b00";
                    var borderColor = "#505352";

                    $(function () {
                        var name = $("input[name='name']"),
                            userName = $("input[name='username']"),
                            email = $("input[name='email']");

                        var oldPass = $("input[id='oldPassword']"),
                            newPass = $("input[id='newPassword']"),
                            cNewPass = $("input[id='cNewPassword']");

                        oldPass.on({
                            focus: function () {
                                $(this).css("border-color", orangeColor);
                            },
                            blur: function () {
                                validateText($(this), 6);
                            },
                            keyup: function () {
                                validateText($(this), 6);
                            }
                        });

                        newPass.on({
                            focus: function () {
                                $(this).css("border-color", orangeColor);
                            },
                            blur: function () {
                                validateText($(this), 6);
                            },
                            keyup: function () {
                                validateText($(this), 6);
                            }
                        });

                        cNewPass.on({
                            focus: function () {
                                $(this).css("border-color", orangeColor);
                            },
                            blur: function () {
                                validateCPass($(this), newPass);
                            },
                            keyup: function () {
                                validateCPass($(this), newPass);
                            }
                        });

                        email.on({
                            focus: function () {
                                $(this).css("border-color", orangeColor);
                            },
                            blur: function () {
                                validateText($(this), 5);
                            },
                            keyup: function () {
                                validateText($(this), 5);
                            }
                        });

                        name.on({
                            focus: function () {
                                $(this).css("border-color", orangeColor);
                            },
                            blur: function () {
                                validateText($(this), 2);
                            },
                            keyup: function () {
                                validateText($(this), 2);
                            }
                        });

                        userName.on({
                            focus: function () {
                                $(this).css("border-color", orangeColor);
                            },
                            blur: function () {
                                validateText($(this), 2);
                            },
                            keyup: function () {
                                validateText($(this), 2);
                            }
                        });

                        $("#changePass").submit(function () {
                            resetError();

                            var validated = true;

                            var boololdPass = validateText(oldPass, 6);
                            var boolnewPass = validateText(newPass, 6);
                            var boolcNewPass = validateCPass(cNewPass, newPass);

                            validated = (boololdPass &&
                                boolnewPass &&
                                boolcNewPass);
                            if (validated) {
                                validated = confirm("Are you sure?");
                            }
                            return validated;
                        });

                        $("#editProfile").submit(function () {
                            resetError();

                            var validated = true,
                                formValue = "";
                            var boolName = validateText(name, 2);
                            var booluserName = validateText(userName, 5);
                            var boolEmail = validateText(userName, 5);

                            validated = (boolName &&
                                booluserName &&
                                boolEmail
                            );


                            if (validated) {
                                formValue += "Gender: " + email.val() + "\n";
                                formValue += "First Name: " + name.val() + "\n";
                                formValue += "Last Name: " + userName.val() + "\n";
                                validated = confirm("Are you sure you want to submit this form?\n" + formValue);
                            }

                            return validated;
                        });

                    });

                    function validateCPass(el1, el2) {
                        var valid = true;
                        if (el1.val().length < 6) {
                            el1.css("border-color", errorColor);
                            el1.next().text("Minimum 6 Characteres");
                            el1.next().show("slow").css("display", "inline");
                            valid = false;
                        } else if (el1.val() != el2.val()) {
                            el1.css("border-color", errorColor);
                            el1.next().text("Password does not match!");
                            el1.next().show("slow").css("display", "inline");
                            valid = false;
                        } else {
                            el1.css("border-color", validColor);
                            el1.next().hide("slow");
                        }
                        return valid;
                    }

                    function validateText(el, num) {
                        var valid = true;
                        if (el.val().length < num) {
                            el.css("border-color", errorColor);
                            el.next().show("slow").css("display", "inline");
                            valid = false;
                        } else {
                            el.css("border-color", validColor);
                            el.next().hide("slow");
                        }
                        return valid;
                    }


                    function resetError() {
                        $(".content span").hide();
                        $("form input, form select").css("border-color", borderColor);
                        $("label").css("color", "black");
                    }
                </script>

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
    <?php unset($_SESSION['msg3']); ?>
<?php else:
    header("Location: login.php");
    ?>
<?php endif; ?>