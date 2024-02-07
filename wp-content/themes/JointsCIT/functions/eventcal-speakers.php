<?php
/*
 * Add speakers to event
 */



add_filter('the_content', 'add_content_after');

function add_content_after($content) {

    global $post;

    // $featured_posts = get_field('featured_posts');
    // echo '<pre>';
    // var_dump($post->ID);
    // var_dump(get_field('cit_event_speakers',$post->ID));
    // var_dump(get_post_meta($post->ID,'cit_event_speakers',1));
    // echo '</pre>';


    if ($post->post_type == 'tribe_events') {
        if (get_post_meta($post->ID,'cit_event_speakers',1)) {
            $speakers_ids = get_post_meta($post->ID,'cit_event_speakers',1);

            ob_start();

            echo '<h3>Expositores</h3>';
            echo '<ul class="cit__event-speakers">';

            foreach( $speakers_ids as $post ) {
                setup_postdata($post);
                // var_dump($post);
                ?>
                <li class="cit__event-speaker">
                    <div class="cit__event-speaker__pic"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail'); ?></a></div> 
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
                <?php
            }
            echo '</ul>';

            wp_reset_postdata();
            $speakers = ob_get_clean();
        }

        
        
        $content .= $speakers;

        $add = '';
        if (get_post_meta($post->ID,'cit_event_sponsors',1)) {
            // $logos = get_post_meta($post->ID,'cit_event_sponsors',1);
            // if( $logos ) {
                $add = wp_get_attachment_image( get_post_meta($post->ID,'cit_event_sponsors',1), 'full' );
                
            // }
        }
        $content .= $logos . '<h3 style="margin-top: 40px;">Patrocinan</h3>' . $add;
    }
    return $content;
}

