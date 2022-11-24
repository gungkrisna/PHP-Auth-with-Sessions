<?php require("register.class.php") ?>
<?php
	if(isset($_POST['submit'])){
		$user = new RegisterUser($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="NextSocial">
    <meta name="keywords" content="social media">
    <meta name="author" content="gk">

    <title>NextSocial - Daftar</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/plugins/pace/pace.css" rel="stylesheet">

    <link href="../assets/css/main.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/next.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/next.png" />
</head>
<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="../">NextSocial</a>
            </div>
            <p class="auth-description">Masukkan kredensial untuk membuat akun NextSocial Anda. Sudah punya akun? <a href="../login">Masuk</a></p>
            
            <?php
                if(@$user->error) {
                    echo '<div class="alert alert-custom alert-indicator-left indicator-danger" role="alert">
                            <div class="alert-content">
                                <span class="alert-title">Gagal!</span>
                                <span class="alert-text">' . @$user->error .
                                '</span>
                            </div>
                    </div>';
                }

                else if(@$user->success) {
                    echo '<div class="alert alert-custom alert-indicator-left indicator-success" role="alert">
                            <div class="alert-content">
                                <span class="alert-title">Sukses!</span>
                                <span class="alert-text">' . @$user->success . ' <a href="../login">Masuk</a>
                                </span>
                            </div>
                    </div>';
                } 
            ?>

            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="auth-credentials m-b-xxl">

                    <label for="signUpName" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control m-b-md" id="signUpName" aria-describedby="signUpName" placeholder="John Doe">

                    <label for="signUpUsername" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control m-b-md" id="signUpUsername" aria-describedby="signUpUsername" placeholder="@username">

                    <label for="signUpEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control m-b-md" id="signUpEmail" aria-describedby="signUpEmail" placeholder="hi@NextSocial.com">

                    <label for="signUpPassword" class="form-label">Kata sandi</label>
                    <input type="password" name="password" class="form-control" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                </div>

                <div class="auth-submit">
                    <button type="submit" name="submit" href="#" class="btn btn-primary">Daftar</a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="../assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="../assets/plugins/pace/pace.min.js"></script>
    <script src="../assets/js/main.min.js"></script>
</body>
</html>