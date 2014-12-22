<?php
include(MOBILE_DETECT);
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

$url = uri_string();
$url = explode('/', $url);
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="<?php echo $deviceType; ?> no-js" lang="pt-br" >
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title><?php echo NOME_CLIENTE; ?></title>
        <base href="<?php echo base_url('conteudo'); ?>/">
        <link rel="stylesheet" href="site/css/foundation.css" />
        <link rel="stylesheet" href="site/css/font-awesome/font-awesome.css" />
        <link href="site/css/royalslider.css" rel="stylesheet" type="text/css" />
        <link href="site/css/rs-minimal-white.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="site/css/style.css" />
        <link rel="shortcut icon" href="site/favicon.ico" />
        <script src="site/js/vendor/modernizr.js"></script>
        <script src="site/js/vendor/responsive-nav.min.js"></script>
    </head>
    <body class="<?php if (empty($url[0])) { echo 'index'; } else { echo $url[0]; } ?>">
        <!--inÃ­cio header-content-->
        <header id="header-content">
            <div class="outter-row bg-menu">
                <div class="row">
                    <div class="small-8 medium-4 large-4 columns">
                        <a href="<?php echo base_url(); ?>" class="logo" title="Bezerra de Souza Advogados"><img src="site/img/logo-bsa.png" alt="Bezerra de Souza Advogados"></a>
                    </div>
                    <div class="small-4 columns">
                        <button id="toggle" class="closed toggle"><i class="fa fa-bars fa-2x"></i></button>
                    </div>
                    <div class="small-12 medium-8 large-7 columns">
                        <nav id="nav-menu" class="nav-collapse">
                            <ul class="nav-menu">
                                <li <?php if (verificarPaginaAtiva('quem-somos')) echo 'class="ativo"'; ?>><span class="marcador"></span><a href="<?php echo base_url(); ?>quem-somos" title="Quem somos">Quem somos</a></li>
                                <li <?php if (verificarPaginaAtiva('equipe')) echo 'class="ativo"'; ?>><span class="marcador"></span><a href="<?php echo base_url(); ?>equipe" title="Equipe">Equipe</a></li>
                                <li <?php if (verificarPaginaAtiva('areas-de-atuacao')) echo 'class="ativo"'; ?>><span class="marcador"></span><a href="<?php echo base_url(); ?>areas-de-atuacao" title="Áreas de atuação">Áreas de atuação</a></li>
                                <li <?php if (verificarPaginaAtiva('contato')) echo 'class="ativo"'; ?>><span class="marcador"></span><a href="<?php echo base_url(); ?>contato" title="Contato">Contato</a></li>
                            </ul>
                        </nav>
                        <script>
                            var navigation = responsiveNav(".nav-collapse", {
                                insert: "before", customToggle: "#toggle"
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="outter-row bg-faixa"></div>
        </header>
        <!--fim header-content-->
        
        <?php echo $contents; ?>

        <!-- Footer Page Content-->
        <footer id="footer-content">
            <div class="outter-row bg-footer">
                <div class="row">
                    <div class="small-12 medium-6 large-6 columns">
                        <div class="address">
                            <a href="#" title="bezera de souza advogados">bezera de souza advogados</a>
                            <strong>bezera de souza advogados</strong>
                            <span><?php echo $rodape->endereco; ?>, <?php echo $rodape->bairro; ?><br> CEP: <?php echo $rodape->cep; ?>, <?php echo $rodape->cidade; ?> - <?php echo $rodape->estado; ?></span>
                        </div>
                    </div>


                    <div class="small-12 medium-4 large-4 columns">
                        <div class="pad-right"><strong>Fone: </strong> <?php echo $rodape->telefone; ?></div>
                        <div class="pad-right"><strong>E-mail:</strong> <?php echo $rodape->email; ?></div>
                    </div>

                    <div class="small-12 medium-2 large-2 columns">
                        <a href="#" title="Desenvolvido por Plano4" id="plano4">
                            Desenvolvido por Plano4
                        </a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Page Content--> 
        <script src="site/js/vendor/jquery.js"></script> 
        <script src="site/js/foundation.min.js"></script> 
        <script src="site/js/vendor/jquery.royalslider.min.js"></script>
        <script src="site/js/main.js"></script> 
        <script src="site/js/isotope.pkgd.js"></script> 

        <script>
                $(document).foundation();
        </script>
        

        <script>
              jQuery(document).ready(function($) {
           $('#full-width-slider').royalSlider({
    arrowsNav: false,
    loop: true,
    keyboardNavEnabled: true,
    controlsInside: false,
    imageScaleMode: 'fill',
    arrowsNavAutoHide: false,
    autoScaleSlider: false, 
    autoScaleSliderWidth: 970,     
    autoScaleSliderHeight: 449,
    controlNavigation: 'bullets',
    thumbsFitInViewport: false,
    navigateByClick: true,
    startSlideId: 0,
    autoPlay: false,
    transitionType:'move',
    globalCaption: true,
    deeplinking: {
      enabled: true,
      change: false
    },
    /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
    imgWidth: 1600,
    imgHeight: 449
  });
          
          $('#container').isotope({
            // options...
            itemSelector: '.item',
            masonry: {
            }
        });
        });

        </script>
        <!--<a class="scrollup" href="#main-content" title="ir para o inÃ­cio do conteÃºdo">ir para o inÃ­cio do conteÃºdo</a> -->
    </body>
</html>