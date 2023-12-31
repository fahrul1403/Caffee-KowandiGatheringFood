<?php

require '../config/config.php';
$id = $_GET['id'];
$dataProduct = queryProduct("SELECT * FROM tbl_product WHERE id = $id")[0];

$dataRekomendasiProduct = queryProduct("SELECT * FROM tbl_product");

if (!isset($_GET['id'])) {
    header("Location: shop.php");
}

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
    <link rel="stylesheet" href="../css/shop-detail.css?v=<?php echo time(); ?>">
    <title>Kowandi Food Gathering |
        <?= $dataProduct['nama_product']; ?>
    </title>
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
                            echo "Tamu";
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
                <li><a href="shop.php">Shop</a></li>
                <li><a href="../menu/menu.php">Menu</a></li>
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
    <!-- Menu Detail -->
    <div class="container-detail">
        <div class="detail-left">
            <center><img src="../uploads/<?= $dataProduct['gambar']; ?>" /></center>
        </div>
        <div class="detail-right">
            <h1>
                <?= $dataProduct['nama_product']; ?>
            </h1>
            <div class="price">
                <h3>Rp
                    <?= number_format($dataProduct['harga']); ?>
                </h3>
            </div>
            <div class="terjual">
                <p>Terjual <span class="terjual-counter">
                        <?= $dataProduct['terjual']; ?>
                    </span></p>
            </div>
            <div class="deskripsi">
                <textarea disabled>
            <?= $dataProduct['deskripsi']; ?>
        </textarea>
            </div>
            <div class="order-button">
                <a href="../checkout/order.php?id=<?= $dataProduct['id']; ?>">
                    <span class="btn order"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Beli</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Menu Detail -->
    <!-- Menu Detail Responsive -->
    <div class="container-detail2">
        <div class="gambar-product">
            <center><img src="../uploads/<?= $dataProduct['gambar']; ?>" /></center>
        </div>
        <div class="title-detail">
            <h1>
                <?= $dataProduct['nama_product']; ?>
            </h1>
            <div class="price2">
                <h3>Rp
                    <?= number_format($dataProduct['harga']); ?>
                </h3>
            </div>
            <div class="terjual2">
                <p>Terjual <span class="terjual-counter">
                        <?= $dataProduct['terjual']; ?>
                    </span></p>
            </div>
            <div class="deskripsi2">
                <textarea disabled>
            <?= $dataProduct['deskripsi']; ?>
        </textarea>
            </div>
            <div class="order-button2">
                <a href="../checkout/order.php?id=<?= $dataProduct['id']; ?>">
                    <span class="btn order2"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Beli</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Menu Detail Responsive -->
    <!-- Rekomendasi Menu -->
    <h1 class="title-rekomen">Menu Rekomendasi</h1>
    <div class="rekomen-wrapper">
        <div class="container-rekomen">
            <div class="rekomen">
                <div class="logo">
                    <img class="resize-image" src="../uploads/<?= $dataRekomendasiProduct[0]['gambar']; ?>" />
                </div>
                <div class="title">
                    <h3>
                        <?= $dataRekomendasiProduct[0]['nama_product']; ?>
                    </h3>
                </div>
                <div class="content">
                    <p>Terjual <span class="terjual-counter">
                            <?= $dataRekomendasiProduct[0]['terjual']; ?>
                        </span></p>
                    <p>Rp
                        <?= number_format($dataRekomendasiProduct[0]['harga']); ?>
                    </p>
                </div>
                <a href="shop-detail.php?id=<?= $dataRekomendasiProduct[0]['id']; ?>">
                    <div class="btn-rekomen">
                        <span class="btn-rek rekomen-btn">Order Now</span>
                    </div>
                </a>
            </div>
            <div class="rekomen">
                <div class="logo">
                    <img class="resize-image" src="../uploads/<?= $dataRekomendasiProduct[1]['gambar']; ?>" />
                </div>
                <div class="title">
                    <h3>
                        <?= $dataRekomendasiProduct[1]['nama_product']; ?>
                    </h3>
                </div>
                <div class="content">
                    <p>Terjual <span class="terjual-counter">
                            <?= $dataRekomendasiProduct[1]['terjual']; ?>
                        </span></p>
                    <p>Rp
                        <?= number_format($dataRekomendasiProduct[1]['harga']); ?>
                    </p>
                </div>
                <a href="shop-detail.php?id=<?= $dataRekomendasiProduct[1]['id']; ?>">
                    <div class="btn-rekomen">
                        <span class="btn-rek rekomen-btn">Order Now</span>
                    </div>
                </a>
            </div>
            <div class="rekomen">
                <div class="logo">
                    <img class="resize-image" src="../uploads/<?= $dataRekomendasiProduct[2]['gambar']; ?>" />
                </div>
                <div class="title">
                    <h3>
                        <?= $dataRekomendasiProduct[2]['nama_product']; ?>
                    </h3>
                </div>
                <div class="content">
                    <p>Terjual <span class="terjual-counter">
                            <?= $dataRekomendasiProduct[2]['terjual']; ?>
                        </span></p>
                    <p>Rp
                        <?= number_format($dataRekomendasiProduct[2]['harga']); ?>
                    </p>
                </div>
                <a href="shop-detail.php?id=<?= $dataRekomendasiProduct[2]['id']; ?>">
                    <div class="btn-rekomen">
                        <span class="btn-rek rekomen-btn">Order Now</span>
                    </div>
                </a>
            </div>
            <div class="rekomen">
                <div class="logo">
                    <img class="resize-image" src="../uploads/<?= $dataRekomendasiProduct[3]['gambar']; ?>" />
                </div>
                <div class="title">
                    <h3>
                        <?= $dataRekomendasiProduct[3]['nama_product']; ?>
                    </h3>
                </div>
                <div class="content">
                    <p>Terjual <span class="terjual-counter">
                            <?= $dataRekomendasiProduct[3]['terjual']; ?>
                        </span></p>
                    <p>Rp
                        <?= number_format($dataRekomendasiProduct[3]['harga']); ?>
                    </p>
                </div>
                <a href="shop-detail.php?id=<?= $dataRekomendasiProduct[3]['id']; ?>">
                    <div class="btn-rekomen">
                        <span class="btn-rek rekomen-btn">Order Now</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Rekomendasi Menu -->
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
    $(document).ready(function() {
        $('.menu-toggle').click(function() {
            $('nav').toggleClass('active')
        })
        $('ul li').click(function() {
            $(this).toggleClass('active')
        })
    })

    // Sticky Navbar
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header.navbar-top");
        header.classList.toggle("sticky", window.scrollY > 0);
    })

    window.addEventListener("scroll", function() {
        var header = document.querySelector("header.nav-top-mg");
        header.classList.toggle("sticky", window.scrollY > 0);
    })

    // ScrollUp
    window.addEventListener('scroll', function() {
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