<?php 
include 'maquetado/datos.php'
?>

    <!-- info section -->
    <section class="info_section ">

        <div class="container">
        <div class="contact_nav">
            <a>
            <i class="fa fa-phone" aria-hidden="true"></i>
            <span>
                Tel1 : <?php echo $Tel1; ?>
            </span>
            </a>
            <a>
            <i class="fa fa-phone" aria-hidden="true"></i>
            <span>
                Tel2 : <?php echo $Tel2; ?>
            </span>
            </a>
            <a>
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span>
                Email : <?php echo $Email; ?>
            </span>
            </a>
            <a>
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span>
                Ubicación : <?php echo $Ubicacion; ?>
            </span>
            </a>
        </div>

        <div class="info_top">
        </div>

        <div class="info_bottom">
            <div class="row">
            <div class="col-md-2">
                <div class="info_logo">
                <a href="index.html">
                    <img src="images/keni_logo.png" alt="">
                </a>
                </div>
            </div>
            <!-- Redes Sociales -->
            <!-- <div class="col-md-2 ml-auto">
                <div class="social_box">
                <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                </div>
            </div> -->
            </div>

        </div>
        </div>
    </section>
    <!-- end info_section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
        <p>
            &copy; <span id="displayYear"></span> Todos los derechos reservados
        </p>
        </div>
    </footer>
    <!-- footer section -->

    <!-- back to top -->
    <button id="btn-back-to-top" title="Ir arriba">
        <i class="fa fa-arrow-up"></i>
    </button>
    <!-- end back to top -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!--  OwlCarousel 2 - Filter -->
    <script src="https://huynhhuynh.github.io/owlcarousel2-filter/dist/owlcarousel2-filter.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

    </body>

</html>