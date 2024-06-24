<?php
get_header();

if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="deer-test-container">
        <h1><?php the_title(); ?></h1>
        <div class="deer-test-meta">
            <p><strong>Start Date:</strong> <?php the_field('start_date'); ?></p>
            <p><strong>End Date:</strong> <?php the_field('end_date'); ?></p>
        </div>
        <div class="deer-test-content">
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
<?php endwhile; endif;

get_footer();