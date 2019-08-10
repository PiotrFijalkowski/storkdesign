<?php 
get_header(); the_post();
$page_id = get_the_ID();

set_query_var('page', $page_id );
get_template_part('template-parts/custom-content');
?> <div class="container-fluid">
<?php   get_template_part('template-parts/custom-content-category_info'); ?>  
</div> <?php

get_footer();

?>