<?php 
/*
* Trigger this file on Plugin unistall
*
* @package BilalPlugin
 */

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Clear plugin data from DB

// $books = get_posts( array( 'post_type' => 'book', 'numberposts' => -1 ) );

// foreach( $book as $data ){

// 	wp_delete_post( $book->ID, false );

// }

// Access the database via SQL
global $wpdb;

$wpdb->query( "DELETE FROM wp_posts WHERE post_type ='book'" );
$wpdp->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN ( SELECT if FROM wp_posts )" );



 