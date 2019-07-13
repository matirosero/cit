<?php $date_format = 'F j, Y'; ?>
<p class="date"><?php the_time($date_format) ?><?php
	if ( !is_singular('cit_past_event') && !is_post_type_archive('cit_past_event') ) { 
		echo ' - '; 
		the_category(', '); 
	} ?></p>