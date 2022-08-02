<?php
/**
 * Template Name: Register
 */

get_header(); ?>

<div id="register" class="container">

	<header class="page-leader" id="overview">
		<h1><?php _e("Rejoignez SMart !","smartbe"); ?></h1>
	</header>

	<div class="row">
		<section id="avantages" class="span12">
			<h2><?php _e("Vos Avantages","smartbe"); ?></h2>
		  <div class="row">
				<div class="span6">
				    <ul class="list-chevron col-container">
						<?php echo types_render_field("avantages", array()); ?>
				    </ul>
				</div>
		        <div class="span6">
		            <ul class="list-chevron col-container">
						<?php echo types_render_field("avantages-2", array()); ?>
				    </ul>
				</div>
			</div>
			<footer>
				<ul class="nav nav-chevron red inline text-center">
					<li>
						<a href="<?php echo types_render_field("avantages-url", array()); ?>"><?php _e("En savoir plus sur nos services","smartbe"); ?></a>
					</li>
				</ul>
			</footer>
		</section>

		
		<section id="conditions" class="span12">
			<h2><?php _e("Conditions pour devenir membre","smartbe"); ?></h2>
			<div class="row">
				<div class="span6">
					<div class="col-container">
						<?php echo types_render_field("conditions", array()); ?>
						<p><a class="btn btn-lg btn-primary" href="<?php echo types_render_field("infosession-url", array()); ?>" target="_blank"><?php _e("Participez à une séance d'information","smartbe"); ?></a></p>
						<p class="secondary"><a href="<?php echo types_render_field("login-url", array()); ?>" target="_blank"><?php _e("Déjà suivi une séance d'information?","smartbe"); ?></a></p>
					</div>
				</div>
				<div class="span6">
					<div class="col-container">
						<?php echo types_render_field("picture", array()); ?>
					</div>
				</div>
			</div>
		</section>
	</div>

	<footer>
		<ul class="nav nav-chevron red inline text-center">
			<li>
				<a href="<?php echo types_render_field("apmc-member-url", array()); ?>"><?php _e("S'inscrire comme membre","smartbe"); ?></a>
			</li>
		</ul>
	</footer>
</div>

<?php get_footer(); ?>
