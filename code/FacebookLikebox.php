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

	function __construct($parameters){
		$this->setParameters($parameters);
	}

	function setParameters($parameters){
		$this->parameters = $parameters;
	}
	
	function forTemplate(){
		$template = new SSViewer("FacebookIframe");
		return $template->process(new ArrayData(array(
			'Src' => $this->getSrc(),
			'Width' => $this->parameters['width'],
			'Height' => $this->parameters['height']
		)));
	}

	function getSrc(){
		$likeboxurl = Director::protocol()."www.facebook.com/plugins/likebox.php";

		$arguments = $this->parameters;

		//adjust defaults, depending on whether the stream is visible
		//so that everything fits in desired dimensions
		if(!isset($arguments['height'])){
			if(isset($arguments['stream']) && $arguments['stream']){
				$this->parameters['height'] = 486;
				if($this->parameters['header'])
					$this->parameters['height'] += 30;
			}elseif($this->parameters['show_faces']){
				$this->parameters['height'] = 186;
				if($this->parameters['header'])
					$this->parameters['height'] += 30;
			}
		}

		return $likeboxurl."?".http_build_query($this->parameters);
	}

}