
<footer>
  <div id="logo-footer"></div>
  <div id="pagina-construccion">Página en construcción</div>
</footer>
<script>
$(document).ready(function() {
    $(window).scroll(function() {
        if($(window).scrollTop() > 150){
            $('#menu').addClass('menu-fixed');
        }else{
            $('#menu').removeClass('menu-fixed');   
        }
    });
});
</script>
</div>
</body>
</html>

