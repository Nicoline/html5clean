<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Sorry, maar je kunt niet rechtstreeks naar deze pagina.');

	if ( post_password_required() ) { ?>
		Voer het wachtwoord in om dit bericht te lezen.
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<div class="comments">
		<h2><?php comments_number('Geen reacties', '1 reactie', '% reacties' );?></h2>
		<ol class="commentlist">
			<?php wp_list_comments(); ?>
		</ol>
		<div class="navigation">
			<div class="next-posts"><?php previous_comments_link() ?></div>
			<div class="prev-posts"><?php next_comments_link() ?></div>
		</div>
	</div>	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p>Geen reacties mogelijk.</p>

	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div class="respond">
	<h2><?php comment_form_title( 'Reageer', 'Reageer op %s' ); ?></h2>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><a href="<?php echo wp_login_url( get_permalink() ); ?>">Log in</a> om te kunnen reageren.</p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="form">
		<div>
			<input type="text" name="author" id="author" value="" size="22" tabindex="1" class="input-name required" placeholder="Je naam *" maxlength="60" />
		</div>
		<div>
			<input type="text" name="email" id="email" value="" size="22" tabindex="2" class="input-email required email" placeholder="E-mailadres *"  maxlength="150" />
		</div>
		<div>
			<input type="text" name="url" id="url" value="" size="22" tabindex="3" class="input-website" placeholder="Je online hangplek"  maxlength="60" />
		</div>
		<div>
			<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" class="textarea-comment required" placeholder="Je reactie *"  maxlength="3000" ></textarea>
		</div>
		<div>
			<input name="submit" type="submit" id="submit" tabindex="5" value="Reageer" />
			<?php comment_id_fields(); ?>
		</div>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
	<?php endif;  ?>
</div>

<?php endif; ?>
