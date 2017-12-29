<?php
/*
 * Stick this in your functions.php, or include it from a separate file,
 * edit the post types you want to export,
 * then use the URL: http://your-blog.com/?_inventory=1
 * SRC: https://gist.github.com/wkw/f5fd77564900f2752624
 *
 */
function return_csv_download($array_data, $filename){

  header('Content-Type: text/csv'); // you can change this based on the file type
  header('Content-Disposition: attachment; filename="' . $filename . '"');

  $out = fopen('php://output', 'w');
  foreach($array_data as $row){
    fputcsv($out, $row);
  }
  fclose($out);
}

function _emn_inventory_posts($posttypes){
  global $post;

  $args = array(

    'post_status' => 'publish',
    'post_type' => array(
      'cit_report',
    ),
    'order'               => 'DESC',
    'orderby'             => 'date',
    'ignore_sticky_posts' => true,
    'posts_per_page'         => -1,

  );

  $out = array();

  // @TODO - use data structure which combines titles and the functions to generate
  //       - the data for the column.
  $titles = array('source URL', 'target URL', 'source slug', 'target slug', 'same slug?');
  array_push($out, $titles);

  // foreach($posttypes as $type) {

    // $args['post_type'] = $type;

    $query = new WP_Query( $args);

    if ( $query->have_posts() ):
      while ( $query->have_posts() ): $query->the_post();

        $id = get_the_ID();

        $old_url = get_post_meta( $post->ID, '_mro_old_url', true );

        $new_url = force_relative_url(get_permalink());
        $new_url = '/informes'.$new_url;

        $old_slug = basename($old_url);
        $old_slug = str_replace('.html', '', $old_slug);

        $post_slug = $post->post_name;

        if ($old_slug == $post_slug ) {
          $same = 'SAME';
        } else {
          $same = 'DIFFERENT';
        }

        $row = array(
          $old_url,
          $new_url,
          $old_slug,
          $post_slug,
          $same
        );

        array_push($out, $row);
      endwhile;
    endif;
    wp_reset_postdata();
  // }
  return_csv_download($out, "posts.csv");
  //print_r( $out );

}

if( isset($_GET['_inventory']) ){
  // =============== EDIT THESE =============
  $posttypes = array('posts', 'cit_unknown');
  //$posttypes = array('newsletter');
  _emn_inventory_posts($posttypes);
  die();
}


if( isset($_GET['_get_posttypes']) ){
  $args = array(
     'public'   => true,
     '_builtin' => false
  );
  $posttypes = get_post_types($args);
  print_r($posttypes);
  die();
}