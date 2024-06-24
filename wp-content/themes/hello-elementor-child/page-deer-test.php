<?php
/* Template Name: Deer Tests Page */

get_header(); ?>

<div class="deer-tests-page">
    <h1>Deer Tests</h1>
    <?php
    $args = array(
        'post_type' => 'deer_test',
        'posts_per_page' => -1,
    );
    $deer_tests = new WP_Query($args);
    if ($deer_tests->have_posts()) :
        while ($deer_tests->have_posts()) : $deer_tests->the_post(); ?>
            <div class="deer-test-item">
                <h2><?php the_title(); ?></h2>
                <div class="deer-test-meta">
                    <p><strong>Start Date:</strong> <?php the_field('start_date'); ?></p>
                    <p><strong>End Date:</strong> <?php the_field('end_date'); ?></p>
                </div>
                <div class="deer-test-description">
                    <?php the_field('description'); ?>
                </div>
                <div class="deer-test-cover">
                    <?php $cover_image = get_field('cover_image'); ?>
                    <?php if ($cover_image) : ?>
                        <img src="<?php echo esc_url($cover_image['url']); ?>" alt="<?php echo esc_attr($cover_image['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <div class="deer-test-application">
                    <a href="<?php the_field('application_link'); ?>" target="_blank">Apply Now</a>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p>No Deer Tests found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
