<?php

require '../config/config.php';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hasil = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username'");
    if (mysqli_num_rows($hasil) === 1) {
        $baris = mysqli_fetch_assoc($hasil);
        if (password_verify($password, $baris['password'])) {
            if ($baris['status'] == "Aktif") {
                $_SESSION['id'] = $baris['id'];
                $_SESSION['nama_lengkap'] = $baris['nama_lengkap'];
                $_SESSION['username'] = $baris['username'];
                $_SESSION['role'] = $baris['role'];
                $_SESSION['job_desc'] = $baris['job_desc'];
                $_SESSION['tgl_buat'] = $baris['tgl_buat'];
                $_SESSION['login'] = true;
                $berhasilLoginAktif = true;
            }
            if ($baris['status'] == "Nonaktif") {
                $_SESSION['id'] = $baris['id'];
                $_SESSION['nama_lengkap'] = $baris['nama_lengkap'];
                $_SESSION['username'] = $baris['username'];
                $_SESSION['role'] = $baris['role'];
                $_SESSION['tgl_buat'] = $baris['tgl_buat'];
                $_SESSION['status'] = $baris['status'];
                $_SESSION['login'] = true;
                $berhasilLoginNonaktif = true;
            }
        }
    }
    $gagalLogin = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
    <title>Kowandi Gathering Food | Login</title>
</head>

<body>
    <div class="scrollUp" onclick="scrollToUp();"></div>
    <!-- Navbar Top -->
    <header class="navbar-top">
        <div class="social-media">
            <a class="sosmed" id="m-1" href="#"><i class="fab fa-instagram"></i></a>
            <a class="sosmed" id="m-2" href="#"><i class="fab fa-whatsapp"></i></a>

        </div>
        <nav>
            <ul>
                <li class="dropdown1"><a href="#"><i class="fas fa-user"></i>&nbsp;&nbsp;Tamu&nbsp;&nbsp;<i
                            class="fas fa-caret-down"></i></a>
                    <ul>
                        <li><a class="select" href="login.php"><i class='fas fa-key'></i>&nbsp;&nbsp;Login</a></li>
                        <li><a class="select" href="register.php"><i
                                    class='fas fa-file-alt'></i>&nbsp;&nbsp;Register</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Navbar Top -->
    <!-- Navbar Bottom -->
    <header class="nav-top-mg">
        <div class="logo">
            <a href="../index.php">
                <img class="logo-img" src="../img/logo.png">
            </a>
        </div>
        <nav class="nav-bot">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../shop/shop.php">Shop</a></li>
                <li><a href="../menu/menu.php">Menu</a></li>
            </ul>
        </nav>
        <div class="menu-toggle"><i class="fas fa-bars"></i></div>
    </header>
    <!-- Navbar Bottom -->
    <!-- Login Form -->
    <section class="login-form">
        <div class="container">
            <h1 class="title-form">Login</h1>
            <?php
            if (isset($gagalLogin) && !isset($berhasilLoginAktif) && !isset($berhasilLoginNonaktif)) {
                echo "<center>
                    <div class='danger'>
                        <i class='fas fa-times-circle'></i> Username/Password Salah</i>
                    </div>
                </center>
            <script type='text/javascript'>
                    setTimeout(function () {
                        },10);
                    window.setTimeout(function(){
                        window.location.replace('login.php');
                    } ,3000);
                </script>";
            }
            if (isset($berhasilLoginAktif)) {
                echo "<center>
                    <div class='success'>
                        <i class='fas fa-check-circle'></i> Berhasil Login</i>
                    </div>
                </center>
            <script type='text/javascript'>
                    setTimeout(function () {
                        },10);
                    window.setTimeout(function(){
                        window.location.replace('../index.php');
                    } ,2000);
                </script>";
            }
            if (isset($berhasilLoginNonaktif)) {
                echo "<center>
                    <div class='success'>
                        <i class='fas fa-check-circle'></i> Berhasil Login</i>
                    </div>
                </center>
            <script type='text/javascript'>
                    setTimeout(function () {
                        },10);
                    window.setTimeout(function(){
                        window.location.replace('../user/user-disabled.php');
                    } ,2000);
                </script>";
            }
            if (isset($_SESSION['loginDahulu'])) {
                echo "<center>
                    <div class='warning'>
                        <i class='fas fa-exclamation-circle'> Silahkan login terlebih dahulu</i>
                    </div>
                </center>
            <script type='text/javascript'>
                    setTimeout(function () {
                        },10);
                    window.setTimeout(function(){
                        window.location.replace('login.php');
                    } ,3000);
                </script>";
                unset($_SESSION['loginDahulu']);
            }
            ?>
            <form method="post">
                <div class="form">
                    <label class="form-label" for="username">Username <span id="bintang">*</span></label><br>
                    <input type="text" id="username" name="username" maxlength="12" required>
                </div>
                <div class="form">
                    <label class="form-label" for="password">Password <span id="bintang">*</span></label><br>
                    <input type="password" id="password" name="password" required>
                </div>
                <a class="tanya" href="register.php">Belum memiliki akun ?</a><br>
                <button class="button-login" type="submit" name="login">Login</button>
            </form>
        </div>
    </section>
    <!-- Login Form -->
    <!-- Tentang -->
    <section class="tentang">
        <div class="container2">
            <h1 class="title-form">About us</h1>
            <p class="text-about">
                The dormitory Ko Wandi is a very strategic dormitory for boarding students. It doesn't only rent out
                boarding houses because there also has a food business that can be ordered via the website/online
                and really helps students if they don't have time to cook or are lazy to go to their place.
            </p>
        </div>
    </section>
    <!-- Tentang -->
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <h3>Kowandi Gathering Food</h3>
            <p>"Don't forget to stop before go to campus"</p>
            <ul class="medsos">
                <li><a class="sosmed" id="m-1" href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a class="sosmed" id="m-2" href="#"><i class="fab fa-whatsapp"></i></a></li>

            </ul>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy;2023 <a href="../developer/kintondev.php" target="_blank"
                    class="dev">KowandiFoodGatheringDev</a></p>
        </div>
    </footer>
    <!-- Footer -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // Navbar Dropdown
        $(document).ready(function () {
            $('.menu-toggle').click(function () {
                $('nav').toggleClass('active')
            })
            $('ul li').click(function () {
                $(this).toggleClass('active')
            })
        })

        // Sticky Navbar
        window.addEventListener("scroll", function () {
            var header = document.querySelector("header.navbar-top");
            header.classList.toggle("sticky", window.scrollY > 0);
        })

        window.addEventListener("scroll", function () {
            var header = document.querySelector("header.nav-top-mg");
            header.classList.toggle("sticky", window.scrollY > 0);
        })

        // ScrollUp
        window.addEventListener('scroll', function () {
            var scroll = document.querySelector('.scrollUp');
            scroll.classList.toggle("active", window.scrollY > 0)
        })

        function scrollToUp() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            })
        }
    </script>
</body>

</html>