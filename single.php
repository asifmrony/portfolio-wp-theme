<?php get_header(); ?>

    <main>
    <?php
    while(have_posts()) {
        the_post();
    ?>
        <article class="blog-grid blog-grid--post">
            <div class="blog-grid__first-screen">
                <div class="blog-grid__first-screen-image __js_parallax">
                    <?php the_post_thumbnail();?>
                </div>
                <div class="blog-grid__tag"><?php the_category(', '); ?></div>
                <h1 class="heading heading--size-large blog-grid__title"><?php the_title(); ?></h1>
            </div>
            <div class="single-post">
                <div class="container container--xsmall">
                    <div class="single-post__date" data-aos="fade-up"><?php the_author_posts_link(); ?> on <?php the_time('M d, Y'); ?></div>
                    <div class="single-post__title" data-aos="fade-up">
                        <?php the_title(); ?>
                    </div>
                    <div class="single-post__text" data-aos="fade-up">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </article>

    <?php
    }
    ?>
</main>

<?php get_footer();