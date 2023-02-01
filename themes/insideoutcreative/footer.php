<?php
echo '<footer>';
echo '<section class="pt-5">';
echo '<div class="container-fluid">';
echo '<div class="row justify-content-between">';

echo '<div class="col-lg-5 col-md-6 pb-5">';

echo '<div class="d-md-flex align-items-center">';
echo '<div>';
echo '<a href="' . home_url() . '" class="d-inline-block pr-4">';

$logo = get_field('logo','options'); 
$logoFooter = get_field('logo_footer','options'); 

if($logoFooter){
    echo wp_get_attachment_image($logoFooter['id'],'full',"",['class'=>'h-auto','style'=>'width:200px;']); 
} elseif($logo) {
    echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'h-auto','style'=>'width:200px;']);
}

echo '</a>';
echo '</div>';

echo '<div class="small">';
echo get_field('website_message','options');
echo '</div>';
echo '</div>';

echo '<div class="small">';
echo '<p class="pt-5">Copyright &copy; 2022 American Postal Infrastructure</p>';
echo '</div>';


echo '</div>';

echo '<div class="col-lg-4 col-md-6 pb-5">';

wp_nav_menu(array(
    'menu' => 'footer',
    'menu_class'=>'menu list-unstyled'
));

echo '<hr style="border-color:var(--accent-primary);">';
echo '<div class="d-flex align-items-center">';
echo '<p class="mb-0 pr-4"><strong>CONNECT</strong></p>';
    echo get_template_part('partials/si');
echo '</div>';

echo '</div>';

echo '</div>';
echo '</div>';
echo '</section>';

// echo '<section class="pt-5 bg-accent">';
// echo '<div class="container">';
// echo '<div class="row justify-content-center">';
// echo '<div class="col-12">';



// echo '</div>';
// echo '<div class="col-12 text-center text-white">';

// echo get_template_part('partials/si');

// echo '<div class="text-gray-1 pt-4">';

// the_field('website_message','options');

// echo '</div>';
// echo '</div>';
// echo '</div>';
// echo '</div>';
// echo '</section>';
// echo '<div class="bg-gray text-center pt-3 pb-3 pl-5 pr-5">';
//     echo '<div class="d-flex justify-content-center align-items-center">';
//         echo '<a href="https://insideoutcreative.io/" target="_blank" rel="noopener noreferrer" style="" class="">';
//         echo '<img src="https://insideoutcreative.io/wp-content/uploads/2022/04/created-by-inside-out-creative.png" style="width:150px;" class="h-auto ml-2" alt="">';
//         // echo '<img src="https://insideoutcreative.io/wp-content/uploads/2022/06/created-by-inside-out-creative-black.png" style="width:150px;" class="h-auto ml-2" alt="">';
//         echo '</a>';
//     echo '</div>';
// echo '</div>';

echo '</footer>';
// if(get_field('individual_footer_code')){
//     echo get_field('individual_footer_code');
// }
if(get_field('footer', 'options')) { the_field('footer', 'options'); }

wp_footer();

echo '</body>';
echo '</html>';
?>