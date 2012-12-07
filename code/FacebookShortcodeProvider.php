<?php

class FacebookShortcodeProvider{
	
	function FacebookFeedShortCodeHandler($arguments,$caption = null,$parser = null){
		$likeboxurl = Director::protocol()."www.facebook.com/plugins/likebox.php";
		$params = array(
			'href' => 'http://www.facebook.com/platform',
			'width' => 300,
			'height' => 60,
			'show_faces' => false,
			//'colorscheme' => "light",
			//'stream' => false,
			//'border_color' => '#ffffff',
			'header' => true
		);
		$params = array_merge($params, $arguments);
		if(!isset($arguments['height'])){
			if(isset($arguments['stream']) && $arguments['stream']){
				$params['height'] = 500;
			}elseif($params['show_faces']){
				$params['height'] = 186;
				if($params['header'])
					$params['height'] += 30;
			}
		}
		$src = $likeboxurl."?".http_build_query($params);
		$template = new SSViewer("FacebookIframe");
		return $template->process(new ArrayData(array(
			'Src' => $src,
			'Width' => $params['width'],
			'Height' => $params['height']
		)));
	}
	
}