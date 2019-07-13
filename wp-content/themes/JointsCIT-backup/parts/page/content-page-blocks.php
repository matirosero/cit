<?php
$blocks = get_post_meta( $post->ID, 'mro_cit_page_secondary_blocks', true );

foreach ( $blocks as $block ) { ?>

	<?php
	$section_id = $block['block_id'];
	$section_title = $block['title'];
	$section_content = $block['content']
	?>

	<section id="<?php echo $section_id; ?>" class="page-section">
		<h2 class="section-title">
			<?php echo $section_title; ?>
		</h2>

		<div class="section-content">
			<?php cit_content_filter($section_content); ?>
		</div>
	</section>

<?php } ?>

<footer class="article-footer">

</footer> <!-- end article footer -->