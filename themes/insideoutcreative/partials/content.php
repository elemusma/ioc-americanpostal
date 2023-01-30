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
            echo '<section class="position-relative content-section ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
            // echo '</section>';
        } else {
            echo '<section class="position-relative content-section ' . $classes . '" style="padding:150px 0;' . $style . '">';
        }

        echo '<div class="container-fluid pl-lg-5 pr-lg-5">';
        echo '<div class="row row-content align-items-center justify-content-between">';
        echo '<div class="col-lg-6 ' . get_sub_field('col_classes') . '" style="' . get_sub_field('col_style') . '">';
            echo $content;
        echo '</div>';

        if($img):
        echo '<div class="col-lg-6 pt-lg-0 pt-5 text-center">';
            echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;max-width:500px;']);
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
        echo '<section class="position-relative ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg,'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative ' . $classes . '" style="padding:150px 0;' . $style . '">';
    }

    echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-12 text-center pb-5">';
            echo $content;
        echo '</div>';

        echo '</div>';

        echo '<div class="row">';
        if( $posts ):
            echo '<div class="col-12">';
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
        echo '<section class="position-relative bg-attachment" style="background:url(' . wp_get_attachment_image_url($bgImg,'full') . ');background-size:cover;padding:150px 0;" id="content-testimonials">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative bg-attachment" style="padding:150px 0;" id="content-testimonials">';
    }

    echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-lg-8 content-testimonials">';
            echo get_sub_field('content');
        echo '</div>';

        if(have_rows('testimonials')): 
            echo '<div class="col-lg-4 pt-lg-0 pt-5">';
            echo '<div class="bg-accent-secondary pt-5 pb-5 pl-3 pr-3 text-white">';
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
        echo '<section class="position-relative ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg,'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative ' . $classes . '" style="padding:150px 0;' . $style . '">';
    }

    echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-lg-8 ' . get_sub_field('col_classes') . ' style=""' . get_sub_field('col_style') . '">';
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
        echo '<section class="position-relative ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg,'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative ' . $classes . '" style="padding:150px 0;' . $style . '">';
    }

    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-lg-8">';
        echo $content;
    echo '</div>';
    echo '</div>';

    if(have_rows('individual_pdfs')): 
        echo '<div class="row">';
        $individualPDFs=0;
            while(have_rows('individual_pdfs')): the_row();
            $image = get_sub_field('image');
            $volume = get_sub_field('volume');
            $issue = get_sub_field('issue');
            $link = get_sub_field('link');
            $individualPDFs++;

            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            endif;

            echo '<div class="col-lg-3 col-6 pb-5">';
            // if($individualPDFs == 1){

            // } else {
            //     echo '<div class="pt-lg-5 pb-lg-5"></div>';
            // }
            echo '<a class="" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">';
            echo wp_get_attachment_image($image,'full','',['class'=>'w-100','style'=>'height:320px;object-fit:cover;']);
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
} elseif($layout == "Gallery"){
    if(have_rows('gallery')): while(have_rows('gallery')): the_row();
    $bgImg = get_sub_field('background_image');
    $style = get_sub_field('style');
    $classes = get_sub_field('classes');
    $gallery = get_sub_field('inner_gallery');
    $content = get_sub_field('content');

    if($bgImg){
        echo '<section class="position-relative bg-accent-dark-blue ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative bg-accent-dark-blue ' . $classes . '" style="padding:150px 0;' . $style . '">';
    }

    echo '<div class="container">';

    echo '<div class="row">';
        echo '<div class="col-12 text-center pb-5">';
            echo $content;
        echo '</div>';

        echo '</div>';

    echo '<div class="row justify-content-center">';
    echo '<div class="col-12">';

    if($gallery):
    echo '<div class="posts-carousel owl-carousel owl-theme arrows-center">';
            foreach( $gallery as $image ): 
                echo '<div>';
                echo '<div class="img-hover overflow-h">';
                echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set" data-title="' . $image['title'] . '">';
                    echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 img-gallery','style'=>'height:600px;object-fit:cover;']);
                    echo '</a>';
                echo '</div>';
                echo '<div class="pt-5">';
                echo '<span class="text-gray h2 d-block">' . $image['title'] . '</span>';
                echo '<span class="text-white d-block">' . $image['caption'] . '</span>';
                // echo '<a href="' . get_the_permalink() . '" class="text-gray pt-5 h2 d-block">' . get_the_title() . '</a>';

                echo '</div>';
                echo '</div>';
            endforeach;
            echo '</div>';
    endif;

    echo '</div>';
    echo '</div>';
    echo '</div>';


    echo '</section>';

    endwhile; endif;
} elseif($layout == 'Thumbnail & Content'){
    if(have_rows('thumbnail_content')): while(have_rows('thumbnail_content')): the_row();
    $bgImg = get_sub_field('background_image');
    $style = get_sub_field('style');
    $classes = get_sub_field('classes');

    if($bgImg){
        echo '<section class="position-relative ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg,'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative ' . $classes . '" style="padding:150px 0;' . $style . '">';
    }

    echo '<div class="container">';
    if(have_rows('sections')):
        $sectionsCounter=0;
        while(have_rows('sections')): the_row();
        $img = get_sub_field('thumbnail');
        $content = get_sub_field('content');
        $link = get_sub_field('link');
        $sectionsCounter++;

        echo '<div class="row">';

        if($sectionsCounter == 1){
        } else {
            echo '<div class="divider mt-5 mb-5"></div>';
        }
            echo '<div class="col-lg-2 col-6">';
            if($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                echo '<a class="" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">';
            endif;
            echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-auto']);
            if($link):
                echo '</a>';
            endif;
            echo '</div>';

            echo '<div class="col-lg-1"></div>';

            echo '<div class="col-lg-8 pt-lg-0 pt-5">';

            echo '<h2>' . get_sub_field('title') . '</h2>';

            echo '<div style="font-size:135%;">';
            echo $content;
            echo '</div>';

            echo '</div>';
            

            echo '</div>';
        endwhile;
    endif;
    echo '</div>';



    echo '</section>';
    endwhile; endif;
} elseif($layout == 'Team'){
    if(have_rows('team')): while(have_rows('team')): the_row();

        if(have_rows('sections')): 
            $sectionsCounter = 0;
            while(have_rows('sections')): the_row();
            $sectionsCounter++;
            $style = get_sub_field('style');
            $classes = get_sub_field('classes');

        echo '<section class="position-relative ' . $classes . '" style="padding:50px 0;' . $style . '">';
        echo '<div class="container">';
        echo '<div class="row">';

        if($sectionsCounter == 1){

        } else {
            echo '<div class="divider" style="margin-bottom:120px;"></div>';
        }
        // echo '<div style="margin-top:100px;"></div>';
                echo '<div class="col-12">';
                    echo get_sub_field('content');
                echo '</div>';
            echo '</div>';

            if(have_rows('team_member')): 
                $teamCounter=0;
                while(have_rows('team_member')): the_row();
                $popup = sanitize_title_with_dashes(get_sub_field('name'));
                $teamCounter++;
                echo '<div class="row pt-5 pb-5">';
                        $headshot = get_sub_field('headshot');
                        echo '<div class="col-md-3">';
                        if(get_sub_field('popup_bio')){
                            echo '<div class="d-inline-block team-member-' . $popup . ' open-modal" id="team-member-' . $popup . '">';
                        }
                            echo wp_get_attachment_image(384,'full','',['class'=>'position-absolute','style'=>'top:-25px;left:-9px;height:200px;width:200px;']);
                            echo wp_get_attachment_image($headshot,'full','',['class'=>'position-relative z-1','style'=>'width:150px;height:150px;object-fit:cover;']);
                            if(get_sub_field('popup_bio')){
                                echo '</div>';
                            }
                        echo '</div>';
                        echo '<div class="col-md-9 pl-lg-0 pl-md-5 pt-md-0 pt-5">';
                        echo '<span class="h5 name bold text-accent-secondary text-uppercase">' . get_sub_field('name') . '</span><br>';
                        echo '<span class="h5 title text-uppercase">' . get_sub_field('title') . '</span><br>';
                        echo '<a href="mailto:' . get_sub_field('email') . '" target="_blank" class="h5 email text-accent bold">' . get_sub_field('email') . '</a>';
                        
                        echo '<div style="color:#2b449c;">';
                        echo get_sub_field('content');
                        echo '</div>';
                        
                        echo '</div>';
                        echo '</div>';

                        if(get_sub_field('popup_bio')){
                            echo '<div class="modal-content team-member-' . $popup . ' position-fixed w-100 h-100 z-3 team-modal">';
                            echo '<div class="bg-overlay"></div>';
                            echo '<div class="bg-content">';
                            echo '<div class="bg-content-inner">';
                            echo '<div class="close" id="">X</div>';
                            echo '<div class="d-md-flex">';
                            echo '<div class="pr-5">';
                            echo wp_get_attachment_image($headshot,'full','',['class'=>'position-relative z-1','style'=>'width:150px;height:150px;object-fit:cover;']);
                            echo '</div>';
                            echo '<div>';
                            echo get_sub_field('popup_bio');
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';

                            echo '</div>';
                            echo '</div>';
                        }

                    endwhile;

         endif;

            echo '</div>';
        echo '</section>';

        endwhile; endif;

    endwhile; endif;
} elseif($layout == 'Big Image'){
    if(have_rows('big_image')): while(have_rows('big_image')): the_row();

    $img = get_sub_field('image');
    echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100']);

    endwhile; endif;
} elseif ($layout == 'Testimonials'){
    if(have_rows('testimonials_group')): while(have_rows('testimonials_group')): the_row();

    echo '<section class="position-relative bg-accent-secondary" style="padding:100px 0;">';
    echo '<div class="container">';
    echo '<div class="testimonials-carousel owl-carousel owl-theme arrows-center">';
    if(have_rows('testimonials')): while(have_rows('testimonials')): the_row();
    $image = get_sub_field('image');
    echo '<div class="row align-items-center">';

    echo '<div class="col-lg-6 col-img-testimonials pt-md-0 pb-md-0" style="padding-top:50px;">';

    echo '<div class="position-relative" style="padding-top:100px;padding-bottom:100px;">';
    echo wp_get_attachment_image(717,'full','',['class'=>'position-absolute img-border','style'=>'
    object-fit:contain;
    width: 520px;
    height: 520px;
    top: -60px;
    left: 10px;']);
    echo wp_get_attachment_image($image['id'],'full','',['class'=>'m-auto img-main','style'=>'width:400px;height:400px;margin-left:50px;object-fit:cover;']);
    echo '</div>';

    echo '</div>';

    echo '<div class="col-lg-6">';
    echo '<div class="font-italic text-white">';
    echo get_sub_field('content');
    echo '</div>';
    echo '<span class="text-white"><strong>- ' . get_sub_field('name') . '</strong></span>';
    echo '</div>';

    echo '</div>';

    endwhile; endif;
    echo '</div>';
    echo '</div>';
    echo '</section>';

    endwhile; endif;
}

endwhile; endif;
// end of content section
?>