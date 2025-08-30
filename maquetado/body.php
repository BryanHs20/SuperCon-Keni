<?php 
include 'maquetado/datos.php'
?>

<body>

    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
        <div class="header_top">
            <div class="container-fluid header_top_container">
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
                    Email: <?php echo $Email; ?>
                </span>
                </a>
                <a>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                    Ubicación : <?php echo $Ubicacion; ?>
                </span>
                </a>
            </div>
            <!-- Redes Sociales -->
            <!-- <div class="social_box">
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
            </div> -->
            </div>
        </div>
        <div class="header_bottom">
            <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.php">
                    <img src="images/keni_logo.png" alt="">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ">
                    <li class="nav-item <?php if ($activePage === 'Inicio') echo 'active'; ?>">
                    <a class="nav-link" href="index.php">Inicio</a> 
                    </li>
                    <li class="nav-item <?php if ($activePage === 'Servicios') echo 'active'; ?>">
                    <a class="nav-link" href="service.php">Servicios</a>
                    </li>
                    <li class="nav-item <?php if ($activePage === 'Sobre') echo 'active'; ?>">
                    <a class="nav-link" href="about.php"> Sobre Nosotros </a> 
                    </li>
                    <li class="nav-item <?php if ($activePage === 'Proyectos') echo 'active'; ?>">
                    <a class="nav-link" href="project.php">Proyectos </a> 
                    </li>
                    <li class="nav-item <?php if ($activePage === 'Contacto') echo 'active'; ?>">
                    <a class="nav-link" href="contact.php">Contactos </a> 
                    </li>
                </ul>
                </div>
            </nav>
            </div>
        </div>
        </header>
        <!-- end header section -->