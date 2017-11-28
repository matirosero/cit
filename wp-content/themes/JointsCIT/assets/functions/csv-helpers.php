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
  $args = array(

    // 'category_name'    => 'problems',
    'post_status' => 'publish',
    'post_type' => array(
      'cit_unknown',
    ),
    'order'               => 'DESC',
    'orderby'             => 'date',
    'ignore_sticky_posts' => true,
    'posts_per_page'         => -1,

  );

  $out = array();

  // @TODO - use data structure which combines titles and the functions to generate
  //       - the data for the column.
  $titles = array('Titulo', 'Fecha', 'Categorías sitio viejo', 'Mover a', 'URL viejo', 'Link editar');
  array_push($out, $titles);

  // foreach($posttypes as $type) {

    // $args['post_type'] = $type;

    $query = new WP_Query( $args);

    if ( $query->have_posts() ):
      while ( $query->have_posts() ): $query->the_post();
        
        $date_format = 'F j, Y';
        $date = get_the_date( $date_format, get_the_ID() );
        if ( $date == 'Agosto 1, 2017' ) {
          $date = '';
        }

        //Problems/categories
        $parent_id = 113;
        $categories = get_the_terms( get_the_ID(), 'category' );

        $links = array();
        foreach( $categories as $category ):
            // if( $parent_id == $category->parent ):
                // put link in array
                $links[] = $category->name;
            // endif;
        endforeach;
        // join and output links with separator
        $cats = join( ', ', $links );
          $cats = str_replace('No author', 'Sin autor', $cats);
          $cats = str_replace('No date', 'Sin fecha', $cats);
          $cats = str_replace('No presentation', 'Sin presentación', $cats);
          $cats = str_replace('No content', 'Casi sin contenido', $cats);
          $cats = str_replace('Listed under wrong year', 'Año equivocado', $cats);
          $cats = str_replace('EMPTY', 'Sin contenido', $cats);
          $cats = str_replace('_Eiminar?', '¿Eliminar?', $cats);
          $cats = str_replace('Wrong title?', 'Título malo', $cats);
          $cats = str_replace('Not an event', 'No es un evento', $cats);

          $remove = array(
            'Conferencias - Audio y Filminas, ',
            'New import, ',
            'New import',
            'Posts,',
            'CIT Profile,',
            'CIT Report,',
            'Posts',
            'CIT Profile',
            'CIT Report',
          );
          $cats = str_replace($remove, '', $cats);

        //Move
        $author = '';
            $parent_id = 123;
            $categories = get_the_terms( get_the_ID(), 'category' );

            $links = array();
          foreach( $categories as $category ):
              if( $parent_id == $category->parent ):
                  // put link in array
                  $links[] = $category->name;
              endif;
          endforeach;
          // join and output links with separator
          $move_cats = join( ', ', $links );
          $move_cats = str_replace('CIT Profile', 'Perfiles', $move_cats);
          $move_cats = str_replace('CIT Report', 'Informes', $move_cats);
          $move_cats = str_replace('Posts', 'Publicaciones', $move_cats);


        //URL viejo
        $old_url = '';
        if (get_post_meta( get_the_ID(), '_mro_old_url', true )) :
          $old_url =  'http://www.clubdeinvestigacion.com'.get_post_meta( get_the_ID(), '_mro_old_url', true );
        endif;


        $row = array(
          get_the_title(),
          $date,
          $cats,
          $move_cats,
          $old_url,
          get_the_permalink()
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