<?php
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
            echo '<section class="position-relative bg-attachment content-section ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
            // echo '</section>';
        } else {
            echo '<section class="position-relative bg-attachment content-section ' . $classes . '" style="padding:150px 0;' . $style . '">';
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

} elseif ($layout == 'Posts') {
    if(have_rows('posts')): while(have_rows('posts')): the_row();
    $bgImg = get_sub_field('background_image');
    $style = get_sub_field('style');
    $classes = get_sub_field('classes');
    $content = get_sub_field('content');
    $posts = get_sub_field('posts');

    if($bgImg){
        echo '<section class="position-relative bg-attachment ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg,'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative bg-attachment ' . $classes . '" style="padding:150px 0;' . $style . '">';
    }

    echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-12 text-center pb-5">';
            echo $content;
        echo '</div>';

        echo '</div>';

        echo '<div class="row">';
        if( $posts ):
            echo '<div class="posts-carousel owl-carousel owl-theme arrows-center">';
            foreach( $posts as $post ): 
                // Setup this post for WP functions (variable must be named $post).
                setup_postdata($post);
                echo '<div>';
                echo '<div class="img-hover overflow-h">';
                echo '<a href="' . get_the_permalink() . '" class="">';
                    the_post_thumbnail('full',array('class'=>'w-100 h-auto'));
                echo '</a>';
                echo '</div>';
                echo '<a href="' . get_the_permalink() . '" class="text-gray pt-5 h2 d-block">' . get_the_title() . '</a>';
                echo '<div class="text-white">';
                echo get_the_excerpt();
                echo '</div>';
                // echo '<hr class="mt-2">';
                echo '</div>';
            endforeach;
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); 
            echo '</div>';
            endif;
        echo '</div>';

        echo '</div>';

    echo '</section>';


    endwhile; endif;
} elseif ($layout == 'Content & Testimonials'){
    if(have_rows('content_testimonials')): while(have_rows('content_testimonials')): the_row();

    $bgImg = get_sub_field('background_image');

    if($bgImg){
        echo '<section class="position-relative bg-attachment" style="background:url(' . wp_get_attachment_image_url($bgImg,'full') . ');background-size:cover;padding:150px 0;">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative bg-attachment" style="padding:150px 0;">';
    }

    echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-lg-8">';
            echo get_sub_field('content');
        echo '</div>';

        if(have_rows('testimonials')): 
            echo '<div class="col-lg-4">';
            echo '<div class="bg-accent-secondary pt-5 pb-5 pl-3 pr-3 text-white h-100">';
            echo '<div class="testimonials-carousel owl-carousel owl-theme arrows-small">';
            while(have_rows('testimonials')): the_row();
            

            echo '<div class="">';
            echo '<div class="font-italic">';
            echo get_sub_field('content');
            echo '</div>';
            
            echo '<strong>' . get_sub_field('name') . '</strong>';
            
            echo '</div>';
            endwhile;
            echo '</div>';
            echo '</div>';
            echo '</div>';
        endif;

        echo '</div>';
        echo '</div>';

    echo '</section>';
    endwhile; endif;
} elseif($layout == 'Content'){
    if(have_rows('content')): while(have_rows('content')): the_row();
    $bgImg = get_sub_field('background_image');
    $style = get_sub_field('style');
    $classes = get_sub_field('classes');
    $content = get_sub_field('content');

    if($bgImg){
        echo '<section class="position-relative bg-attachment ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg,'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative bg-attachment ' . $classes . '" style="padding:150px 0;' . $style . '">';
    }

    echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-lg-8">';
            echo $content;
        echo '</div>';
        echo '</div>';
        echo '</div>';

    echo '</section>';
    endwhile; endif;
} elseif($layout == 'PDFs'){
    if(have_rows('pdfs')): while(have_rows('pdfs')): the_row();
    $bgImg = get_sub_field('background_image');
    $style = get_sub_field('style');
    $classes = get_sub_field('classes');
    $content = get_sub_field('content');

    if($bgImg){
        echo '<section class="position-relative bg-attachment ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg,'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative bg-attachment ' . $classes . '" style="padding:150px 0;' . $style . '">';
    }

    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-lg-8">';
        echo $content;
    echo '</div>';
    echo '</div>';

    if(have_rows('individual_pdfs')): 
        echo '<div class="row">';
            while(have_rows('individual_pdfs')): the_row();
            $image = get_sub_field('image');
            $volume = get_sub_field('volume');
            $issue = get_sub_field('issue');
            $link = get_sub_field('link');

            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            endif;

            echo '<div class="col-lg-3">';
            echo '<a class="" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">';
            echo wp_get_attachment_image($image,'full','',['class'=>'w-100 h-auto']);
            echo '</a>';
            echo '<h2 class="text-accent-secondary mb-0 pt-4">' . $volume . '</h2>';
            echo '<h3>' . $issue . '</h3>';
            echo '</div>';

            endwhile;
        echo '</div>';
    endif;

    echo '</div>';



    echo '</section>';
    endwhile; endif;
}

endwhile; endif;
// end of content section
?>