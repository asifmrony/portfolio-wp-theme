<?php get_header(); ?>

<main>
      <article class="page-404">
        <div class="container page-404__container">
          <div class="page-404__wrapper">
            <div class="page-404__img">
              <img src="<?php bloginfo('template_directory');?>/img/picture/404.jpg" alt="">
            </div>
            <div class="page-404__content">
              <div class="page-404__title">404.</div>
              <div class="page-404__subtitle">The page you were looking for could
                <br> not be found.
              </div>
              <a class="btn" href="/">
                <span class="btn__text">Back home</span>
                <span class="btn__icon">
                  <svg width="19" height="19">
                    <use xlink:href="#link-arrow"></use>
                  </svg>
                </span>
              </a>
            </div>
          </div>
        </div>
      </article>
</main>
</div>
</div>

<?php get_footer(); ?>
