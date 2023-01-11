<?php get_header(); ?>

<main>
      <article class="single-project">
        <div class="single-project__container container container--size-large">
          <div class="single-project__hero row">
            <div class="single-project__hero-image col-12 col-md-6 col-lg-7 col-xxl-6">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" width="785" height="747" alt="project photo">
            </div>
            <div class="single-project__hero-main col-12 col-md-6 col-lg-5 col-xxl-6 order-md-first">
              <h1 class="single-project__title">
                <?php the_title(); ?>
              </h1>
              <div class="single-project__icon">
                <svg width="75" height="75">
                  <use xlink:href="#link-arrow"></use>
                </svg>
              </div>
              <div class="single-project__hero-text">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
          <section class="meta">
            <div class="row">
              <div class="col-12 col-lg-4" data-aos="fade-up">
                <div class="meta__image">
                  <img src="img/picture/single-project/1.jpg" alt="">
                </div>
              </div>
              <div class="col-12 col-lg-8">
                <div class="meta__info">
                  <div class="meta__info-item" data-aos="fade-up">
                    <span>
                      <span class="num">01.</span> Date
                    </span>
                    <span>15 January, 2021</span>
                  </div>
                  <div class="meta__info-item" data-aos="fade-up">
                    <span>
                      <span class="num">02.</span> Designer
                    </span>
                    <span>Paul</span>
                  </div>
                  <div class="meta__info-item" data-aos="fade-up">
                    <span>
                      <span class="num">03.</span> Client
                    </span>
                    <span>Themeforest</span>
                  </div>
                  <div class="meta__info-item" data-aos="fade-up">
                    <span>
                      <span class="num">04.</span> Project type
                    </span>
                    <span>Photography design</span>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="services-section single-project__services">
            <div class="row services-section__main">
              <div class="col-12 col-xxl-3" data-aos="fade-up">
                <div class="services-section__text">
                  <!-- TO-DO: Show The Service subtitle of first service listed here. -->
                  <?php 
                    $relatedServices = get_field('related_services');
                    echo get_the_excerpt($relatedServices[0]);
                  ?>
                </div>
              </div>
              <div class="col-12 col-xxl-9 services-section__right">
                <h2 class="services-section__title" data-aos="fade-up">Services</h2>
                <div class="services-section__image">
                  <div class="services-section__menu">
                    <ul class="services-section__list">
                      <?php 
                        foreach($relatedServices as $service) {
                      ?>
                          <li class="services-section__item" data-aos="fade-up">
                            <a class="services-section__link" href="<?php echo get_the_permalink($service); ?>"><?php echo get_the_title($service); ?><span>
                                <svg width="24" height="23">
                                  <use xlink:href="#link-arrow2"></use>
                                </svg>
                              </span>
                            </a>
                          </li>
                      <?php
                        }
                      ?>
                    </ul>
                  </div>
                  <img src="<?php echo get_the_post_thumbnail_url($relatedServices[0]); ?>" width="459" height="642" alt="">
                </div>
              </div>
            </div>
          </section>
          <section class="project-other">
          <h2 class="services-section__title" data-aos="fade-up">Other Projects</h2>
            <div class="row">
              <div class="col-12 col-md-6">
                <div class="project-other__image" data-aos="fade-up">
                  <img src="img/picture/single-project/3.jpg" alt="">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="project-other__image project-other__image--small" data-aos="fade-up">
                  <img src="img/picture/single-project/4.jpg" alt="">
                  <div class="project-other__text" data-aos="fade-up">Alienum phaedrum torquatos nec eu, detr periculis ex, nihil expetendis in mei. Mei an pericula euripidis hinc partem ei est.</div>
                </div>
              </div>
            </div>
          </section>
          <div class="single-project__next" data-aos="fade-up">
            <a href="#" target="_blank">Next
              <svg width="104" height="86">
                <use xlink:href="#arrow-right"></use>
              </svg>
            </a>
          </div>
        </div>
      </article>
    </main>

<?php get_footer(); ?>