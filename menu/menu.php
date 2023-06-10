<?php

require '../config/config.php';
$queryProduct = queryProduct("SELECT * FROM tbl_product");

if (isset($_POST['rating'])) {
    if (rating($_POST) > 0) {
        $beriMasukan = true;
    }
}

@$id_user = $_SESSION['id'];
@$dataUser = queryUser("SELECT * FROM tbl_user WHERE id = $id_user")[0];

if (isset($_SESSION['status']) == "Nonaktif") {
    header("Location: ../auth/logout.php");
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
    <link rel="stylesheet" href="../css/menu.css?v=<?php echo time(); ?>">
    <title>Kowandi Food Gathering | Menu</title>
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
                <li class="dropdown1"><a href="#"><i class="fas fa-user"></i>&nbsp;
                        <?php
                        if (isset($_SESSION['login'])) {
                            echo $_SESSION['username'];
                        } else {
                            echo "Login";
                        }
                        ?>
                        &nbsp;<i class="fas fa-caret-down"></i>
                    </a>
                    <ul>
                        <?php
                        if (isset($_SESSION['login'])) {
                            echo "<li><a class='select' href='../user/profile.php'><i class='fas fa-id-badge'></i>&nbsp;&nbsp;Profile</a></li>
                            <li><a class='select' href='../user/transaction.php'><i class='fas fa-money-check-alt'></i>&nbsp;&nbsp;Log</a></li>
                            <li><a class='select' href='../auth/logout.php'><i class='fas fa-sign-out-alt'></i>&nbsp;&nbsp;Logout</a></li>";
                        } else {
                            echo "<li><a class='select' href='../auth/login.php'><i class='fas fa-key'></i>&nbsp;&nbsp;Login</a></li>
                            <li><a class='select' href='../auth/register.php'><i class='fas fa-file-alt'></i>&nbsp;&nbsp;Register</a></li>";
                        }
                        ?>
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
                <li><a href="menu.php">Menu</a></li>
                <?php
                @$role = $_SESSION['role'];
                if ($role == "Admin") {
                    echo "<li><a href='../admin/admin.php'>Admin</a></li>";
                }
                ?>
            </ul>
        </nav>
        <div class="menu-toggle"><i class="fas fa-bars"></i></div>
    </header>
    <!-- Navbar Bottom -->
    <!-- Banner -->
    <div class="container-banner">
        <h1 class="title-banner">MENU</h1>
    </div>
    <!-- Banner -->
    <!-- Menu -->
    <div class="menu-wrapper">
        <div class="container">
            <?php
            if (isset($beriMasukan)) {
                echo "<center>
                    <div class='success'>
                        <i class='fas fa-comments'></i> Terimakasih atas masukan anda</i>
                    </div>
                </center>
            <script type='text/javascript'>
                    setTimeout(function () {
                        },10);
                    window.setTimeout(function(){
                        window.location.replace('menu.php');
                    } ,2000);
            </script>";
            }
            ?>
            <?php foreach ($queryProduct as $dataProduct): ?>
                <div class="menu">
                    <a href="menu-detail.php?id=<?= $dataProduct['id']; ?>">
                        <div class="logo">
                            <img class="resize-image" src="../uploads/<?= $dataProduct['gambar']; ?>" />
                        </div>
                        <div class="title">
                            <h3>
                                <?= $dataProduct['nama_product']; ?>
                            </h3>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Menu -->

    <!-- Tentang -->
    <section class="tentang">
        <div class="container2">
            <h1 class="title-form">About Us</h1>
            <p class="text-about"> The dormitory Ko Wandi is a very strategic dormitory for boarding students. It
                doesn't only rent out
                boarding houses because there also has a food business that can be ordered via the website/online
                and really helps students if they don't have time to cook or are lazy to go to their place.</p>
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
                <li><a class="sosmed" href="#"><i class="fab fa-line"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy;2023 <a href="../developer/kintondev.php" target="_blank"
                    class="dev">KowandiGatheringFoodDev</a></p>
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