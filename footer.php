
<footer>
  <div id="logo-footer"></div>
</footer>
<script>
  $(window).scroll(function () {
      if ($(window).scrollTop() > 150) {
          $('#menu').addClass('menu-fixed');
      } else {
          $('#menu').removeClass('menu-fixed');
      }
  });

  $( window ).resize(function() {
    if($( window ).width() >= 950){
      $("#menu-home ul").show();
    } else {
      $("#menu-home ul").hide();
    }
  });



  $(".menu #menu-trigger").click(function () {
      $(".menu ul").slideToggle();
      $(".menu .icon-bar:nth-child(2)").toggle();
      $(".menu .icon-bar:nth-child(1)").toggleClass("rotate-r");
      $(".menu .icon-bar:nth-child(3)").toggleClass("rotate-l");
  });

  $("#menu-home ul li a").click(function () {
      if($( window ).width() <= 950){
        $("#menu-home ul").slideUp();
      }
      $(".menu .icon-bar:nth-child(2)").show();
      $(".menu .icon-bar:nth-child(1)").removeClass("rotate-r");
      $(".menu .icon-bar:nth-child(3)").removeClass("rotate-l");
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
