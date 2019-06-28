<?php
header( "HTTP/1.1 301 Moved Permanently" );
wp_redirect( get_home_url() );
exit;
?>