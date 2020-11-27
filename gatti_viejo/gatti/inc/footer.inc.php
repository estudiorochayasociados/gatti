<div style="position: fixed;bottom:20px;left:30px;z-index: 999">
      <a target="_blank" title="contactate via Facebook" href="https://m.me/gattisa" style="vertical-align:middle;box-shadow:0px 0px 10px #333;font-size:12px;padding:10px;border-radius:5px;background-color:#1787fb;color:white;text-shadow:none;">
        <i class="fab fa-lg fa-facebook-messenger"></i> <span class="hidden-xs hidden-sm">Contactate vía</span> Facebook
      </a> &nbsp; 
      <a target="_blank" title="contactate via WhatsApp" href="https://wa.me/5493564589747" style="vertical-align:middle;box-shadow:0px 0px 10px #333;font-size:12px;padding:10px;border-radius:5px;background-color:#189D0E;color:white;text-shadow:none;">
        <i class="fab fa-lg fa-whatsapp"></i>  <span class="hidden-xs hidden-sm">Contactate vía</span> WhatsApp
      </a>
    </div>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">



    <div class="clearfix"></div>
    <div style="width:100%;background:#F8E002;">
      <center class="container">
        <a href="https://perfil.mercadolibre.com.ar/gattisa" target="_blank"><img src="<?php  echo BASE_URL ?>/img/banner-mercadolibre.jpg" alt="mercadolibre" style="width: 60%"></a>
      </center>
    </div>
    <div class="clearfix"></div> 
    <footer>

      <div class="container">
        <div class="col-md-6 col-xs-12 col-sm-12">
          <h3><i class="fa fa-caret-right"></i> redesSociales</h3>
          <?php  Traer_Contenidos("facebook"); ?>
          <h3><i class="fa fa-caret-right"></i> menu</h3>
          <ul class="footerMenu">
            <li><a href="<?php  echo BASE_URL ?>/index" title="index">inicio</a></li><br/>
            <li><a href="<?php  echo BASE_URL ?>/nosotros" title="nosotros">nosotros</a></li><br/>
            <li><a href="<?php  echo BASE_URL ?>/productos" title="productos">productos</a></li><br/>
            <li><a href="<?php  echo BASE_URL ?>/novedades" title="novedades">novedades</a></li><br/>
            <li><a href="<?php  echo BASE_URL ?>/videos" title="videos">videos</a></li><br/>
            <li><a href="<?php  echo BASE_URL ?>/contacto" title="contacto">contacto</a></li><br/><br/>
            <img src="<?php  echo BASE_URL ?>/img/exportadores.png" alt="exportadores de argentina" width="40%">
          </ul>
        </div> 
        <div class="col-md-6 col-xs-12 col-sm-12">
          <h3><i class="fa fa-caret-right"></i> contacto</h3> 
          <br/>
          <b>CENTRAL HOUSE</b><br/>
          Rosario de Santa Fe 298 / San Francisco / Cba.<br/>
          Whatsapp: +54 9 (3564) 589747<br/>
          Tel: (03564) 420619 / 421022<br/>
          casacentral@gattisa.com.ar <br/>
          ventas@gattisa.com.ar<br/>
          <br/>
          <b>SUC. BUENOS AIRES</b><br/>
          Independencia 998 / (C1099AAW) Buenos Aires<br/>
          Whatsapp:+54 9 (11) 58917312<br/>
          Tel: (011) 4300-0607 / 0421<br/>
          buenosaires@gattisa.com.ar<br/>
          <br/>
          <b>SUC. ROSARIO</b><br/>
          Salta 2998 esq. Suipacha / (S2002KTJ) Rosario<br/>
          Whatsapp: +54 9 (341) 6548296<br/>
          Tel: (0341) 4354452<br/>
          rosario@gattisa.com.ar<br/>
          <div class="clearfix"></div>
          <a target="_blank" title="facebook" href="https://www.facebook.com/gattisa/"><i style="font-size: 30px;margin-right: 10px;margin-top: 10px;color:#fff" class="fab fa-facebook-square"></i></a>
          <a target="_blank" title="twitter" href="https://twitter.com/gattivent"><i style="font-size: 30px;margin-right: 10px;margin-top: 10px;color:#fff" class="fab fa-twitter-square"></i></a>
          <a target="_blank" title="instagram" href="https://www.instagram.com/gattiventilacion/"><i style="font-size: 30px;margin-right: 10px;margin-top: 10px;color:#fff" class="fab fa-instagram"></i></a>
          <a target="_blank" title="youtube" href="https://www.youtube.com/channel/UC7G9zR9o0vymBSb63dSvkLA"><i style="font-size: 30px;margin-right: 10px;margin-top: 10px;color:#fff" class="fab fa-youtube-square"></i></a>
        </div>     
      </div>  
    </footer>
    <div style="background:#111;padding:4px 0px;color:#999;font-size:12px">
      <div class="container">
    2017 · Realizado por Estudio Rocha & Asociados
      </div>
    </div>

    <script src="<?php echo BASE_URL ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL ?>/lightbox/lightbox.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL ?>/js/slick.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.masVistos').slick({
          dots: false,
          infinite: true,
          speed: 300, 
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
          ]
        });

        $('.galeriaInvestigacion').slick( {
         autoplay: true,
         autoplaySpeed: 2000,
       });

        $('.masVistosNotas').slick({
          dots: false,
          infinite: true,
          speed: 300,
          slidesToShow: 1,
          centerMode: true,
          variableWidth: true,
          autoplay: true,
          autoplaySpeed: 4000,

        });

      });
    </script>

    

    <script>var dolar = $('.dolar').text();</script>


    <script>
      $(function() {
       $('[data-toggle="tooltip"]').tooltip()
     })
   </script>

   <!-- lightox video -->
   <script>
    $(function() {
      $(".video").click(function () {
        var theModal = $(this).data("target"),
        videoSRC = $(this).attr("data-video"),
        videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
        $(theModal + ' iframe').attr('src', videoSRCauto);
        $(theModal + ' button.close').click(function () {
          $(theModal + ' iframe').attr('src', videoSRC);
        });
      });
    }); 

  </script>

<script>    // local storage o cookie
if(localStorage.getItem('idChat') != '' && localStorage.getItem('idChat') !== null ) {
  sector(localStorage.getItem('idChat'));
  $(".headerTopProvincias").hide();
}
function sector(id){ 
  localStorage.setItem('idChat',id);
  switch(id) {
    case "1":
    var codigo = "5accaf604b401e45400e8129";      
    break;
    case "2":
    var codigo = "5accafa94b401e45400e8131";      
    break;
    case "3":
    var codigo = "5accafd04b401e45400e8133";      
    break;
  }
  $(".headerTopProvincias").hide();
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function (){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/'+codigo+'/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
  })();   
}
</script>