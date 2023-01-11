<footer class="footer __js_fixed-footer">
      <div class="footer__container container container--size-large">
        <div class="footer__grid">
          <a class="footer__logo">
            <svg width="59" height="242">
              <use xlink:href="#vertical-logo"></use>
            </svg>
          </a>
          <div class="footer__phone">
            <a href="tel:+8801793726776">+880 1793 726 776</a>
          </div>
          <div class="footer__menu">
            <div class="footer__title">Quick Links</div>
            <ul class="footer__menu-list">
              <li class="footer__menu-item">
                <a class="footer__menu-link" href="<?php echo site_url(); ?>">Home</a>
              </li>
              <li class="footer__menu-item">
                <a class="footer__menu-link" href="<?php echo site_url('/about-us'); ?>">About us</a>
              </li>
              <li class="footer__menu-item">
                <a class="footer__menu-link" href="<?php echo site_url('/blog'); ?>">Blog</a>
              </li>
              <li class="footer__menu-item">
                <a class="footer__menu-link" href="<?php echo site_url('/contact-us'); ?>">Contact</a>
              </li>
              <li class="footer__menu-item">
                <a class="footer__menu-link" href="<?php echo get_post_type_archive_link('project'); ?>">Portfolio</a>
              </li>
            </ul>
          </div>
          <div class="footer__menu">
            <div class="footer__title">Follow</div>
            <ul class="footer__menu-list">
              <li class="footer__menu-item">
                <a class="footer__menu-link" href="#">Facebook</a>
              </li>
              <li class="footer__menu-item">
                <a class="footer__menu-link" href="#">Twitter</a>
              </li>
              <li class="footer__menu-item">
                <a class="footer__menu-link" href="#">Instagram</a>
              </li>
              <li class="footer__menu-item">
                <a class="footer__menu-link" href="#">LinkedIn</a>
              </li>
            </ul>
          </div>
          <div class="footer__feedback">
            <div class="footer__title">Sign up to our newsletter</div>
            <form class="footer__feedback-form" action="#" method="post">
              <label class="footer__feedback-field field">
                <input type="email" name="email">
                <span class="field__hint">E-mail</span>
              </label>
              <button class="footer__feedback-send arrow-btn arrow-btn--size-large" type="button">
                <svg width="75" height="75">
                  <use xlink:href="#link-arrow"></use>
                </svg>
              </button>
            </form>
            <div class="footer__feedback-notice">This site is protected by reCAPTHCHA and the <a href="#" target="_blank">Google Privacy Policy</a> and <a href="#" target="_blank">Terms of Service apply</a>.</div>
          </div>
          <div class="footer__bottom">
            <div class="footer__copyright">© Centrix 2021. All Rights Resevered</div>
            <a class="footer__privacy" href="<?php echo site_url('/privacy-policy'); ?>">Privacy Policy</a>
          </div>
        </div>
      </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
