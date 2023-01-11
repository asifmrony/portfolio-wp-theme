<?php get_header(); ?>

<main>
      <article <?php if(is_archive()) echo 'class="article services set-purple-bg"' ?>>
        <div class="article__container container container--size-large">
          <div class="row">
            <header class="article__header col-12 col-lg-7 col-xl-6">
              <h1 class="article__title">Our
                <br>services
              </h1>
              <div class="article__text">In the design process, they create both functional and beautiful things. The team possesses unique</div>
            </header>
            <?php
              $count = 1;
              while(have_posts()) {
                the_post();
                if($count == 1) {
                    $classes = 'services__item--first col-12 col-sm-6 col-lg-5 col-xl-6';
                } else if($count == 2) {
                    $classes = 'services__item--second services__item--margin-negative col-12 col-sm-6 col-lg-4';
                } else if($count == 3) {
                    $classes = 'services__item--third services__item--left-shift col-12 col-sm-6 col-lg-8';
                } else if($count == 4) {
                    $classes = 'services__item--last col-12 col-sm-6 col-lg-10 offset-lg-1';
                }
              ?>
                <div class="services__item <?php echo $classes; ?>" data-aos="">
                  <a class="service-preview" href="<?php the_permalink(); ?>">
                    <span class="service-preview__image">
                      <?php if(has_post_thumbnail()){
                        the_post_thumbnail();
                      } else {
                      ?>
                        <img src="<?php bloginfo('template_directory'); ?> /img/picture/services/1.jpg">
                      <?php
                      }
                      ?>
                    </span>
                    <span class="service-preview__caption">
                      <?php the_title(); ?>
                    </span>
                  </a>
                </div>
            <?php
              $count++;
              }
              ?>
              <div class="paginate-links">
                <?php echo paginate_links(); ?>
              </div>
          </div>
        </div>
      </article>
    </main>

<?php get_footer();
