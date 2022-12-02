<?php 
get_header();

// start of intro
if(have_rows('image_and_icons')): while(have_rows('image_and_icons')): the_row();
echo '<section class="pt-5 pb-5 position-relative">';

if(have_rows('icons')):
echo '<div class="container">';
echo '<div class="row">';
    while(have_rows('icons')): the_row();
    echo '<div class="col-md-4 col-6 text-center mb-5">';

    echo '<div class="position-relative icons d-flex align-items-center justify-content-center">';
        echo get_sub_field('icon');
    echo '</div>';

    echo '<h2 class="h5 pt-4 bold">' . get_sub_field('title') . '</h2>';

    echo '</div>';
    endwhile;
echo '</div>';
echo '</div>';
endif;
echo '</section>';
endwhile; endif;
// end of intro

echo get_template_part('partials/content');

get_footer(); ?>