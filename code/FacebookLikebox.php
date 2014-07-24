<?php

class FacebookLikebox extends ViewableData{

	protected $parameters = array(
		'href' => 'http://www.facebook.com/platform',
		'width' => 300,
		'height' => 60,
		'show_faces' => false,
		'header' => false,
		'colorscheme' => "light",
		'stream' => false,
		'border_color' => '#ffffff'
	);

	function __construct($parameters = null){
		if($parameters){
			$this->setParameters($parameters);
		}
	}

	function setParameters($parameters){
		$this->parameters = $parameters;
	}
	
	function forTemplate(){
		$template = new SSViewer("FacebookIframe");
		return $template->process(new ArrayData(array(
			'Src' => $this->getSrc(),
			'Width' => isset($this->parameters['width']) ?  $this->parameters['width'] : null,
			'Height' => isset($this->parameters['height']) ?  $this->parameters['height'] : null,
		)));
	}

	function getSrc(){
		$likeboxurl = Director::protocol()."www.facebook.com/plugins/likebox.php";

		$arguments = $this->parameters;

		// adjust defaults, depending on whether the stream is visible
		// so that everything fits in desired dimensions
		if(!isset($arguments['height'])){
			if(isset($arguments['stream']) && $arguments['stream']){
				$arguments['height'] = 486;
				if($arguments['header'])
					$arguments['height'] += 30;
			}elseif($arguments['show_faces']){
				$arguments['height'] = 186;
				if($arguments['header'])
					$arguments['height'] += 30;
			}
		}

		return $likeboxurl."?".http_build_query($arguments);
	}

}