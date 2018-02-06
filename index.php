<?php include "controller/conecta.php" ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- <base href="https://eduardodev.com.br"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="format-detection" content="telephone=no">
    <title>Eduardo Rocha | HOME</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="theme-color" content="#f05f40">
    <meta name="nosnippets">
    <meta property='og:title' content='Programador Front-End | Eduardo Rocha | Home' />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Author: Eduardo Rocha,Desenvolvedor Web Front-End Umuarama, Desenvolvedor Web Front-End Maringa, Desenvolvedor Web Front-End Curitiba,
    Programador Front-End, Programador Back-End, Umuarama, PHP, HTML5, CSS3, JavaScript" />
    <meta name="keywords" content="Programador Front-End, Programador Back-End, HTML 5, PHP7, CSS3, JavaScript,Desenvolvedor Web Front-End Umuarama, Desenvolvedor Web Front-End Maringa, Desenvolvedor Web Front-End Curitiba, Programador Web Umuarama, Programador Front-End Umuarama" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no" />
    <meta name="author" content="Eduardo Rocha" />
    <meta name="web_author" content="Eduardo Rocha" />
    <meta name="copyright" content="© Eduardo Rocha" />
    <meta name="robots" content="index,follow" />
    <meta name="rating" content="general" />
    <meta name="distribution" content="global">
    <link rel="alternate" href="http://eduardodev.com.br" hreflang="pt-br" />
    <meta property='og:description' content='Graduado em Sistemas para Internet, Estudante de Pós-graduação Web Dev na Faculdade Alfa de Umuarama, Curto muito Novidades na área de Front-End' />
    <meta property='og:url' content='http://eduardodev.com.br/' />
    <!-- Bootstrap core CSS -->
    <link href="images/icon.png" rel="shortcut icon">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top" title="Home">Eduardo Rocha</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about" title="Sobre Mim" alt="Sobre Mim">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services" title="Serviços" alt="Serviços">Serviços</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#portfolio" title="Portifólio" alt="Portifólio">Portfólio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact" title="Entre em Contato" alt="Contato">Contato</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>
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
</main>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/eduardo.js"></script>
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
<script>
    $(function(){
        $("#form_contato").validate();
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    });

</script>

<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-113196390-1');
</script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/creative.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113196390-1"></script>

</body>

</html>
