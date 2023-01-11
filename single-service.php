<?php get_header(); 
/* Establish Relationship between Service and Project. 
   Show Work carousel of recent projects done under/falls on
   the Specific Service Category. 
*/
?>

<main>
      <article class="service-detail">
        <div class="first-banner">
          <div class="first-banner__image">
            <?php
              if(has_post_thumbnail()){
                the_post_thumbnail();
              } else {
            ?>
                  <img src="<?php bloginfo('template_directory'); ?> /img/picture/first-banner/banner-service.jpg" width="1920" height="1100" alt="" />
            <?php
              }
            ?>
          </div>
          <div class="container container--size-large">
            <h1 class="first-banner__title heading heading--size-large"><?php the_title(); ?></h1>
          </div>
        </div>
        <section class="carousel-section service-detail__carousel">
          <div class="container">
            <header class="carousel-section__header row align-items-end align-items-md-center">
              <h2 class="carousel-section__title col-12 col-md-10" data-aos="fade-up">WORKS</h2>
              <div class="carousel-section__nav col-12 col-md-2 order-last order-md-0" data-aos="fade-up">
                <button class="nav-btn nav-btn--prev __js_navbtn-latest-projects" data-target=".__js_carousel-latest-projects" type="button">
                  <svg width="50" height="16">
                    <use xlink:href="#long-arrow-left"></use>
                  </svg>
                </button>
                <button class="nav-btn nav-btn--next __js_navbtn-latest-projects" data-target=".__js_carousel-latest-projects" type="button">
                  <svg width="50" height="16">
                    <use xlink:href="#long-arrow-right"></use>
                  </svg>
                </button>
              </div>
            </header>
          </div>
          <div class="container container--size-large">
            <div class="carousel-section__carousel carousel carousel--slide-auto swiper-container __js_carousel-latest-projects" data-aos="fade-up">
              <div class="swiper-wrapper">
                <?php 
                  $relatedProjectsCount = 1;
                  $relatedProjects = new WP_Query(array(
                    'posts_per_page' => 4,
                    'post_type' => 'project',
                    'meta_query' => array(
                      array(
                        'key' => 'related_services',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                      )
                    )
                  ));

                  if($relatedProjects->have_posts()) {
                    while($relatedProjects->have_posts()) {
                      $relatedProjects->the_post();
                  ?>
                        <a class="carousel__item project-preview swiper-slide" href="<?php the_permalink(); ?>">
                          <span class="project-preview__image">
                            <?php if(has_post_thumbnail()) {?><img src="<?php echo get_the_post_thumbnail_url(); ?>"
                              <?php
                              if($relatedProjectsCount == 1) {
                                echo 'width="720" height="548"';
                              } else if($relatedProjectsCount == 2) {
                                echo 'width="334" height="255"';
                              } else if($relatedProjectsCount == 3) {
                                echo 'width="404" height="494"';
                              } else {
                                echo 'width="434" height="321"';
                              }
                            ?>
                            >
                            <?php
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
                    $relatedProjectsCount++;
                    }
                  }
                ?>
                
                <!-- <a class="carousel__item project-preview swiper-slide" href="single-project.html">
                  <span class="project-preview__image">
                    <img src="img/picture/carousel/9.jpg" width="334" height="255" alt="the act">
                  </span>
                  <span class="project-preview__bottom">
                    <span class="project-preview__title">The act</span>
                    <span class="project-preview__icon">
                      <svg width="24" height="23">
                        <use xlink:href="#link-arrow2"></use>
                      </svg>
                    </span>
                  </span>
                </a>
                <a class="carousel__item project-preview swiper-slide" href="single-project.html">
                  <span class="project-preview__image">
                    <img src="img/picture/carousel/10.jpg" width="404" height="494" alt="Copenhagen">
                  </span>
                  <span class="project-preview__bottom">
                    <span class="project-preview__title">Copenhagen</span>
                    <span class="project-preview__icon">
                      <svg width="24" height="23">
                        <use xlink:href="#link-arrow2"></use>
                      </svg>
                    </span>
                  </span>
                </a>
                <a class="carousel__item project-preview swiper-slide" href="single-project.html">
                  <span class="project-preview__image">
                    <img src="img/picture/carousel/11.jpg" width="434" height="321" alt="Mobile app">
                  </span>
                  <span class="project-preview__bottom">
                    <span class="project-preview__title">Mobile app</span>
                    <span class="project-preview__icon">
                      <svg width="24" height="23">
                        <use xlink:href="#link-arrow2"></use>
                      </svg>
                    </span>
                  </span>
                </a> -->
              </div>
            </div>
          </div>
        </section>
        
        <div class="container container--small service-detail__container">
          <div class="service-detail__title" data-aos="fade-up">Process</div>
          <div class="service-detail__accordion accordion accordion--black">
            <div class="accordion__item" data-aos="fade-up">
              <button class="accordion__item-header" type="button">
                <span class="row align-items-md-center">
                  <span class="accordion__item-title col-11 col-md-6">
                    <span>01.</span> Planing
                  </span>
                </span>
              </button>
              <div class="accordion__item-body">
                <div class="row">
                  <div class="accordion__item-left col-12 col-md-7">
                    <div class="accordion__item-text">Alienum phaedrum torquatos nec eu, detr periculis ex, nihil expetendis in mei. Mei an pericula euripidis hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error epicurei mea et. Mea facilisis urbanitas moderatius id. Vis ei rationibus definiebas.</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion__item" data-aos="fade-up">
              <button class="accordion__item-header" type="button">
                <span class="row align-items-md-center">
                  <span class="accordion__item-title col-11 col-md-6">
                    <span>02.</span> Design
                  </span>
                </span>
              </button>
              <div class="accordion__item-body">
                <div class="row">
                  <div class="accordion__item-left col-12 col-md-7">
                    <div class="accordion__item-text">Alienum phaedrum torquatos nec eu, detr periculis ex, nihil expetendis in mei. Mei an pericula euripidis hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error epicurei mea et. Mea facilisis urbanitas moderatius id. Vis ei rationibus definiebas.</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion__item" data-aos="fade-up">
              <button class="accordion__item-header" type="button">
                <span class="row align-items-md-center">
                  <span class="accordion__item-title col-11 col-md-6">
                    <span>03.</span> Concept
                  </span>
                </span>
              </button>
              <div class="accordion__item-body">
                <div class="row">
                  <div class="accordion__item-left col-12 col-md-7">
                    <div class="accordion__item-text">Alienum phaedrum torquatos nec eu, detr periculis ex, nihil expetendis in mei. Mei an pericula euripidis hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error epicurei mea et. Mea facilisis urbanitas moderatius id. Vis ei rationibus definiebas.</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion__item" data-aos="fade-up">
              <button class="accordion__item-header" type="button">
                <span class="row align-items-md-center">
                  <span class="accordion__item-title col-11 col-md-6">
                    <span>04.</span> Coding
                  </span>
                </span>
              </button>
              <div class="accordion__item-body">
                <div class="row">
                  <div class="accordion__item-left col-12 col-md-7">
                    <div class="accordion__item-text">Alienum phaedrum torquatos nec eu, detr periculis ex, nihil expetendis in mei. Mei an pericula euripidis hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error epicurei mea et. Mea facilisis urbanitas moderatius id. Vis ei rationibus definiebas.</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion__item" data-aos="fade-up">
              <button class="accordion__item-header" type="button">
                <span class="row align-items-md-center">
                  <span class="accordion__item-title col-11 col-md-6">
                    <span>05.</span> CMS
                  </span>
                </span>
              </button>
              <div class="accordion__item-body">
                <div class="row">
                  <div class="accordion__item-left col-12 col-md-7">
                    <div class="accordion__item-text">Alienum phaedrum torquatos nec eu, detr periculis ex, nihil expetendis in mei. Mei an pericula euripidis hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error epicurei mea et. Mea facilisis urbanitas moderatius id. Vis ei rationibus definiebas.</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion__item" data-aos="fade-up">
              <button class="accordion__item-header" type="button">
                <span class="row align-items-md-center">
                  <span class="accordion__item-title col-11 col-md-6">
                    <span>06.</span> End
                  </span>
                </span>
              </button>
              <div class="accordion__item-body">
                <div class="row">
                  <div class="accordion__item-left col-12 col-md-7">
                    <div class="accordion__item-text">Alienum phaedrum torquatos nec eu, detr periculis ex, nihil expetendis in mei. Mei an pericula euripidis hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error epicurei mea et. Mea facilisis urbanitas moderatius id. Vis ei rationibus definiebas.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="service-detail__discuss discuss-project discuss-project--no-padding col-12">
            <div class="discuss-project__wrapper" data-aos="fade-up">
              <div class="discuss-project__title" data-aos="fade-up">Get in Touch</div>
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
                  <div class="col-12" data-aos="fade-up">
                    <label class="discuss-project__field discuss-project__field--textarea field">
                      <textarea name="message" required></textarea>
                      <span class="field__hint">Message*</span>
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
        </div>
      </article>
    </main>

<?php get_footer(); ?>
