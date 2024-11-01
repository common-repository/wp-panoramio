<?php

add_shortcode('wp_panoramio', 'view_panoramio');
function view_panoramio( $post_content ) 
{
	$panoramio = get_panoramio();
	$content_first = $post_content.$panoramio;
	
	return $content_first;
}

function get_panoramio()
{
	global $wpdb;
	$str = '';
	
	// fetch data from database for update purposes.
	$panoramio = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}panoramio" );
		
	// get the input data from the back-end
	$source_file = 'http://www.panoramio.com/wapi/template/';
	$style = $panoramio[0]->style;
	$tag = $panoramio[0]->tag;
	$width = $panoramio[0]->width;
	$height = $panoramio[0]->height;
	$bgcolor = $panoramio[0]->bgcolor;
	$position = $panoramio[0]->position;
	$list_size = $panoramio[0]->list_size;
	$columns = $panoramio[0]->columns;
	$rows = $panoramio[0]->rows;
	$orientation = $panoramio[0]->orientation;
	
	switch($style) {
		case "photo_list":
			$str .= '
			<iframe src="'. $source_file . $style .'.html?;
			tag='. $tag .'&
			width='. $width .'&
			height='. $height .'&
			position='. $position .'&
			list_size='. $list_size .'&
			bgcolor=%23'. $bgcolor .'&
			columns='. $columns .'&
			orientation='. $orientation .'"
			frameborder="0" scrolling="no" marginwidth="0" marginheight="0" width="'. $width .'" height="'. $height .'"> </iframe>';
		break;
		
		case "slideshow":
			$str .= '
			<iframe src="'. $source_file . $style .'.html?;
			tag='. $tag .'&
			width='. $width .'&
			height='. $height .'&
			position='. $position .'&
			list_size='. $list_size .'&
			bgcolor=%23'. $bgcolor .'&
			columns='. $columns .'&
			orientation='. $orientation .'"
			frameborder="0" scrolling="no" marginwidth="0" marginheight="0" width="'. $width .'" height="'. $height .'"> </iframe>';
		break;
		
		case "list":
			$str .= '
			<iframe src="'. $source_file . $style .'.html?;
			tag='. $tag .'&
			width='. $width .'&
			height='. $height .'&
			position='. $position .'&
			list_size='. $list_size .'&
			bgcolor=%23'. $bgcolor .'&
			columns='. $columns .'&
			rows='. $rows .'&
			orientation='. $orientation .'"
			frameborder="0" scrolling="no" marginwidth="0" marginheight="0" width="'. $width .'" height="'. $height .'"> </iframe>';
		break;
		
		case "photo":
			$str .= '
			<iframe src="'. $source_file . $style .'.html?;
			tag='. $tag .'&
			width='. $width .'&
			height='. $height .'&
			position='. $position .'&
			list_size='. $list_size .'&
			bgcolor=%23'. $bgcolor .'&
			columns='. $columns .'&
			orientation='. $orientation .'"
			frameborder="0" scrolling="no" marginwidth="0" marginheight="0" width="'. $width .'" height="'. $height .'"> </iframe>';
		break;
		
		default:
			$str .= '<p>Oops! there is a problem on the plugin please try again.</p>';
		break;
	}
	
	return $str;
	
}

?>