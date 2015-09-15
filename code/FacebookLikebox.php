<?php

class FacebookLikebox extends ViewableData{

	protected $parameters = array(
		'Href' => 'http://www.facebook.com/platform',
		'Width' => 300,
		'Height' => 60,
		'AdaptContainerWidth' => true,
		'ShowPagePosts' => false,
		'ShowFaces' => false, 
		'HideCoverPhoto' => true, 
		'UseSmallHeader' => true
	);

	function __construct($parameters = null){
		if($parameters){
			$this->setParameters($parameters);
		}
	}

	function setParameters($parameters){
		$this->parameters = array_merge($this->parameters, $parameters);
	}
	
	public function getAttributes(){
		$params = $this->parameters;

		$attrs = array(
			'data-href' => $params['Href']
		);

		$attrs['data-width'] = $params['Width'] ? $params['Width'] : '';
		$attrs['data-height'] = $params['Height'] ? $params['Height'] : '';
		$attrs['data-adapt-container-width'] = $params['AdaptContainerWidth'] ? 'true' : 'false';
		$attrs['data-small-header'] = $params['UseSmallHeader'] ? 'true' : 'false';
		$attrs['data-hide-cover'] = $params['HideCoverPhoto'] ? 'true' : 'false';
		$attrs['data-show-facepile'] = $params['ShowFaces'] ? 'true' : 'false';
		$attrs['data-show-posts'] = $params['ShowPagePosts'] ? 'true' : 'false';
		
		return $attrs;
	}	

	public function getAttributesHTML(){
		$attrs = $this->getAttributes();

		// Remove empty
		$attrs = array_filter((array)$attrs, function($v) {
			return ($v || $v === 0 || $v === '0');
		}); 

		// Create markkup
		$parts = array();
		foreach($attrs as $name => $value) {
			$parts[] = "{$name}=\"" . Convert::raw2att($value) . "\"";
		}

		return implode(' ', $parts);
	}

	public function forTemplate(){
		return $this->renderWith('FacebookLikebox');
	}
}