<?php get_header(); ?>

<main>
      <section <?php if(is_archive()) echo 'class="portfolio-section set-purple-bg"' ?>>
        <div class="portfolio-section__container container container--size-large">
          <h1 class="visually-hidden">Projects masonry</h1>
          <ul class="portfolio-section__grid __js_portfolio-section-masonry">
            <?php 
                $projectCount = 1;
                while(have_posts()) {
                    the_post();                    
                ?>
                    <li class="portfolio-section__item __js_masonry-item <?php if($projectCount == 4 or $projectCount == 8) echo "portfolio-section__item--two-thirds"; ?>">
                        <a class="project-preview project-preview--elastic project-preview<?php if($projectCount == 1 or $projectCount == 7) echo "--vertical"; ?>" href="<?php the_permalink(); ?>">
                            <span class="project-preview__image">
                              <?php 
                                  if(has_post_thumbnail()){
                                    the_post_thumbnail(); 
                                  } else {
                              ?>
                                     <img src="<?php bloginfo('template_directory') ?> /img/picture/common/portfolio-section/1-mobile.jpg" alt="No featured image">
                                    <!-- echo 'Please add a feature image to the project'; -->
                              <?php
                                  }
                                ?>
                            </span>
                            <span class="project-preview__bottom">
                                <span class="project-preview__title" title=""><?php the_title(); ?></span>
                                <span class="project-preview__icon">
                                    <svg width="24" height="23">
                                    <use xlink:href="#link-arrow2"></use>
                                    </svg>
                                </span>
                            </span>
                        </a>
                    </li>
                <?php
                $projectCount++;
                }
            ?>
          </ul>
          <div class="paginate-links">
                <?php echo paginate_links(); ?>
          </div>
        </div>
      </section>
    </main>

<?php get_footer();
