			   

<script src="{{url('/js/style.js')}}"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> -->
<script defer src="{{url('/js/jquery.flexslider.js')}}"></script>
  <script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: true,
        itemWidth: 300,
        itemMargin: 15,
        controlNav: false,
      });
    });
  </script>

</body>
</html>