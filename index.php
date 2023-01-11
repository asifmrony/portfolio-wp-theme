<?php get_header(); ?>

<main>
    <article <?php if(is_home()) echo 'class="blog-grid set-purple-bg"' ?> >
        <div class="blog-grid__container container container--size-large">
            <h1 class="heading heading--size-large blog-grid__title">Posts</h1>
            <!-- Filter news-->
            <div class="filter blog-grid__filter">
                <button class="filter__item filter__item--active __js_filter-btn" type="button" data-filter="*">all</button>
                <button class="filter__item __js_filter-btn" type="button" data-filter=".__js_Javascript">javascript</button>
                <button class="filter__item __js_filter-btn" type="button" data-filter=".__js_wordpress">Wordpress-development</button>
                <button class="filter__item __js_filter-btn" type="button" data-filter=".__js_React">react</button>
                <button class="filter__item __js_filter-btn" type="button" data-filter=".__js_laravel">Laravel</button>
            </div>
            <ul class="blog-grid__row row g-0 __js_blog-grid">
            <?php 
                while(have_posts()) {
                    the_post();
            ?>
                <li
                    <?php
                        /* TO-DO: Filtering based on 
                            which category the blog post falls in.
                            have to add category name as class i.e "__js_categoryName1" "__js_categoryName2" and so far 
                        */ 
                        $i = 0;
                        foreach((get_the_category()) as $cat) {  
                            echo 'class="blog-grid__card news-card  col-12 col-md-6 col-lg-4 __js_masonry-item __js_'. $cat->cat_name . '"';
                            if (++$i == 1) break;
                        }
                        // echo 'class="blog-grid__card news-card  col-12 col-md-6 col-lg-4 __js_masonry-item __js_'. implode(" ", add_categories()) . '"';
                    ?> 
                >
                    <div class="news-card__wrapper">
                        <div class="news-card__pic">
                            <img src="<?php the_post_thumbnail(); ?>" width="533" height="510" alt="" />
                        </div>
                        <div class="news-card__content">
                            <div class="news-card__top">
                                <div class="news-card__date">
                                    <span><?php the_time('d'); ?></span>
                                    <span>&nbsp;</span>
                                    <span><?php the_time('M'); ?></span>
                                    <span>,&nbsp;</span>
                                    <span><?php the_time('Y'); ?></span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span><?php echo get_the_category_list(', '); ?></span>
                                </div>
                                <div class="news-card__title"><?php the_title(); ?>
                                </div>
                            </div>
                            <div class="news-card__bottom">
                                <div class="news-card__text"><?php echo wp_trim_words(get_the_content(), 19); ?></div>
                                <a class="arrow-link--no-scale arrow-link" href="<?php the_permalink(); ?>">
                                <span class="arrow-link__icon">
                                    <svg width="75" height="75">
                                    <use xlink:href="#link-arrow"></use>
                                    </svg>
                                </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php
            }
            ?>
            </ul>
            <div class="paginate-links">
                <?php echo paginate_links(); ?>
            </div>
        </div>
    </article>
</main>

<?php get_footer();
