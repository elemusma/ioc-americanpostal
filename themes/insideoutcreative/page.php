<?php get_header();
global $post; 
if ( ! post_password_required( $post ) ) {

echo get_template_part('partials/content');

} else {
// we will show password form here

echo '<section class="pt-5 pb-5">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-md-12">';
echo get_the_password_form();
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
   
}
get_footer(); 
?>