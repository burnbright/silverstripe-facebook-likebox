<?php

if(class_exists("Widget")){

	class FacebookLikeboxWidget extends Widget{

		private static $cmstitle = "Facebook Likebox";
		
		private static $db = array(
			'Href' => 'Text',
			'Width' => 'Int',
			'Height' => 'Int',
			'ShowStream' => 'Boolean',
			'ShowFaces' => 'Boolean',
			'ShowHeader' => 'Boolean',
			'ShowBorder' => 'Boolean'
		);

		private static $defaults = array(
			'ShowFaces' => false,
			'Header' => false
		);

		function getCMSFields(){
			$fields = parent::getCMSFields();
			$fields->merge(new FieldList(
				TextField::create("Href","Facebook Page URL")
					->setRightTitle("eg: http://www.facebook.com/mypage")
				,
				CheckboxField::create('ShowStream',"Show stream")
					->setRightTitle("i.e. the latest posts and images"),
				CheckboxField::create('ShowFaces',"Show faces"),
				CheckboxField::create('ShowHeader', "Show header"),
				CheckboxField::create('ShowBorder', "Show border"),
				NumericField::create('Width'),
				NumericField::create('Height'),
				LiteralField::create('HeightWarning',
					'<p class="message">note: some features will not be visible if the chosen height is too short.</p>'
				)
			));
			return $fields;
		}

		function getLikebox(){
			$lb = new FacebookLikebox();
			$lb->setParameters(array(
				'href' => $this->Href,
				'stream' => $this->ShowStream,
				'width' => $this->Width,
				'height' => $this->Height,
				'show_faces' => $this->ShowFaces,
				'header' => $this->ShowHeader,
				'show_border' => $this->ShowBorder
			));
			return $lb;
		}

		function getTitle(){

		}	

	}

}