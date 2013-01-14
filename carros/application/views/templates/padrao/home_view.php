<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="author" content="Tiago Geremias" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>  
        <title>:: Home View ::</title>
        <link type="text/css" rel="stylesheet" media="screen" href="<?php echo $dados_site['template']['css_directory']; ?>estilo.css" />
        <script>var total_paginas = <?php echo $total_paginas; ?>;</script>
        <script type="text/javascript" src="<?php echo $dados_site['template']['js_directory']; ?>template.js"></script>
        
        
    </head>
    <body>
        <div id="corpo_pagina">
            <div class="menu_topo">
                <p class="welcome">Bem vindo ao site da SisVeic</p>
            </div>
            <div id="topo">
                <img class="logo" src="<?php echo $dados_site['template']['template_imgens']; ?>logo.png" />
                <span class="space"></span>
                <span class="publicidade_468x60">
                    Publicidade 468x60 Pixels
                </span>
            </div>
            <div id="busca">
                
            </div>
            <div class="loading">
                <img src="http://sicnoticias.sapo.pt/skins/sicnot/gfx/loading2.gif" width="124" height="124" />
                
            </div>
            <?php $y = 0; ?>
            <div class="painel_veiculos">
                <?php for($x=0;$x<$total_paginas;$x++): ?>
                <ul class="pagina _<?php echo $x+1; ?>">
                    <?php for($z = 0; $z < $itens_por_pagina; $z++): ?>
                    <li>
                        <img class="imagem_veiculos" src="<?php echo $dados_site['template']['template_imgens']; ?>sem_foto.png" width="160" height="120" />
                        <p><?php echo $veiculos_home[$y]['nome_marca']; ?> <?php echo $veiculos_home[$y]['nome_modelo']; ?> <?php echo $veiculos_home[$y]['motor_carro']; ?> <?php echo $veiculos_home[$y]['ano']; ?> <?php echo $veiculos_home[$y]['nome_combustivel']; ?></p>
                        <br />
                        <p>Categoria: <?php echo $veiculos_home[$y]['nome_tipo']; ?></p>
                        <p>Sub-categoria: <?php echo $veiculos_home[$y]['nome_sub_categoria']; ?></p>
                        
                    </li>
                    <?php $y++; endfor; ?>
                </ul>
                <?php endfor; ?>
                <div class="lateral_esquerda">
                    s
                </div>
                <div class="navegador">
                    <input type="button" name="btn_anterior" id="btn_anterior" value="Anterior" />
                    <span class="pagina_atual"></span>
                    <input type="button" name="btn_proximo" id="btn_proximo" value="Proximo" />
                </div>
                
                <script>
                $(window).load(function() {
                    $('.loading').delay(1000).fadeOut("fast");
                });
                </script>
                <div class="clear"></div>
            </div>
            <footer>
                <div class="rodape">
                    <span class="colunas">
                        <span class="social_icons">
                            <img src="<?php echo $dados_site['template']['template_imgens']; ?>fb_1.png" />
                            <img src="<?php echo $dados_site['template']['template_imgens']; ?>google_plus.png" />
                            <img src="<?php echo $dados_site['template']['template_imgens']; ?>twitter_1.png" />
                            <img src="<?php echo $dados_site['template']['template_imgens']; ?>you_tube.png" />
                            <img src="<?php echo $dados_site['template']['template_imgens']; ?>skype.png" />
                            <img src="<?php echo $dados_site['template']['template_imgens']; ?>microsoft.png" />
                        </span>
                        <p>
                            SISVEIC Sistema para revenda de veículos<br />
                            &copy; 2013 Todos os direitos reservados.
                        </p>
                    </span>
                </div>
            </footer>
        </div>
        
    </body>
</html>
