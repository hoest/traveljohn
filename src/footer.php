      <footer>
        <div class="inner-wrapper">
          <div class="copy">&#169; <?php echo date("Y"); ?> - TravelJohn</div>

          <ul>
            <li><a href="http://www.traveljohn.com/privacy-policy/">Private Policy</a></li>
            <li><a href="http://www.traveljohn.com/terms-and-conditions/">Terms And Conditions</a></li>
            <li><a href="http://www.traveljohn.com/legal-notice/">Legal Notices</a></li>
            <li><a href="/nl">Nederlands</a></li>
            <li><a href="/en">English</a></li>
          </ul>
        </div>
      </footer>

    </div>

    <script
      src="//code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>

    <script type="text/javascript">
      $('.slide').slick();

      $('[data-fancybox]').fancybox({
        image : {
          protect: true
        }
      });

      $('.mobile-menu').on('click', function() {
        $(this).closest('nav').find('.menu').toggleClass('show');
      });
    </script>

    <?php wp_footer(); ?>
  </body>
</html>
