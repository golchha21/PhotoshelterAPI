<?php

	class PHOTOSHELTER {
		
		var $url 			= ''; // the username or the complete url.
		var $timeout 		= 5;
		var $useragent 		= 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13';
		var $regex 			= '/([a-zA-Z0-9]*).photoshelter.com/';
		var $cache 			= 86400;

		function __construct( $args ) {
			extract($args);
			if(isset($username)){
				$this->url 		= "http://$username.photoshelter.com";
			}
			if(isset($url) && empty($this->url) && isValidURL($url)){
				$this->url 		= "http://$url/";
			}
			$this->regex		= ( isset( $regex ) && !empty( $regex ) ? $regex : $this->regex );
			$this->timeout		= ( isset( $timeout ) && $timeout > $this->timeout ? $timeout : $this->timeout );
			$this->useragent	= ( isset( $useragent ) && !empty( $useragent ) ? $useragent : $this->useragent );
		}
		
		function list_gallery($array = false, $c_in_t = true, $wrap = '<ul class="thumbnails">%s</ul>', $i_wrap = '<li class="span2">%s</li>', $t_wrap = '<div class="thumbnail">%s</div>', $c_wrap = '<div class="caption">%s</div>' ) {
			$return = '';
			$gallerys = json_decode($this->get_data("$this->url/gallery-list/?feed=json"));
			$gallerys = $gallerys->gl;
			if( $array ) {
				foreach( $gallerys as $album ) {
					if( $album->A_MODE=='PUB' ) {
						$images['_id'] 			= $album->G_ID;
						$images['_name']		= $album->G_NAME;
						$images['_desc']		= $album->G_DESCRIPTION;
						$images['_image'] 		= $album->I_ID;
						$images['_count'] 		= $album->NUM_IMAGES;
						$images['_created'] 	= $album->G_CTIME;
						$images['_modified']	= $album->G_MTIME;
					}
					$return[] = $images;
				}
			}else{
				foreach ($gallerys as $album){
					if($album->A_MODE=='PUB')
					{
						$caption 	= vsprintf( $c_wrap, $album->G_NAME );
						if($c_in_t){
							$thumbnail 	= vsprintf( $t_wrap, '<img src="http://cdn.c.photoshelter.com/img-get/' . $album->I_ID . '" >' . $caption);
							$return		.= vsprintf( $i_wrap, '<a href="?gid=' . $album->G_ID . '">' . $thumbnail .'</a>' );
						}else{
							$thumbnail 	= vsprintf( $t_wrap, '<img src="http://cdn.c.photoshelter.com/img-get/' . $album->I_ID . '" >' );
							$return		.= vsprintf( $i_wrap, '<a href="?gid=' . $album->G_ID . '">' . $thumbnail . $caption .'</a>' );
						}
					}
				}		
				$return = vsprintf( $wrap, $return );
			}
			return $return;
		}
		
		function list_gallery_image( $galleryid ) {
			$gallery_il = json_decode(get_data($this->get_data("$this->url/gallery/$galleryid/?feed=json")));
			if(count($gallery_il)>=1)
			{
				$gallery_il = $gallery_il->images;
				$return = '<div id="makeMeScrollable">';
				$i = 1;
				foreach ($gallery_il as $gallery)
				{
					$return .= '<img height="400" src="'.$gallery->src.'" value="1" border="0"/>';
				}
				$return .= '</div>';
			}else{
				$return = '<p class="content_body">No gallery and or image found.</p>';
			}
			return $return;
		}
		
		function user_detail() {
			$xml = $this->get_data("$this->url/?feed=rss");
			$xml = simplexml_load_string($xml);
			$return['_title']		= (string)$xml->channel->title;
			$return['_updated']		= (string)$xml->channel->pubDate;
			return $return;
		}
		
		function get_data( $url ) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_USERAGENT, $this->useragent);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
		}
		
		function save_json_data( $data, $filename ) {
			$filename = $filename . '.json';
			$data = json_encode($data);
			$fp = fopen($filename, 'w');
			fwrite($fp, $data);
			fclose($fp);
		}
		
		function get_json_data( $filename ) {
			$filename = $filename . '.json';
			$fp = fopen($filename, 'r');
			$content = fread($fp, filesize($filename));
			fclose($fp);
			$array = json_decode($content, true);
			return $array;
		}
		
		function isValidURL( $url )	{
			return preg_match($this->regex, $url);
		}
		
		function print_r_pre( $data ) {
			echo '<pre class="prettyprint linenums">';
			print_r($data);
			echo '</pre>';
		}
	}
?>