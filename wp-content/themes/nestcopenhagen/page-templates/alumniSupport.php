<?php
/**
 * Template Name: Alumni Support Page
 */

get_header(); ?>

  <div class="container support-page">
    <div class="row">
      <div class="col-sm-12">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', 'page' ); ?>
        <?php endwhile; ?>

        <input type="number" name="amount" value="50" min="50" />
        <button class="btn btn-primary btn-large" id="payement-button">Subscribe</button>
      </div>
    </div>
  </div>



  <script src="https://checkout.stripe.com/checkout.js"></script>
  <script>
    var handler = StripeCheckout.configure({
      key: "pk_test_xk7dMb5zIu1MQgwmroGS4GCA",
      image: "https://stripe.com/img/documentation/checkout/marketplace.png",
      name: "Nest Alumni",
      panelLabel: "Donate!",
      allowRememberMe: false,
    });

    document.getElementById('payement-button').addEventListener('click', function(e) {
      var amount = Number(document.querySelector('input[name="amount"]').value)

      handler.open({
        description: "Donation ("+ amount +" kr,- per month)",
        token: function(token, args) {
          var url = 'http://api.nestcopenhagen.dk/subscription.php'
          var query = '?amount=' + amount +
            '&token=' + token.id +
            '&email=' + token.email +
            '&type=alumni';

          window.location.href = url + query
        },
      });
      e.preventDefault();
    });
  </script>


  <?php wp_footer(); ?>
</body>
</html>
