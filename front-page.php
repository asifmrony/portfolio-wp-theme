<?php get_header(); ?>

<main>
      <section class="main-screen">
        <div class="main-screen__image __js_parallax">
          <img src="<?php bloginfo('template_directory'); ?>/img/picture/mono/hero.jpg" width="1920" height="1080" alt="">
        </div>
        <div class="main-screen__container container container--size-large">
          <h1 class="main-screen__title">
            <span>Nobody</span>doesn't look advertising
          </h1>
          <div class="main-screen__text">People watch what they're interested in. And only sometimes it's advertising.</div>
          <a class="main-screen__btn btn" href="">
            <span class="btn__text">Learn more</span>
            <span class="btn__icon">
              <svg width="19" height="19">
                <use xlink:href="#link-arrow"></use>
              </svg>
            </span>
          </a>
        </div>
      </section>
      <section class="carousel-section carousel-section--separator">
        <div class="carousel-section__container container container--size-large">
          <header class="carousel-section__header row align-items-center">
            <h2 class="carousel-section__title col-12 col-md-6" data-aos="fade-up">Our latest projects</h2>
            <div class="carousel-section__nav col-12 col-md-3 order-last order-md-0" data-aos="fade-up">
              <button class="nav-btn nav-btn--prev" data-target=".__js_carousel-latest-projects" type="button">
                <svg width="50" height="16">
                  <use xlink:href="#long-arrow-left"></use>
                </svg>
              </button>
              <button class="nav-btn nav-btn--next" data-target=".__js_carousel-latest-projects" type="button">
                <svg width="50" height="16">
                  <use xlink:href="#long-arrow-right"></use>
                </svg>
              </button>
            </div>
            <div class="col-12 col-md-3 text-md-right ml-auto" data-aos="fade-up">
              <a class="carousel-section__more arrow-link" href="<?php echo get_post_type_archive_link('project'); ?>">
                <span class="arrow-link__text">View all</span>
                <span class="arrow-link__icon">
                  <svg width="75" height="75">
                    <use xlink:href="#link-arrow"></use>
                  </svg>
                </span>
              </a>
            </div>
          </header>
          <div class="carousel-section__carousel carousel carousel--slide-auto swiper-container __js_carousel-latest-projects" data-aos="fade-up">
            <div class="swiper-wrapper">
              <?php 
                $homepageProjectCount = 1;
                $homepageProject = new WP_QUERY(array(
                  'posts_per_page' => 4,
                  'post_type' => 'project'
                ));

                while($homepageProject->have_posts()){
                  $homepageProject->the_post();
              ?>
                  <a class="carousel__item homepage__carousel-item project-preview swiper-slide <?php 
                    if($homepageProjectCount == 1) {
                      echo "homepage__carousel-item--one";
                    } else if($homepageProjectCount == 2) {
                      echo "homepage__carousel-item--two";
                    } else if($homepageProjectCount == 3) {
                      echo "homepage__carousel-item--three";
                    } else {
                      echo "homepage__carousel-item--four";
                    }
                  ?>" href="<?php the_permalink(); ?>">
                    <span class="project-preview__image">
                      <?php 
                          if(has_post_thumbnail()){
                            the_post_thumbnail(); 
                          } else {
                      ?>
                            <img src="<?php bloginfo('template_directory') ?> /img/picture/carousel/4.jpg" width="720" height="548" alt="No featured image">
                            <!-- echo 'Please add a feature image to the project'; -->
                      <?php
                          }
                      ?>
                    </span>
                    <span class="project-preview__bottom">
                      <span class="project-preview__title"><?php the_title(); ?></span>
                      <span class="project-preview__icon">
                        <svg width="24" height="23">
                          <use xlink:href="#link-arrow2"></use>
                        </svg>
                      </span>
                    </span>
                  </a>
                <?php
                  $homepageProjectCount++;
                } wp_reset_postdata();
                ?>
            </div>
          </div>
        </div>
      </section>
      <section class="discuss-project">
        <div class="discuss-project__container container">
          <div class="discuss-project__wrapper" data-aos="fade-up">
            <h2 class="discuss-project__title" data-aos="fade-up">Discuss the project</h2>
            <form action="#" method="post">
              <div class="row justify-content-between gx-0">
                <div class="discuss-project__field-wrapper col-12 col-md-6" data-aos="fade-up">
                  <label class="discuss-project__field field">
                    <input type="text" name="name">
                    <span class="field__hint">Name</span>
                  </label>
                </div>
                <div class="discuss-project__field-wrapper col-12 col-md-6" data-aos="fade-up">
                  <label class="discuss-project__field field">
                    <input type="email" name="email">
                    <span class="field__hint">Email</span>
                  </label>
                </div>
                <div class="col-12">
                  <label class="discuss-project__field discuss-project__field--textarea field" data-aos="fade-up">
                    <textarea name="message" required></textarea>
                    <span class="field__hint">Message</span>
                  </label>
                </div>
                <div class="discuss-project__bottom col-12">
                  <div class="discuss-project__file file-upload" data-aos="fade-up">
                    <label class="file-upload__label">
                      <input class="visually-hidden" type="file">
                      <span class="file-upload__icon">
                        <svg width="16" height="16">
                          <use xlink:href="#paper-clip"></use>
                        </svg>
                      </span>
                      <span class="file-upload__text">Attach a file</span>
                    </label>
                  </div>
                  <button class="discuss-project__send btn--theme-black btn" type="submit" data-aos="fade-up">
                    <span class="btn__text">Submit</span>
                    <span class="btn__icon">
                      <svg width="19" height="19">
                        <use xlink:href="#link-arrow"></use>
                      </svg>
                    </span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
      <section class="about-video-section about-video-section--pt-0">
        <?php 
          $homepageAbout = new WP_Query(array(
            'page_id' => 60
          ));

          while($homepageAbout->have_posts()) {
            $homepageAbout->the_post();
        ?>
            <div class="about-video-section__container container container--size-large">
              <div class="row">
                <div class="about-video-section__main col-12 col-md">
                  <div class="about-video-section__title about-video-section__title--size-large" data-aos="fade-up"><?php the_field('about_subtitle'); ?></div>
                  <div class="row align-items-end" data-aos="fade-up">
                    <div class="col-4 col-md-5 col-xl-4">
                      <a class="about-video-section__more arrow-link" href="<?php echo site_url('/about-us'); ?>">
                        <span class="arrow-link__text"><?php the_title(); ?></span>
                        <span class="arrow-link__icon">
                          <svg width="75" height="75">
                            <use xlink:href="#link-arrow"></use>
                          </svg>
                        </span>
                      </a>
                    </div>
                    <div class="col-8 col-md-7 col-xl-8">
                      <div class="about-video-section__text" data-aos="fade-up">
                        <?php 
                          // $page_id = 60; 
                          // $about_page_data = get_page($page_id); 
                          // $content = apply_filters('the_content', $about_page_data->post_content); 
                          // echo $content;
                          the_content(); 
                        ?>
                      </div>
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
        <?php
          }
        ?>
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
      <section class="our-services">
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
      <section class="carousel-section">
        <div class="carousel-section__container container container--size-large">
          <header class="carousel-section__header row">
            <h2 class="carousel-section__title col-8 col-md-6" data-aos="fade-up">Latest news</h2>
            <div class="carousel-section__nav col-12 col-md-3 order-last order-md-0" data-aos="fade-up">
              <button class="nav-btn nav-btn--prev" data-target=".__js_carousel-latest-news" type="button">
                <svg width="50" height="16">
                  <use xlink:href="#long-arrow-left"></use>
                </svg>
              </button>
              <button class="nav-btn nav-btn--next" data-target=".__js_carousel-latest-news" type="button">
                <svg width="50" height="16">
                  <use xlink:href="#long-arrow-right"></use>
                </svg>
              </button>
            </div>
            <div class="col-4 col-md-3 align-self-md-center ml-auto text-right" data-aos="fade-up">
              <a class="carousel-section__more arrow-link" href="<?php echo site_url('/blog'); ?>">
                <span class="arrow-link__text">View all</span>
                <span class="arrow-link__icon">
                  <svg width="75" height="75">
                    <use xlink:href="#link-arrow"></use>
                  </svg>
                </span>
              </a>
            </div>
          </header>
          <div class="carousel-section__carousel carousel carousel--slide-auto swiper-container __js_carousel-latest-news" data-aos="fade-up">
            <div class="swiper-wrapper">
              <?php 
                  $homepagePosts = new WP_QUERY(array(
                    'posts_per_page' => 3
                  ));

                  while($homepagePosts->have_posts()) {
                    $homepagePosts->the_post(); 
              ?>
                      <a class="carousel__item carousel-card carousel-card--greyscale swiper-slide" href="<?php the_permalink(); ?>">
                        <!-- <img src="<?php bloginfo('template_directory'); ?>/img/picture/carousel/12.jpg" width="662" height="510" alt=""> -->
                        <?php the_post_thumbnail(); ?>
                        <span class="carousel-card__bottom">
                          <span class="carousel-card__title"><?php the_title(); ?></span>
                          <span class="carousel-card__icon">
                            <svg width="29" height="29">
                              <use xlink:href="#link-arrow"></use>
                            </svg>
                          </span>
                        </span>
                      </a>
              <?php 
                  } wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>
      </section>
      <div class="partners partners--pt-0">
        <div class="partners__container container">
          <ul class="partners__list row justify-content-center justify-content-sm-between align-items-center">
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
    </main>
    
<?php  get_footer(); ?>