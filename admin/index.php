<!DOCTYPE html>
<html>
<head>
    <title>Painel Administrativo - Eduardo Rocha</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="format-detection" content="telephone=no">
    <title>Eduardo Rocha | HOME</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="theme-color" content="#f05f40">
    <meta name="nosnippets">
    <meta property='og:title' content='Desenvolvedor Web Umuarama| Eduardo Rocha | Home' />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Author: Eduardo Rocha,Desenvolvedor Web Front-End Umuarama, Desenvolvedor Web Front-End Maringa, Desenvolvedor Web Front-End Curitiba,
    Programador Front-End, Programador Back-End, Umuarama, PHP, HTML5, CSS3, JavaScript" />
    <meta name="keywords" content="Programador Front-End, Programador Back-End, HTML 5, PHP7, CSS3, JavaScript,Desenvolvedor Web Front-End Umuarama, Desenvolvedor Web Front-End Maringa, Desenvolvedor Web Front-End Curitiba, Programador Web Umuarama, Programador Front-End Umuarama" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no" />
    <meta name="author" content="Eduardo Rocha" />
    <meta name="Description" content="Author: A.N. Author,
    Illustrator: P. Picture, Category: Books, Price: $17.99,
    Length: 784 pages">
    <meta name="web_author" content="Eduardo Rocha" />
    <meta name="copyright" content="© Eduardo Rocha" />
    <meta name="robots" content="index,follow" />
    <meta name="rating" content="general" />
    <meta name="distribution" content="global">
    <meta property='og:description' content='Graduado em Sistemas para Internet, Estudante de Pós-graduação Web Dev na Faculdade Alfa de Umuarama, Curto muito Novidades na área de Front-End' />
    <meta property='og:url' content='http://eduardodev.com.br/admin' />
    <link href="../images/icon.png" rel="shortcut icon">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="alternate" href="http://eduardodev.com.br/admin" hreflang="pt-br" />

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-113196390-1');
    </script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Eduardo </b>Rocha</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Faça login para iniciar sua sessão</p>

        <form name="login" method="post" action="controller/verificar.php" novalidate>
        <div class="form-group has-feedback">
                <input type="text"
                       name="login" required
                       data-validation-required-message="Digite o login"
                       class="form-control" placeholder="Login">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password"
                       name="senha" required
                       data-validation-required-message="Digite sua senha" placeholder="Senha"
                       class="form-control">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div>
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
