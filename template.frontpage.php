<?php

/*
Template Name: Front Page
*/

global $tpl;

$fullwidth = true;

gk_load('header');
gk_load('before', null, array('sidebar' => false));

?>
<style>
    input[type="button"].home_button{
		margin-top: 25px;
		border: 2px solid black !important;
		background-color: white !important;
		color: black !important;
		padding: 15px 20px;
		border-radius: 0px;
		text-shadow: none;
		font-size: 25px;
		font-family:  'GoboldThinLight', 'gobold light';
		-webkit-transition: all .25;
		-moz-transition: all .25;
		-ms-transition: all .25;
		-o-transition: all .25;
		transition: all .25;
	}
</style>
<section id="gk-mainbody">
	<div class="wrapper">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php gk_content_nav(); ?>
		
		<?php get_template_part( 'content', 'single' ); ?>
	
	<?php endwhile; ?>
	</div>
</section>

<?php

gk_load('after', null, array('sidebar' => false));
gk_load('footer');

// EOF