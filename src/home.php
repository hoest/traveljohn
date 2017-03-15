<?php get_header(); ?>
<?php
  $slug = get_post_field('post_name', get_post());
?>

<main class="<? echo $slug; ?>">
  <div class="yellow-bg">
    <div class="slide" data-slick='{
      "autoplay": true,
      "autoplaySpeed": 3000,
      "fade": true,
      "mobileFirst": true,
      "arrows": false,
      "dots": true
    }'>
      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/banner-logo.png" />
      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/banner/traveljohn.png" />
      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/banner/traveljane.png" />
      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/banner/traveljr.png" />
      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/banner/travelpuke.png" />
    </div>
  </div>
  <div class="payoff">
    <p>TravelJohn: The civilized solution. Anytime! Anywhere!</p>
  </div>
  <div class="cartoons">
    <div class="slide" data-slick='{
      "centerMode": true,
      "slidesToShow": 5,
      "slidesToScroll": 3,
      "autoplay": true,
      "autoplaySpeed": 4000,
      "arrows": false,
      "dots": false,
      "focusOnSelect": true
    }'>
      <div class="image">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cartoons/home.png" />
        <div class="image-text">Omschrijving</div>
      </div>
      <div class="image">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cartoons/emergency-1.png" />
        <div class="image-text">Omschrijving</div>
      </div>
      <div class="image">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cartoons/outdoors-1.png" />
        <div class="image-text">Omschrijving</div>
      </div>
      <div class="image">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cartoons/planes-1.png" />
        <div class="image-text">Omschrijving</div>
      </div>
      <div class="image">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cartoons/outdoors-2.png" />
        <div class="image-text">Omschrijving</div>
      </div>
      <div class="image">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cartoons/road-1.png" />
        <div class="image-text">Omschrijving</div>
      </div>
      <div class="image">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cartoons/outdoors-4.png" />
        <div class="image-text">Omschrijving</div>
      </div>
      <div class="image">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cartoons/road-2.png" />
        <div class="image-text">Omschrijving</div>
      </div>
    </div>
  </div>
  <div class="content inner-wrapper">
    <div class="content-inner">
      <h1>TravelJohn ™</h1>
      <p>TravelJohn is een unisex wegwerp plaszakje speciaal ontworpen
        voor elke gelegenheid, wanneer er geen toilet beschikbaar is.</p>
      <p>Hoge nood en geen toilet in de buurt? Geen nood. Met de TravelJohn
        heeft u altijd uw eigen wegwerptoilet bij de hand. Waar dan ook:
        de file, bij sport, op vakantie, op de camping, bij evenementen etc,
        etc. Voor iedereen: man, vrouw, meisje, jongen. Wel zo gemakkelijk.</p>
      <p>Te gebruiken in zittende en staande positie, dus ideaal voor
        rolstoelgebruikers.</p>
      <p>TravelJohn is gevuld met absorberende korrels, die bij aanraking
        met vloeistof veranderen in gel, meerdere malen te gebruiken tot een
        inhoud van 800 ml. Zeg maar twee volwassen plassen.</p>
      <p>TravelJohn is lekvrij en bovendien reukloos. Wel zo fris. Handig
        klein van stuk en dus reuze makkelijk op te bergen en mee te nemen.
        Bovendien kan de TravelJohn na gebruik zo in de afvalbak. Hij is
        gemaakt van biologisch afbreekbaar materiaal, dus milieuvriendelijk.</p>
    </div>
  </div>
</main>

<?php get_footer(); ?>
