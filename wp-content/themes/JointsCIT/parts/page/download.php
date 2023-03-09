<?php
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<header class="article-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header> <!-- end article header -->

    

    <div class="download-form">
            <?php gravity_form(1, $display_title=false, $display_description=false, $display_inactive=false, $field_values=array('download_url' => 3026, true), $ajax=false); ?>
        </div>
    
</article> <!-- end article -->    

