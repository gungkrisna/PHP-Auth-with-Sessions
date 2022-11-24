<?php require("login.class.php") ?>
<?php 
    if(isset($_GET['alert'])){
        $alert = filter_var($_GET['alert'], FILTER_SANITIZE_STRING);
    }

	if(isset($_POST['submit'])){
		$user = new LoginUser($_POST['account'], $_POST['password']);
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
    
    <title>NextSocial - Masuk</title>

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
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="../">NextSocial</a>
            </div>
            <p class="auth-description">Masuk dengan akun NextSocial Anda. Tidak punya akun? <a href="../signup">Buat akun</a></p>
            <?php
                if(@$user->error) {
                    echo '<div class="alert alert-custom alert-indicator-left indicator-danger" role="alert">
                            <div class="alert-content">
                                <span class="alert-title">Gagal!</span>
                                <span class="alert-text">' . @$user->error .
                                '</span>
                            </div>
                    </div>';
            } ?>
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="auth-credentials m-b-xxl">
                    <label for="signInAccount" class="form-label">Akun</label>
                    <input type="text" name="account" class="form-control m-b-md" id="signInAccount" aria-describedby="signInEmail" placeholder="Alamat email atau username">

                    <label for="signInPassword" class="form-label">Kata sandi</label>
                    <input type="password" name="password" class="form-control" id="signInPassword" aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                </div>

                <div class="auth-submit">
                    <button href="#" type="submit" name="submit" class="btn btn-primary">Masuk</button>
                    <a href="#" class="auth-forgot-password float-end">Lupa kata sandi?</a>
                </div>
                <div class="divider"></div>
                <div class="auth-alts">
                    <a href="#" class="auth-alts-google"></a>
                    <a href="#" class="auth-alts-facebook"></a>
                    <a href="#" class="auth-alts-twitter"></a>
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