<?php
$page = get_page_by_path('404');

get_header(); the_post();
$page_id = $page->ID;

set_query_var('page', $page_id );
get_template_part('template-parts/custom-content');

get_footer();
