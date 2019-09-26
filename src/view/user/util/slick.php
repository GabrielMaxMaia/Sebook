<div id="container">
  <section class="regular slider">
    <div>
      <img src="<?php echo _IMGBASE_ ?>livroHarry.jpg">
    </div>
    <div>
      <img src="<?php echo _IMGBASE_ ?>Livro-A-Culpa-e-das-Estrelas.jpg">
    </div>
    <div>
      <img src="<?php echo _IMGBASE_ ?>DepoisDeVoce_Jojo.jpg">
    </div>
    <div>
      <img src="<?php echo _IMGBASE_ ?>Livro-As-Cronicas-de-Gelo-e-Fogo-A-Danca-dos-Dragoes.jpg">
    </div>
    <div>
      <img src="<?php echo _IMGBASE_ ?>livroNeve.jpg">
    </div>
    <div>
      <img src="<?php echo _IMGBASE_ ?>livroPercy.jpg">
    </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="<?php echo _URLBASE_ ?>public/js/slick.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    $(document).on('ready', function() {
        $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
        });
    });
</script>