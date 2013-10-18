<?php

ShortcodeParser::get()->register('FacebookFeed', 
	function($arguments,$caption = null,$parser = null){
		$lb = new FacebookLikebox($arguments);
		return $lb->forTemplate();
	}
);