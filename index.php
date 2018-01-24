<!DOCTYPE html>
<html>
    <head>
        <title>Noticias</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> <!-- para nao dar zoom -->
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"> <!-- my style compilate -->
        

        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/creative.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

        <script type="text/javascript">
            new WOW().init();

            function mostraMenu() {
                $("nav").toggle();
            }
            $(function () {

                //	create a menu
                $('#menu').mmenu();

                //	fire the plugin
                $('.mh-head').mhead();

                //	for demo only
                $('a[href^="#/"]').click(function () {
                    alert('Thank you for clicking, but that\'s a demo link.');
                    return;
                })
            });
            // funcao para rodar os botoes redes sociais
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-42119746-1']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </head>


    <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Your Favorite Source of Free Bootstrap Themes</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <main>
            <!-- centro de conteudo -->
            <section class="container">
                <?php
                //print_r( $_GET );

                if (isset($_GET["p"])) {
                    //se o parametro p existe
                    $p = trim($_GET["p"]);

                    //separar por / produto/111
                    //pagina - produto
                    //codigo - 111
                    $p = explode("/", $p);

                    //print_r ( $p );
                    $pagina = $p[0]; //nome da página
                } else {

                    $pagina = "home";
                }

                $pagina = "pages/$pagina.php";

                if (file_exists($pagina))
                    include $pagina;
                else
                    include "pages/erro.php";
                ?>
        
    </section>
    <!-- RODAPE -->

<!-- scripts -->
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> <!-- boostrap -->
        <script type="text/javascript" src="bootstrap/js/npm.js"></script> <!-- boostrap -->
        <script type="text/javascript" src="bootstrap/js/docs.js"></script> <!-- icones redes sociais boostrap -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> <!-- jquery -->
        <script type="text/javascript" src="js/jquery.mmenu.all.js"></script> <!-- plugin menu responsivo -->
        <script type="text/javascript" src="js/jquery.mhead.js"></script> <!-- plugin menu responsivo -->
        <script type="text/javascript" src="js/modernizr.custom.js"></script> <!-- plugin modernizin -->
        <script type="text/javascript" src="js/wow.min.js"></script> <!-- efeitos de page Wow -->
        <script type="text/javascript" src="js/creative.min.js"></script> <!-- efeitos de page Wow -->
        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script> <!-- efeitos de page Wow -->
</body>
</html>
