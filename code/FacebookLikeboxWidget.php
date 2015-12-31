<?php

if (class_exists("Widget")) {
    class FacebookLikeboxWidget extends Widget
    {

        private static $cmstitle = "Facebook Likebox";
        
        private static $db = array(
            'Href' => 'Text',
            'Width' => 'Int',
            'Height' => 'Int',
            'AdaptContainerWidth' => 'Boolean',
            'ShowPagePosts' => 'Boolean',
            'ShowFaces' => 'Boolean',
            'HideCoverPhoto' => 'Boolean',
            'UseSmallHeader' => 'Boolean'
        );

        private static $defaults = array(
            'ShowFaces' => false,
            'Header' => false
        );

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->merge(new FieldList(
                TextField::create("Href", "Facebook Page URL")
                    ->setRightTitle("eg: http://www.facebook.com/mypage"),
                CheckboxField::create('ShowPagePosts')
                    ->setDescription("i.e. the latest posts and images"),
                CheckboxField::create('ShowFaces'),
                CheckboxField::create('HideCoverPhoto'),
                CheckboxField::create('UseSmallHeader'),
                NumericField::create('Width'),
                NumericField::create('Height'),
                CheckboxField::create('AdaptContainerWidth')
                    ->setDescription('Plugin will try to fit the full width of the container'),
                LiteralField::create('HeightWarning',
                    '<p class="message">note: some features will not be visible if the chosen height is too short.</p>'
                )
            ));
            return $fields;
        }

        public function getLikebox()
        {
            $lb = new FacebookLikebox();
            $lb->setParameters(array(
                'Href' => $this->Href,
                'Width' => $this->Width,
                'Height' => $this->Height,
                'AdaptContainerWidth' => $this->AdaptContainerWidth,
                'ShowPagePosts' => $this->ShowPagePosts,
                'ShowFaces' => $this->ShowFaces,
                'HideCoverPhoto' => $this->HideCoverPhoto,
                'UseSmallHeader' => $this->UseSmallHeader
            ));
            return $lb;
        }

        public function getTitle()
        {
        }
    }
}
