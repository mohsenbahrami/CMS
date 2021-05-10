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

                    <form class="user" action="../controllers/userController.php" method="post" id="newU">
                        <input type="hidden" name="action" value="register">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Name">
                                <span>Minimum 5 Characteres</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="username"
                                       id="username" placeholder="Username">
                                <span>Minimum 5 Characteres</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" id`="email"
                                       placeholder="Email Address">
                                <span>Minimum 2 Characteres</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control" name="password"
                                       id="password" placeholder="Password">
                                <span>Minimum 6 Characteres</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="cPassword"
                                       id="cPassword" placeholder="Repeat Password">
                                <span>Password does not match</span>
                            </div>
                        </div>
                        <input type="submit" name="register" value="Register"
                               class="btn btn-success btn-user">
                    </form>
                    <?php if (isset($_SESSION['msg3'])): ?>
                        <p><?= $_SESSION['msg3'] ?></p>
                    <?php endif; ?>
                    <br>
                    <p style="color: red; text-align: center"> <?= isset($_SESSION['msg1']) ? $_SESSION['msg1'] : "" ?></p>
                </div>
                <script>
                    var errorColor = "#ff0000";
                    var validColor = "#20e720";
                    var orangeColor = "#f78b00";
                    var borderColor = "#505352";

                    $(function () {
                        var name = $("input[name='name']"),
                            email = $("input[name='email']"),
                            userName = $("input[name='username']"),
                            pass = $("input[name='password']"),
                            cPass = $("input[name='cPassword']");


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

                        email.on({
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
                                validateText($(this), 5);
                            },
                            keyup: function () {
                                validateText($(this), 5);
                            }
                        });

                        pass.on({
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

                        cPass.on({
                            focus: function () {
                                $(this).css("border-color", orangeColor);
                            },
                            blur: function () {
                                validateCPass($(this), pass);
                            },
                            keyup: function () {
                                validateCPass($(this), pass);
                            }
                        });

                        $("#newU").submit(function () {
                            resetError();

                            var validated = true,
                                formValue = "";
                            var boolFname = validateText(name, 2);
                            var boolLname = validateText(email, 2);
                            var boolPass = validateText(pass, 6);
                            var boolCPass = validateCPass(cPass, pass);
                            var boolUserName = validateText(userName, 5);

                            validated = (boolFname &&
                                boolLname &&
                                boolPass &&
                                boolCPass &&
                                boolUserName
                            );


                            if (validated) {
                                formValue += "Name: " + name.val() + "\n";
                                formValue += "Email: " + email.val() + "\n";
                                formValue += "User Name: " + userName.val() + "\n";
                                validated = confirm("Are you sure you want to submit this form?\n" + formValue);
                            }

                            return validated;
                        });

                    });

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

                    function resetError() {
                        $("span").hide();
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