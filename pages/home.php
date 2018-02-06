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
                <h2 class="section-heading text-white">Sobre Mim</h2>
                <hr class="light my-4">
                <p class="text-faded mb-4">Sou programador Front-End e Back-End, tenho 19 Anos sou graduado na Faculdade Alfa de Umuarama, estudante de Pós Graduação Web Dev.</p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="#services" title="Ir para pagina quem sou">O que Faço ?</a>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Serviços em que Realizo !</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-desktop text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Front-End</h3>
                    <p class="text-muted mb-0">O front-end é responsável em mostrar o visual da aplicação</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-cog text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Back-End</h3>
                    <p class="text-muted mb-0">O back-end é o contrarregra por trás dessa interface, que trabalha do lado do servidor</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-mobile text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Responsivo</h3>
                    <p class="text-muted mb-0">Aparência e disposição com base no tamanho da tela em que o site em é exibido</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-play-circle text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Video</h3>
                    <p class="text-muted mb-0">Um processo artístico onde uma coleção de material de vídeo (sequências) é compilada e alterada a partir de sua forma original para criar uma nova versão.</p>
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
                    <button type="submit" target="_blank" class="link-portifolio" title="Visualizar Portifólio <?php echo $id_categoria ?> ">Visualizar pagina</button>
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
    <form name="form1" id="form_contato" method="post" novalidate action="salvarcontato" enctype="multipart/form-data" onsubmit="return valida_form(this)">
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
                                <input type="text" required=""
                                       name="nome"
                                       class="form-control" value="<?= $nome_contato; ?>"
                                       data-validation-required-message="Preencha o Nome Completo" placeholder="Preencha seu nome completo" pattern="[a-zA-Z\s]+$">
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
                                       data-validation-required-message="Preencha o endereço de Email" placeholder="Preencha seu e-mail" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
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
                                       data-validation-required-message="Preencha o assunto" placeholder="Descreve sobre o assunto" pattern="[a-zA-Z\s]+$">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 ml-auto text-center">
                    <div class="control-group">
                        <label for="mensagem" class="control-label" style="text-align: left;width: 100%;">* Mensagem:</label>
                        <div class="controls">
                            <div class="panel-body">
                                <textarea type="text" required
                                          name="mensagem"
                                          class="form-control" value="<?= $mensagem_contato; ?>"
                                          data-validation-required-message="Descreva a Mensagem" rows="6" cols="40"  maxlength="500" style="resize: none;" placeholder="Número Maximo de Caracteres: 1000" pattern="[a-zA-Z\s]+$"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 20px; text" title="Enviar Formulário de Contato">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</section>


<section class="bg-dark text-white">
    <div class="container text-center">
        <h4 class="mb-4">Redes Sociais</h4>
        <a href="https://www.facebook.com/dudu18xb" target="_blank" title="Ir para o Perfil do Facebook">
            <i class="fa fa-facebook-square"></i>
        </a>
        <a href="https://www.instagram.com/dudu18xb/" target="_blank" title="Ir para o Perfil do Instagram">
            <i class="fa fa-instagram"></i>
        </a>
        <a href="https://twitter.com/dudu18XB" target="_blank" title="Ir para o Perfil do Twitter">
            <i class="fa fa fa-twitter"></i>
        </a>
        <a href="https://www.youtube.com/c/dudu18XB" target="_blank" title="Ir para o Canal do Youtube">
            <i class="fa fa-youtube-play"></i>
        </a>
        <a href="https://www.github.com/dudu18xb" target="_blank" title="Ir para o Perfil do GitHub">
            <i class="fa fa-github"></i>
        </a>
        <a href="https://plus.google.com/u/0/+dudu18XB" target="_blank" title="Ir para o Perfil do Google Plus">
            <i class="fa fa-google-plus-official"></i>
        </a>
        <a href="http://steamcommunity.com/id/dudu18xb" target="_blank"title="Ir para o Perfil da Steam">
            <i class="fa fa-steam-square"></i>
        </a>
    </div>
</section>
