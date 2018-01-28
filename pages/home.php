<?php

$sql = "select * from banner order by id desc limit 1"; // buscando os banners
$consulta = $con->prepare($sql);
$consulta->execute();
while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
    $id_banner = $dados->id;
    $titulo_banner = $dados->titulo;
    $texto_banner = $dados->texto;
    $foto_banner = $dados->foto;
    $foto_banner = "images/banner/$foto_banner";
    $foto_banner = $foto_banner . "g.jpg";
}
?>

<header class="masthead text-center text-white d-flex" style="background-image:url('<?php echo $foto_banner; ?>');">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                    <strong><?php echo $titulo_banner ?></strong>
                </h1>
                <hr>
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5"><?php echo $texto_banner ?></p>
                <a class="bt'n btn-primary btn-xl js-scroll-trigger" href="#about">Sobre Mim</a>
            </div>
        </div>
    </div>
</header>

<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading text-white">We've got what you need!</h2>
                <hr class="light my-4">
                <p class="text-faded mb-4">Start Bootstrap has everything you need to get your new website up and
                    running in no time! All of the templates and themes on Start Bootstrap are open source, free to
                    download, and easy to use. No strings attached!</p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">At Your Service</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Sturdy Templates</h3>
                    <p class="text-muted mb-0">Our templates are updated regularly so they don't break.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Ready to Ship</h3>
                    <p class="text-muted mb-0">You can use this theme as is, or you can make changes!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Up to Date</h3>
                    <p class="text-muted mb-0">We update dependencies to keep things fresh.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Made with Love</h3>
                    <p class="text-muted mb-0">You have to make your websites with love these days!</p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
$sql = "
                        select
                        p.id,
                        c.nome categoria,
                        p.nome nome,
                        p.url url,
                        p.foto
                        from portifolio p
                        inner join categoria c on (p.id_categoria = c.id) 
                        order by p.id desc limit 6
                        ";
$consulta = $con->prepare($sql);
$consulta->execute();
while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
    $id_portifolio = $dados->id;
    $id_categoria = $dados->categoria;
    $nome_portifolio = $dados->nome;
    $url_portifolio = $dados->url;
    $foto_portifolio = $dados->foto;
    $foto_portifolio = "images/thumbnails/$foto_portifolio";
    $foto_portifolio = $foto_portifolio . "g.jpg";
}
?>
<section class="p-0" id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="<?php echo $foto_portifolio ?>" title="<?php echo $nome_portifolio ?>">
                    <img class="img-fluid" src="<?php echo $foto_portifolio ?>" alt="<?php echo $nome_portifolio ?>"
                         title="<?php echo $nome_portifolio ?>">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <?php echo $id_categoria ?>
                            </div>
                            <div class="project-name">
                                <?php echo $nome_portifolio ?>
                            </div>
                        </div>
                    </div>
                </a>
                <form action="<?php echo $url_portifolio ?>" target="_blank">
                    <button type="submit" target="_blank" class="link-portifolio">Visualizar pagina</button>
                </form>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
                <form action="<?php echo $url_portifolio ?>" target="_blank">
                    <button type="submit" target="_blank" class="link-portifolio">Visualizar pagina</button>
                </form>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
                <form action="<?php echo $url_portifolio ?>" target="_blank">
                    <button type="submit" target="_blank" class="link-portifolio">Visualizar pagina</button>
                </form>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
                <form action="<?php echo $url_portifolio ?>" target="_blank">
                    <button type="submit" target="_blank" class="link-portifolio">Visualizar pagina</button>
                </form>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
                <form action="<?php echo $url_portifolio ?>" target="_blank">
                    <button type="submit" target="_blank" class="link-portifolio">Visualizar pagina</button>
                </form>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
                    <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
                <form action="<?php echo $url_portifolio ?>" target="_blank">
                    <button type="submit" target="_blank" class="link-portifolio">Visualizar pagina</button>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
//edição dos dados
$id_contato = $nome_contato = $email_contato = $assunto_contato = $mensagem_contato = "";
if (isset($_GET["id"])) {
    $id = trim($_GET["id"]);
    //sql para selecionar a categoria
    $sql = "select * from contato where id = ? limit 1";
    $consulta = $con->prepare($sql);
    $consulta->bindParam(1, $id);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);
    //separar os dados
    $id_contato = $dados->id;
    $nome_contato = $dados->nome;
    $email_contato = $dados->email;
    $assunto_contato = $dados->assunto;
    $mensagem_contato = $dados->mensagem;
}
?>
<section id="contact">
    <form name="form1" method="post" novalidate action="salvarcontato" enctype="multipart/form-data"
          onsubmit="return valida_form(this)">
        <input type="hidden" name="id"
               class="form-control" value="<?= $id_contato; ?>" readonly>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-heading">Entre em Contato</h2>
                    <hr class="my-4">
                    <p class="mb-5">Você pode entrar em contato atráves desse formulário</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 ml-auto text-center">
                    <div class="control-group">
                        <label for="nome" class="control-label" style="text-align: left;width: 100%;">* Nome:</label>
                        <div class="controls">
                            <div class="panel-body">
                                <input type="text" required
                                       name="nome"
                                       class="form-control" value="<?= $nome_contato; ?>"
                                       data-validation-required-message="Preencha o Nome Completo"
                                       placeholder="Preencha seu Nome completo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 ml-auto text-center">
                    <div class="control-group">
                        <label for="email" class="control-label" style="text-align: left;width: 100%;">* E-mail:</label>
                        <div class="controls">
                            <div class="panel-body">
                                <input type="text" required
                                       name="email"
                                       class="form-control" value="<?= $email_contato; ?>"
                                       data-validation-required-message="Preencha o E-mail Completo"
                                       placeholder="Preencha seu E-mail completo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 ml-auto text-center">
                    <div class="control-group">
                        <label for="assunto" class="control-label" style="text-align: left;width: 100%;">* Assunto:</label>
                        <div class="controls">
                            <div class="panel-body">
                                <input type="text" required
                                       name="assunto"
                                       class="form-control" value="<?= $assunto_contato; ?>"
                                       data-validation-required-message="Preencha o Assunto Completo"
                                       placeholder="Preencha seu Assunto completo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 ml-auto text-center">
                    <div class="control-group">
                        <label for="email" class="control-label" style="text-align: left;width: 100%;">* Mensagem:</label>
                        <div class="controls">
                            <div class="panel-body">
                                <textarea type="text" required
                                          name="mensagem"
                                          class="form-control" value="<?= $mensagem_contato; ?>"
                                          data-validation-required-message="Descreva a Mensagem" rows="6" cols="40"  maxlength="500" style="resize: none;" placeholder="Número Maximo de Caracteres: 1000"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 20px; text">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</section>


<section class="bg-dark text-white">
    <div class="container text-center">
        <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
        <a class="btn btn-light btn-xl sr-button" href="http://startbootstrap.com/template-overviews/creative/">Download
            Now!</a>
    </div>
</section>
