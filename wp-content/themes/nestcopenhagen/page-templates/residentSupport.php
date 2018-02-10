<?php
/**
 * Template Name: Resident Membership Page
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!--[if lt IE 9]>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
  <![endif]-->
  <script src="<?php bloginfo('template_url'); ?>/js/jquery-3.1.1.min.js"></script>
  <script>(function(){document.documentElement.className='js'})();</script>
  <?php wp_head(); ?>
  <script src="https://checkout.stripe.com/checkout.js"></script>
</head>

<body class="nt-support-page">

  <div class="nt-support-modal">
    <header class="nt-support-modal__header">
      <div class="nt-support-title">
        <img src="<?php bloginfo('template_url'); ?>/images/logosmall.svg"
          class="nt-support-title__logo"
        >
        <div>
          <h2 class="nt-support-title__header">Nest Resident</h2>
          <small class="nt-support-title__sub">Membership</small>
        </div>
      </div>

      <div class="nt-support-completed nt-support-completed--desktop">
        <h2 class="nt-support-completed__header">Welcome!</h2>
        <small class="nt-support-completed__sub">
          You're now a member of Nest Copenhagen, and are paying monthly to support our wonderful home. <br />
          Thank you!
        </small>
      </div>
    </header>
    <article class="nt-support-modal__content">

      <form id="form">

        <div class="nt-support-completed nt-support-completed--mobile">
          <h2 class="nt-support-completed__header">Welcome!</h2>
          <small class="nt-support-completed__sub">
            You're now a member of Nest Copenhagen, and are paying monthly to support our wonderful home. <br />
            Thank you!
          </small>
        </div>

        <div class="nt-support-amount">
          <div class="nt-support-amount__section" id="amount-pick">
            <h4 class="nt-support-amount__title">Choose an amount</h4>
            <div class="nt-support-amount__buttons">

              <label class="nt-support-amount__button">
                <input type="radio" name="amount" value="50">
                <div class="nt-button nt-support-amount__button">50 kr</div>
              </label>
              <label class="nt-support-amount__button">
                <input type="radio" name="amount" value="100" checked>
                <div class="nt-button nt-support-amount__button">100 kr</div>
              </label>
              <label class="nt-support-amount__button">
                <input type="radio" name="amount" value="300">
                <div class="nt-button nt-support-amount__button">300 kr</div>
              </label>
            </div>
          </div>

          <h4 class="nt-support-amount__or">OR</h4>

          <div class="nt-support-amount__section nt-support-amount__section--inactive" id="amount-type">
            <h4 class="nt-support-amount__title">Enter your own</h4>
            <input
              type="number"
              pattern="\d+"
              class="nt-input"
              placeholder="kr 437"
              name="type-amount"
              min="51"
            />
          </div>
        </div>

      </form>

    </article>
    <footer class="nt-support-modal__footer">
      <button class="nt-button nt-button--big" id="submit-button">Setup Membership!</button>
    </footer>
  </div>

  <script>

    var amountPickEl = document.querySelector('#amount-pick')
    var amountTypeEl = document.querySelector('#amount-type')
    var submitButtonEl = document.querySelector('#submit-button')

    var formEl = document.querySelector('#form')

    var INPUT_NAME_AMOUNT = 'amount'
    var INPUT_NAME_TYPE = 'type-amount'

    var amount = 0

    var handler = StripeCheckout.configure({
      key: "pk_live_S5mDjjIZYqRaC39miHb4jHy8",
      image: "https://stripe.com/img/documentation/checkout/marketplace.png",
      name: "Nest Resident",
      panelLabel: "Subscribe",
      allowRememberMe: false,
    })

    var handleInput = function (e) {
      var name = e.target.name
      if (name === INPUT_NAME_AMOUNT) {
        amountPickEl.classList.remove('nt-support-amount__section--inactive')
        amountTypeEl.classList.add('nt-support-amount__section--inactive')
      } else if (name === INPUT_NAME_TYPE) {
        amountPickEl.classList.add('nt-support-amount__section--inactive')
        amountTypeEl.classList.remove('nt-support-amount__section--inactive')
      }
      amount = Number(e.target.value)

      var isValid = amount >= 50
      submitButtonEl.disabled = !isValid
      if (isValid) {
        amount = Math.floor(amount / 10) * 10
      }
    }

    formEl.addEventListener('change', handleInput)
    formEl.addEventListener('keyup', handleInput)

    submitButtonEl.addEventListener('click', function (e) {
      handler.open({
        description: "Membership ("+ amount +" kr,- per month)",
        token: function(token, args) {
          var url = 'http://api.nestcopenhagen.dk/subscription.php'

          $.post(url, {
            amount: amount,
            token: token.id,
            email: token.email,
            type: 'resident',
          }).then(function () {
            $('.nt-support-modal').addClass('nt-support-modal--completed')
          })
        },
      });
      e.preventDefault();
    })

  </script>

</body>
</html>
