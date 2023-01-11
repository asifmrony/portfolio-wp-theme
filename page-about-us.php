<?php get_header(); ?>

<main>
      <article class="about-us">
        <div class="first-banner about-us__banner">
          <div class="first-banner__image">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" width="1920" height="1100" alt="" />
          </div>
          <div class="container container--size-large">
            <h1 class="first-banner__title heading heading--size-large">We create
              <br>
              <span>digital</span> products
            </h1>
          </div>
        </div>
        <section class="about-video-section about-us__stat">
          <div class="about-video-section__container container container--size-large">
            <div class="row">
              <div class="about-video-section__main col-12 col-md">
                <div class="about-video-section__title" data-aos="fade-up">
                    <?php the_field('about_subtitle'); ?>
                </div>
                <div class="row align-items-end">
                  <div class="col-4 col-md-5 col-xl-4" data-aos="fade-up">
                    <a class="about-video-section__more arrow-link" href="about-us.html">
                      <span class="arrow-link__text"><?php the_title(); ?></span>
                      <span class="arrow-link__icon">
                        <svg width="75" height="75">
                          <use xlink:href="#link-arrow"></use>
                        </svg>
                      </span>
                    </a>
                  </div>
                  <div class="col-8 col-md-7 col-xl-8" data-aos="fade-up">
                      <div class="about-video-section__text"><?php echo wp_trim_words(get_the_content(), 45) ?></div>
                  </div>
                </div>
              </div>
              <div class="about-video-section__aside col-12 col-md order-first order-md-0" data-aos="fade-up">
                <div class="about-video-section__video video-block">
                    <img src="<?php $aboutUSImage = get_field('about_image'); echo $aboutUSImage['url']; ?>" width="810" height="539" alt="About us video">
                    <a class="video-block__btn play-btn" data-fancybox href="<?php the_field('about_video'); ?>" aria-label="Play button">
                      <svg width="17" height="19">
                        <use xlink:href="#triangle"></use>
                      </svg>
                    </a>
                  </div>
              </div>
            </div>
          </div>
          <div class="about-video-section__statistics statistics">
            <div class="statistics__container container">
              <div class="row justify-content-between">
                <div class="statistics__item col-6 col-md-auto" data-aos="fade-up">
                  <div class="statistics__item-value">
                    <span class="__js_number" data-end-value="25">0</span>
                  </div>
                  <div class="statistics__item-text">managers</div>
                </div>
                <div class="statistics__item col-6 col-md-auto" data-aos="fade-up">
                  <div class="statistics__item-value">
                    <span class="__js_number" data-end-value="200">0</span>
                  </div>
                  <div class="statistics__item-text">the person
                    <br>in the team
                  </div>
                </div>
                <div class="statistics__item col-6 col-md-auto" data-aos="fade-up">
                  <div class="statistics__item-value">
                    <span class="__js_number" data-end-value="15">0</span>
                  </div>
                  <div class="statistics__item-text">Years
                    <br>experience
                  </div>
                </div>
                <div class="statistics__item col-6 col-md-auto" data-aos="fade-up">
                  <div class="statistics__item-value">
                    <span class="__js_number" data-end-value="7">0</span>
                  </div>
                  <div class="statistics__item-text">awards and
                    <br>accolades
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="our-services about-us__services">
          <div class="our-services__container container container--size-large">
            <header class="our-services__header">
              <div class="row align-items-baseline">
                <div class="col-12 col-md-6 col-lg-5" data-aos="fade-up">
                  <h2 class="our-services__title">Our services</h2>
                </div>
                <div class="col-12 col-md-auto col-xl-2 ml-auto text-md-right" data-aos="fade-up">
                  <a class="our-services__more arrow-link--white arrow-link" href="<?php echo get_post_type_archive_link('service'); ?>">
                    <span class="arrow-link__text">View all</span>
                    <span class="arrow-link__icon">
                      <svg width="75" height="75">
                        <use xlink:href="#link-arrow"></use>
                      </svg>
                    </span>
                  </a>
                </div>
              </div>
            </header>
            <div class="our-services__accordion accordion">
            <?php 
                $homepageService = new WP_Query(array(
                  'posts_per_page' => 4,
                  'post_type' => 'service'
                ));

                while($homepageService->have_posts()) {
                  $homepageService->the_post(); ?>
                    <div class="accordion__item" data-aos="fade-up">
                      <button class="accordion__item-header" type="button">
                        <span class="row align-items-md-center">
                          <span class="accordion__item-title col-11 col-md-6"><?php the_title(); ?></span>
                          <span class="accordion__item-short col-11 col-md-5">
                            <?php
                              $serviceSubtitle = get_field('service_subtitle'); 
                              if($serviceSubtitle) {
                                echo $serviceSubtitle;
                              } else {
                                echo wp_trim_words(get_the_content(), 18);
                              }
                            ?>
                          </span>
                        </span>
                      </button>
                      <div class="accordion__item-body">
                        <div class="row">
                          <div class="accordion__item-left col-12 col-md-6">
                            <?php $serviceImageOne = get_field('service_image_one');
                              if($serviceImageOne) {
                            ?>
                                <img src="<?php echo $serviceImageOne['url']; ?>" width="810" height="530">
                            <?php 
                              } else {
                            ?>
                                <img src="<?php bloginfo('template_directory'); ?> /img/picture/mono/accordion-large.jpg" width="810" height="530" alt="Concept">
                            <?php
                              }
                            ?>
                          </div>
                          <div class="accordion__item-right col-12 col-md-6">
                          <?php $serviceImageTwo = get_field('service_image_two');
                              if($serviceImageTwo) {
                            ?>
                                <img src="<?php echo $serviceImageTwo['url']; ?>" width="348" height="287">
                            <?php 
                              } else {
                            ?>
                                <img src="<?php bloginfo('template_directory'); ?> /img/picture/mono/accordion-small.jpg" width="348" height="287" alt="Concept">
                            <?php
                              }
                            ?>
                            <div class="accordion__item-text"><?php the_content(); ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                } wp_reset_postdata();
            ?>
            </div>
          </div>
        </section>
        <div class="partners about-us__partners">
          <div class="partners__container container">
            <ul class="partners__list row justify-content-between align-items-center">
              <?php 
                $collabCount = 1;
                $collaborators = new WP_Query(array(
                  'post_type' => 'collaboration',
                  'posts_per_page' => 4
                ));

                while($collaborators->have_posts()){
                  $collaborators->the_post();
              ?>
                  <li class="partners__item col-12 col-sm-6 col-lg-3" data-aos="fade-up">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                      <?php 
                        if($collabCount == 1) echo 'width="117" height="47"';
                        else if($collabCount == 2) echo 'width="139" height="68"';
                        else if($collabCount == 3) echo 'width="150" height="45"';
                        else echo 'width="125" height="32"';
                      ?>
                      alt="behr handelsagentur">
                  </li>
              <?php
                $collabCount++;
                } wp_reset_postdata();
              ?>
            </ul>
          </div>
        </div>
      </article>
    </main>

<?php get_footer(); ?>