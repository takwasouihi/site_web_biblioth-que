<?php
include "header.php";
include "../core/livres.php";
include "../core/categories.php";
$l= new livres();
$c = new categories();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "";
}
if ($page == "" || $page == 1) {
    $page_1 = 0;
} else {
    $page_1 = ($page * 6) - 6;
}
$result = $l->afficher($page_1);
$top = $l->top5();
$categories = $c->selectcategorie();

$count = ceil(($l->count()) / 6);


?>
<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="index.php">Gp<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto " href="Livres.php">Livres</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="#about" class="get-started-btn scrollto">Get Started</a>

    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>livres</h2>
                <ol>
                    <li><a href="index.php">Accueil</a></li>
                    <li>livres</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter by Categorie</h3>
                        <ul class="list-links">
                            <?php foreach ($categories as $row)  { ?>
                            <li>
                                <a href="Livres_par_categorie.php?categorie=<?php echo $row["name"]; ?>"><?php echo $row["name"];
                                    } ?></a></li>


                        </ul>
                    </div>
                    <!-- /aside widget -->
                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Livres les mieux notés</h3>
                        <!-- widget product -->
                        <?php foreach ($top as $row) { ?>
                            <div class="product product-widget">
                                <div class="product-thumb">
                                    <img src="livres/<?php echo $row["image"]; ?>" alt="">
                                </div>
                                <div class="product-body">
                                    <h2 class="product-name"><a
                                                href="Livre_details.php?id=<?php echo $row["ID"]; ?>"><?php echo $row["titre"]; ?></a>
                                    </h2>
                                    <h3 class="product-price"><?php echo $row["prix"]; ?> DT</h3>
                                    <div class="product-rating">
                                        <?php

                                        $idp = $row["ID"];
                                        $sql = " SELECT * from livres where (ID='$idp')";
                                        $db = config::getConnexion();
                                        $listnote = $db->query($sql);
                                        if ($listnote->rowCount()) {
                                        foreach ($listnote

                                        as $row1){
                                        for ($i = 0;
                                        $i < 5;
                                        $i++){
                                        if ($row1['note'] > $i)
                                        {
                                        ?>
                                        <td width="80%">
                                            <i class="fa fa-star"></i>
                                            <?php }else{ ?>
                                        <td>
                                            <i class="fa fa-star-o empty"></i>
                                            <?php }
                                            }
                                            }
                                            ?>
                                            <?php
                                            }
                                            else{
                                            for ($i = 0;
                                            $i < 5;
                                            $i++){
                                            ?>
                                        <td>
                                            <i class="fa fa-star-o empty"> </i>
                                            <?php
                                            }
                                            } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
                <div id="main" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="row-filter">

                            </div>

                        </div>
                        <div class="pull-right">

                            <ul class="store-pages">

                                <?php
                                if ($count > 1) { ?>


                                    <li><span class="text-uppercase">Page:</span></li>
                                    <?php
                                    for ($i = 1; $i <= $count; $i++) {
                                        if ($i == $page) {
                                            echo "<li> <a style='color: orangered' href='livres.php?page={$i}'>{$i}</a> </li>  ";
                                        } else {
                                            echo "<li> <a href='livres.php?page={$i}'>{$i}</a> </li>  ";
                                        }

                                    }
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                    <!-- /store top filter -->

                    <!-- STORE -->
                    <div id="store">
                        <!-- row -->

                        <div class="row">
                            <!-- Product Single -->
                            <?php foreach ($result as $row) { ?>
                                <div class="col-md-4 col-sm-6 col-xs-6">

                                    <div class="product product-single">
                                        <div class="product-thumb">

                                            <button onclick="location.href='Livre_details?id=<?php echo $row["ID"]; ?>'"
                                                    class="main-btn quick-view"><i class="fa fa-search-plus"></i> Voir details
                                            </button>
                                            <img style="width: 250px; height: 200px"
                                                 src="livres/<?php echo $row["image"]; ?>" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price"><?php echo $row["prix"]; ?> DT</h3>
                                            <div class="product-rating">
                                                <?php

                                                $idp = $row["ID"];
                                                $sql = " SELECT * from livres where (ID='$idp')";
                                                $db = config::getConnexion();

                                                $listnote = $db->query($sql);


                                                if ($listnote->rowCount()) {

                                                foreach ($listnote

                                                as $row1){

                                                for ($i = 0;
                                                $i < 5;
                                                $i++){
                                                if ($row1['note'] > $i)
                                                {
                                                ?>
                                                <td width="80%">
                                                    <i class="fa fa-star"></i>


                                                    <?php }else{ ?>


                                                <td>
                                                    <i class="fa fa-star-o empty"></i>
                                                    <?php }


                                                    }
                                                    }
                                                    ?>
                                                    <?php
                                                    }

                                                    else{

                                                    for ($i = 0;
                                                    $i < 5;
                                                    $i++){
                                                    ?>
                                                <td>
                                                    <i class="fa fa-star-o empty"> </i>


                                                    <?php

                                                    }
                                                    } ?>
                                            </div>
                                            <h2 class="product-name"><a
                                                        href="Livres_details?id=<?php echo $row["ID"]; ?>"><?php echo $row["titre"]; ?></a>
                                            </h2>
                                            <div class="product-btns">
                                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i>
                                                </button>
                                                <button class="primary-btn add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i> Acheter
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>
                            <!-- /Product Single -->


                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /STORE -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="row-filter">

                            </div>

                        </div>
                        <div class="pull-right">

                            <ul class="store-pages">

                                <?php
                                if ($count > 1) { ?>
                                    <li><span class="text-uppercase">Page:</span></li>
                                    <?php
                                    for ($i = 1; $i <= $count; $i++) {
                                        if ($i == $page) {
                                            echo "<li > <a style='color: orangered'  href='livres.php?page={$i}'>{$i}</a> </li>  ";
                                        } else {
                                            echo "<li> <a href='livres.php?page={$i}'>{$i}</a> </li>  ";
                                        }

                                    }
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /MAIN -->
            </div>
            <!-- /row -->
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>Gp<span>.</span></h3>
                        <p>
                            A108 Adam Street <br>
                            NY 535022, USA<br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Gp</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>