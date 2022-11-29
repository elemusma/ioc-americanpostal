<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 

if(get_field('header', 'options')) { the_field('header', 'options'); }

if(get_field('custom_css')) { 
?> 
<style>
<?php the_field('custom_css'); ?>
</style>
<?php 
}
wp_head(); 
?>
</head>
<body <?php body_class(); ?>>
<?php
if(get_field('body','options')) { the_field('body','options'); }
echo '<div class="blank-space"></div>';
echo '<header class="position-relative z-3 box-shadow bg-white w-100" style="top:0;left:0;">';

echo '<div class="nav">';
echo '<div class="container-fluid">';
echo '<div class="row">';
echo '<div class="col-lg-3 col-md-6 text-center p-3">';

echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:150px;']); 
}

echo '</a>';

echo '</div>';
echo '<div class="col-lg-4 col-6 desktop-hidden">';
echo '<a id="navToggle" class="nav-toggle">';
echo '<div>';
echo '<div class="line-1 bg-accent"></div>';
echo '<div class="line-2 bg-accent"></div>';
echo '<div class="line-3 bg-accent"></div>';
echo '</div>';
echo '</a>';
echo '</div>';

echo '<div class="col-lg-9 col-6 pt-3 pb-3">';
echo '<div class="h-100 d-flex align-items-center justify-content-center">';
echo '<div class="position-absolute w-100 h-100 bg-accent-secondary" style="top:0;left:0;clip-path: polygon(0 0, 100% 0, 100% 100%, 5% 100%);
"></div>';

wp_nav_menu(array(
    'menu' => 'primary',
    'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
    )); 

echo '</div>';
echo '</div>';


echo '<div id="navMenuOverlay" class="position-fixed z-2"></div>';
echo '<div class="col-lg-4 col-md-8 col-11 nav-items bg-white desktop-hidden" id="navItems">';

echo '<div class="pt-5 pb-5">';
echo '<div class="close-menu">';
echo '<div>';
echo '<span id="navMenuClose" class="close h1">X</span>';
echo '</div>';
echo '</div>';
echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:250px;']);
}

echo '</a>';
echo '</div>';
wp_nav_menu(array(
'menu' => 'primary',
'menu_class'=>'menu list-unstyled mb-0'
)); 
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '</header>';

echo '<section class="hero position-relative">';

$globalPlaceholderImg = get_field('global_placeholder_image','options');
if(is_page()){
if(has_post_thumbnail()){
the_post_thumbnail('full', array('class' => 'w-100 h-100 bg-img position-absolute'));
} else {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
}
} else {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
}
echo '<div class="position-absolute w-100 h-100 bg-white" style="opacity:.95;"></div>';


if(is_front_page() || is_page()) {
echo '<div class="text-center" style="padding:150px 0 0;">';
// echo '<div class="position-relative">';
// echo '<div class="multiply overlay position-absolute w-100 h-100 bg-img"></div>';
// echo '<div class="position-relative">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-12">';
// echo '<h1 class="pt-3 pb-3 mb-0 text-accent-secondary text-uppercase" style="font-size:65px;">' . get_the_title() . '</h1>';

if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile;
endif;

echo '</div>';
echo '</div>';
echo '</div>';
// echo '</div>';
// echo '</div>';

if(have_rows('image_and_icons')): while(have_rows('image_and_icons')): the_row();
echo '<section class="pt-5 pb-5 position-relative">';

$image = get_sub_field('image');
echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-100 p-4']);

endwhile; endif;

echo '</div>';
}



if(!is_front_page()) {
echo '<div class="container pt-5 pb-5 text-center">';
echo '<div class="row">';
echo '<div class="col-md-12">';
if(is_single()){
echo '<h1 class="">' . get_single_post_title() . '</h1>';
} elseif(is_author()){
echo '<h1 class="">Author: ' . get_the_author() . '</h1>';
} elseif(is_tag()){
echo '<h1 class="">' . get_single_tag_title() . '</h1>';
} elseif(is_category()){
echo '<h1 class="">' . get_single_cat_title() . '</h1>';
} elseif(is_archive()){
echo '<h1 class="">' . get_archive_title() . '</h1>';
}
elseif(!is_front_page() && is_home()){
echo '<h1 class="">' . get_the_title(133) . '</h1>';
}
echo '</div>';
echo '</div>';
echo '</div>';
}

echo '</section>';
?>