<?php

/******************************************
* SHOW ALL ROOMS IN FIELD WITH KEY "ROOMS"
******************************************/
add_filter( 'ninja_forms_render_options', function($options,$settings){
   if( $settings['key'] == 'pais_1713215588326' ){
        $countries = country_list();
        foreach ($countries as $key => $value) {
            $options[] = array('label' => $key, 'value' => $value);
        }
   }
   return $options;
},10,2);