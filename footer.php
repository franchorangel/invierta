
<footer>
  <div id="logo-footer"></div>
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66096644-1', 'auto');
  
  ga('create', 'UA-54925436-4', 'auto', {'name':'mov'});
  
  ga('send', 'pageview');

  ga('mov.send', 'pageview');

</script>
</div>
</body>
</html>

