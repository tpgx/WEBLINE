     
$(document).ready(function(){
                $('.loading').fadeIn("fast");
                var pagina = 1;
                $('.painel_veiculos ul').hide();
                $('.painel_veiculos ._1').show();
                $("input[name=\"btn_anterior\"]").attr("disabled", "disabled");
                if(total_paginas>1){$('#btn_proximo').show();}
                else{$('#btn_proximo').hide();$('#btn_anterior').hide();}
                $('.navegador input').click(function(){
                   $('html, body').animate({ scrollTop: 0 }, 1500);
                   $('.loading').fadeIn("fast");
                   $('.painel_veiculos ul').hide();
                    var botao = $(this).attr("id");
                    if(botao == "btn_proximo")pagina++;
                    else if(botao == "btn_anterior")pagina--;
                    if(pagina>1){$('#btn_anterior').show();$("input[name=\"btn_anterior\"]").removeAttr("disabled");}
                    if(pagina==total_paginas){$("input[name=\"btn_proximo\"]").attr("disabled", "disabled");}
                    if(pagina==1){$("input[name=\"btn_anterior\"]").attr("disabled", "disabled");}
                    if(pagina<total_paginas){$("input[name=\"btn_proximo\"]").removeAttr("disabled")}
                    $('.painel_veiculos ._'+pagina).fadeIn("slow");    
                    $('.pagina_atual').html('Pagina '+pagina+' de '+total_paginas);
                    $('.loading').delay(1000).fadeOut("fast");
                    
                });
                $('.pagina_atual').html('Pagina '+pagina+' de '+total_paginas);
            });
