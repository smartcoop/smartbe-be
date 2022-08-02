<?php
	/**
		* The Single article
		*
		* This is the most generic template file in a WordPress theme
		* and one of the two required files for a theme (the other being style.css).
		* It is used to display a page when nothing more specific matches a query.
		* E.g., it puts together the home page when no home.php file exists.
		* Learn more: http://codex.wordpress.org/Template_Hierarchy
		*
	*/

get_header(); ?>



<?php if (have_posts()): ?>
<?php
	while(have_posts()):
	the_post();
	$postid = get_the_ID();
?>
<article id="content" role="main" class="container">
	<div class="row">
		<div class="span4 hidden-phone">
			<h2>Toutes les interviews</h2>	
			<ul class="post-list nav-latest-news">
				<?php
					$mypodliste = pods('portrait');
					$mypodliste->find($params);
					/* Start the Pods Loop */
					while ( $mypodliste->fetch() ) :
						// set our variables
						$formation = $mypodliste->id();
						$title = $mypodliste->display('title');
						$permalink = $mypodliste->display('permalink');
						$photo = $mypodliste->field('image');
						$photo=pods_image_url ( $photo, $size = 'null', $default = 0, $force = false );

					?>
					<li>
						<a href="<?php echo esc_url($permalink); ?>" title="<?php echo esc_attr($title); ?>" class="portrait_lien"><?php echo $title; ?></a>
					</li>

				<?php endwhile; ?>
			</ul>



		</div>
		<div class="span8">


			<?php /* Initiate the Pods Object */
				// get the current slug
				/* $slug = pods_v( 'last', 'url' ); */
				global $post;
				// get pods object
				$mypod = pods( $post->post_type, $post->ID );
				$podid = $mypod->id();
				$photo = $mypod->field('image');
				$photo=pods_image_url ( $photo, $size = 'null', $default = 0, $force = false );
				$image_copyright = $mypod->display('image_copyright');

				$title = $mypod->display('title');
				$introduction = $mypod->display('introduction');

				$description = $mypod->display('description');
				$lien_website = $mypod->display('lien_website');
				$lien_facebook = $mypod->display('lien_facebook');

				$image_2 = $mypod->field('image_2');
				$photo_2=pods_image_url ( $image_2, $size = 'null', $default = 0, $force = false );
				$collaborateur_1 = $mypod->display('collaborateur_1');
				$image_3 = $mypod->field('image_3');
				$photo_3=pods_image_url ( $image_3, $size = 'null', $default = 0, $force = false );
				$collaborateur_2 = $mypod->display('collaborateur_2');

				$smart_en_3_mots = $mypod->display('smart_en_3_mots');
				$cooperer_cest = $mypod->display('cooperer_cest');
				$je_me_sens = $mypod->display('je_me_sens');

				$interview_question_1 = $mypod->display('interview_question_1');
				$interview_reponse_1 = $mypod->display('interview_reponse_1');
				$baseline_1 = $mypod->display('baseline_1');

				$interview_question_2 = $mypod->display('interview_question_2');
				$interview_reponse_2 = $mypod->display('interview_reponse_2');
				$baseline_2 = $mypod->display('baseline_2');

				$interview_question_3 = $mypod->display('interview_question_3');
				$interview_reponse_3 = $mypod->display('interview_reponse_3');
				$baseline_3 = $mypod->display('baseline_3');


				$interview_question_4 = $mypod->display('interview_question_4');
				$interview_reponse_4 = $mypod->display('interview_reponse_4');
				$baseline_4 = $mypod->display('baseline_4');
				
				$interview_question_5 = $mypod->display('interview_question_5');
				$interview_reponse_5 = $mypod->display('interview_reponse_5');
				$baseline_5 = $mypod->display('baseline_5');					

				$interview_question_6 = $mypod->display('interview_question_6');
				$interview_reponse_6 = $mypod->display('interview_reponse_6');
				$baseline_6 = $mypod->display('baseline_6');				

				$interview_question_7 = $mypod->display('interview_question_7');
				$interview_reponse_7 = $mypod->display('interview_reponse_7');
				$baseline_7 = $mypod->display('baseline_7');				

				$interview_question_8 = $mypod->display('interview_question_8');
				$interview_reponse_8 = $mypod->display('interview_reponse_8');
				$baseline_8 = $mypod->display('baseline_8');				

				$interview_question_9 = $mypod->display('interview_question_9');
				$interview_reponse_9 = $mypod->display('interview_reponse_9');
				$baseline_9 = $mypod->display('baseline_9');				

				$interview_question_10 = $mypod->display('interview_question_10');
				$interview_reponse_10 = $mypod->display('interview_reponse_10');
				$baseline_10 = $mypod->display('baseline_10');

			?>

			<div class="portrait_fiche">
				<div>
					<img src="<?php echo $photo;?>"/>
					<div class="image_copyright">
						<?php echo $image_copyright;?>
					</div>
				</div>
				<h1 class="portrait_titre ft-w-7"><?php echo $title;?></h1>

				<div style="clear:both;"></div>
				<?php if($introduction !=''){?>
					<div class="portrait_intro">
						<!--<h3><strong>Introduction</strong></h3>-->
						<i><?php echo $introduction;?></i>
					</div>
				<?php }?>
				<hr/>

				<?php if($description !=''){?>
					<div class="portrait_description">

						<?php echo $description;?>
					</div>
				<?php }?>
				<div class="portrait_liens">
					<a href="http://<?php echo $lien_website;?>" class="portrait_lien" target="_blank"><?php echo $lien_website;?></a>
				</div>
				<div class="portrait_liens">
					<a href="http://<?php echo $lien_facebook;?>"  class="portrait_lien" target="_blank"><?php echo $lien_facebook;?></a>
				</div>
				<p>&nbsp;</p>


				<div class="portrait_collaborateur">
					<?php if($photo_2 !=''){?>
						<div class="portrait_photo">
							<img src="<?php echo $photo_2;?>"/>
						</div>
					<?php }?>
					<?php if($collaborateur_1 !=''){?>
						<div class="portrait_collaborateur_details">
							<?php echo $collaborateur_1;?>
						</div>
					<?php }?>
					<div style="clear:both;"></div>
				</div>
				<div style="clear:both;"></div>
				<?php if($collaborateur_2 !='' || $photo_3 !=''){?>
					<div class="portrait_collaborateur">
						<?php if($photo_3 !=''){?>
							<div class="portrait_photo">
								<img src="<?php echo $photo_3;?>"/>
							</div>
						<?php }?>
						<?php if($collaborateur_2 !=''){?>
							<div class="portrait_collaborateur_details">
								<?php echo $collaborateur_2;?>
							</div>
						<?php }?>
						<div style="clear:both;"></div>
					</div>
				<?php }?>
				

				<div style="clear:both;"></div>
				<br/><hr/><br/>
				<h2><strong>Interview </strong></h2>
				<?php if($smart_en_3_mots !=''){?>
					<div class="portrait_interview_question">
						Smart en 3 mots ?
					</div>
					<div class="portrait_reponse_recurrente">
							<?php echo $smart_en_3_mots;?>
					</div>
				<?php }?>
				<?php if($cooperer_cest !=''){?>
					<div class="portrait_interview_question">
						Coopérer c'est... ?
					</div>
					<div class="portrait_reponse_recurrente">
							<?php echo $cooperer_cest;?>
					</div>
				<?php }?>
				<?php if($je_me_sens !=''){?>
					<div class="portrait_interview_question">
						En tant que sociétaire de Smart, je me sens... ?
					</div>				
					<div class="portrait_reponse_recurrente">
							<?php echo $je_me_sens;?>
					</div>
				<?php }?>
				<div class="portrait_interview">
					<div class="portrait_interview_question">
						<?php echo $interview_question_1;?>
					</div>
					<div class="portrait_interview_reponse">
						<?php echo $interview_reponse_1;?>
					</div>
				</div>
				<?php if($baseline_1  !=''){?>
					<h3 class="portrait_baseline"><strong><span class="portrait_guillemet">"</span><?php echo $baseline_1 ;?><span class="portrait_guillemet">"</span></strong></h3>
				<?php }?>

				<div class="portrait_interview">
					<div class="portrait_interview_question">
						<?php echo $interview_question_2;?>
					</div>
					<div class="portrait_interview_reponse">
						<?php echo $interview_reponse_2;?>
					</div>
				</div>
				<?php if($baseline_2  !=''){?>
					<h3 class="portrait_baseline"><strong><span class="portrait_guillemet">"</span><?php echo $baseline_2 ;?><span class="portrait_guillemet">"</span></strong></h3>
				<?php }?>

				<div class="portrait_interview">
					<div class="portrait_interview_question">
						<?php echo $interview_question_3;?>
					</div>
					<div class="portrait_interview_reponse">
						<?php echo $interview_reponse_3;?>
					</div>
				</div>
				<?php if($baseline_3  !=''){?>
					<h3 class="portrait_baseline"><strong><span class="portrait_guillemet">"</span><?php echo $baseline_3 ;?></strong><span class="portrait_guillemet">"</span></h3>
				<?php }?>


				<div class="portrait_interview">
					<div class="portrait_interview_question">
						<?php echo $interview_question_4;?>
					</div>
					<div class="portrait_interview_reponse">
						<?php echo $interview_reponse_4;?>
					</div>
				</div>
				<?php if($baseline_4  !=''){?>
					<h3 class="portrait_baseline"><strong><span class="portrait_guillemet">"</span><?php echo $baseline_4 ;?></strong><span class="portrait_guillemet">"</span></h3>
				<?php }?>
				<?php if($interview_question_5  !=''){?>
					<div class="portrait_interview">
						<div class="portrait_interview_question">
							<?php echo $interview_question_5;?>
						</div>
						<div class="portrait_interview_reponse">
							<?php echo $interview_reponse_5;?>
						</div>
					</div>
				<?php }?>
				<?php if($baseline_5  !=''){?>
					<h3 class="portrait_baseline"><strong><span class="portrait_guillemet">"</span><?php echo $baseline_5 ;?></strong><span class="portrait_guillemet">"</span></h3>
				<?php }?>
				
				<?php if($interview_question_6  !=''){?>
					<div class="portrait_interview">
						<div class="portrait_interview_question">
							<?php echo $interview_question_6;?>
						</div>
						<div class="portrait_interview_reponse">
							<?php echo $interview_reponse_6;?>
						</div>
					</div>
				<?php }?>
				<?php if($baseline_6  !=''){?>
					<h3 class="portrait_baseline"><strong><span class="portrait_guillemet">"</span><?php echo $baseline_6 ;?></strong><span class="portrait_guillemet">"</span></h3>
				<?php }?>
				
				<?php if($interview_question_7  !=''){?>
					<div class="portrait_interview">
						<div class="portrait_interview_question">
							<?php echo $interview_question_7;?>
						</div>
						<div class="portrait_interview_reponse">
							<?php echo $interview_reponse_7;?>
						</div>
					</div>
				<?php }?>
				<?php if($baseline_7  !=''){?>
					<h3 class="portrait_baseline"><strong><span class="portrait_guillemet">"</span><?php echo $baseline_7 ;?></strong><span class="portrait_guillemet">"</span></h3>
				<?php }?>
				<?php if($interview_question_8  !=''){?>
					<div class="portrait_interview">
						<div class="portrait_interview_question">
							<?php echo $interview_question_8;?>
						</div>
						<div class="portrait_interview_reponse">
							<?php echo $interview_reponse_8;?>
						</div>
					</div>
				<?php }?>
				<?php if($baseline_8  !=''){?>
					<h3 class="portrait_baseline"><strong><span class="portrait_guillemet">"</span><?php echo $baseline_8 ;?></strong><span class="portrait_guillemet">"</span></h3>
				<?php }?>
				<?php if($interview_question_9  !=''){?>
					<div class="portrait_interview">
						<div class="portrait_interview_question">
							<?php echo $interview_question_9;?>
						</div>
						<div class="portrait_interview_reponse">
							<?php echo $interview_reponse_9;?>
						</div>
					</div>
				<?php }?>
				<?php if($baseline_9  !=''){?>
					<h3 class="portrait_baseline"><strong><span class="portrait_guillemet">"</span><?php echo $baseline_9 ;?></strong><span class="portrait_guillemet">"</span></h3>
				<?php }?>
				<?php if($interview_question_10  !=''){?>
					<div class="portrait_interview">
						<div class="portrait_interview_question">
							<?php echo $interview_question_10;?>
						</div>
						<div class="portrait_interview_reponse">
							<?php echo $interview_reponse_10;?>
						</div>
					</div>
				<?php }?>
				<?php if($baseline_10  !=''){?>
					<h3 class="portrait_baseline"><strong><span class="portrait_guillemet">"</span><?php echo $baseline_10 ;?></strong><span class="portrait_guillemet">"</span></h3>
				<?php }?>
				
			</div>
			<div style="clear:both;"><br/><br/></div>
			<div class="hidden-desktop">
				<h2>Toutes les interviews</h2>			
				<ul class="post-list nav-latest-news">
					<?php
						$mypodliste = pods('portrait');
						$mypodliste->find($params);
						/* Start the Pods Loop */
						while ( $mypodliste->fetch() ) :
							// set our variables
							$formation = $mypodliste->id();
							$title = $mypodliste->display('title');
							$permalink = $mypodliste->display('permalink');
							$photo = $mypodliste->field('image');
							$photo=pods_image_url ( $photo, $size = 'null', $default = 0, $force = false );

					?>
						<li>
							<a href="<?php echo esc_url($permalink); ?>" title="<?php echo esc_attr($title); ?>" class="portrait_lien"><?php echo $title; ?></a>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div>
</article>
	<!-- /content -->
	<!--<div class="container">
		<a class="" href="/fr/portrait/">&lt; Tous les portraits</a>
	</div>-->
	<?php endwhile; ?>

	<?php else : ?>
	<?php get_template_part('content', 'empty'); ?>
	<?php endif; ?>

<?php get_footer(); ?>
