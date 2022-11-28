<?php 
get_header();

// start of intro
if(have_rows('image_and_icons')): while(have_rows('image_and_icons')): the_row();
echo '<section class="pt-5 pb-5 position-relative">';

if(have_rows('icons')):
echo '<div class="container">';
echo '<div class="row">';
    while(have_rows('icons')): the_row();
    echo '<div class="col-lg-4 text-center mb-5">';

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

// start of content section
if(have_rows('builder')): while(have_rows('builder')): the_row();
$layout = get_sub_field('layout');

if($layout == 'Content Section'){

    if(have_rows('content_section')): while(have_rows('content_section')): the_row();
        $bgImg = get_sub_field('background_image');
        $style = get_sub_field('style');
        $classes = get_sub_field('classes');
        $content = get_sub_field('content');
        $img = get_sub_field('image');

        if($bgImg){
            echo '<section class="position-relative bg-attachment mt-5 mb-5 ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;background-attachment:fixed;padding:250px 0;' . $style . '">';
            // echo '</section>';
        } else {
            echo '<section class="position-relative bg-attachment mt-5 mb-5 ' . $classes . '" style="padding:250px 0;' . $style . '">';
        }

        echo '<div class="container">';
        echo '<div class="row row-content align-items-center justify-content-between">';
        echo '<div class="col-md-4">';
            echo $content;
        echo '</div>';

        if($img):
        echo '<div class="col-md-6">';
            echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
        echo '</div>';
        endif;

        echo '</div>';
        echo '</div>';

        echo '</section>';

    endwhile; endif;

}

endwhile; endif;
// end of content section


// how to use new image hover effect
echo '<div class="col-6 col-intro-gallery col mb-1 p-1 overflow-h">';
echo '<div class="position-relative img-hover w-100">';
echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 image-intro-gallery','style'=>'object-fit:cover;']);
echo '</a>';
echo '</div>';
echo '</div>';

// popup trigger
echo '<span class="btn bg-white text-accent apply-now open-modal" id="apply-now" style="">Apply Now</span>';

// popup content
echo '<div class="modal-content apply-now position-fixed w-100 h-100 z-3">';
echo '<div class="bg-overlay"></div>';
echo '<div class="bg-content">';
echo '<div class="bg-content-inner">';
echo '<div class="close" id="">X</div>';
echo '<div>';
echo get_field('popup_content');
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';

get_footer(); ?>