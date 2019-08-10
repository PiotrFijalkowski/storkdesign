<?php
/*
Template Name: Custom Content Page
*/

get_header(); the_post();
$page_id = get_the_ID();

set_query_var('page', $page_id );
get_template_part('template-parts/custom-content');

get_footer();
