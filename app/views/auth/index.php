<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $data['judul']; ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="icon" href="<?= BASEURL; ?>/img/JTI.png" type="image/png">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

        <div class="col-md-5 col-lg-5 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 25px;">
                                    <table>
                                        <tr>
                                            <td>
                                                <img src="../public/img/jti.png" style="width: auto; height: 100px;">
                                            </td>
                                            <td>
                                                <h1 class="h4 text-gray-900 mb-2">Peminjaman</h1>
                                                <h1 class="h4 text-gray-900 mb-2">Ruangan</h1>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                    
                                    <form class="user" action="<?= BASEURL; ?>/auth/prosesLogin" method="post">

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">   
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password" autocomplete="off" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="togglePassword">
                                                            <i id="password" class="fa fa-eye toggle-icon" onclick="togglePasswordVisibility()" ></i>
                                                        </span>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="text">
                                         <?php Flasher::flash() ?>
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-primary float-right" style="margin-bottom: 30px; margin-right: 145px; margin-top: 10px;">Login</button>

                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePassword').querySelector('.toggle-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fas', 'fa-eye');
                toggleIcon.classList.add('fas', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fas', 'fa-eye-slash');
                toggleIcon.classList.add('fas', 'fa-eye');
            }
        }
    </script>
</body>

</html>