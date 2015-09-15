# Facebook Like Box

Provides a shortcode, and a widget for adding the facebook likebox/stream to your site, using the facebook page plugin.

## Usage

To use the shortcode or widget, you'll first need to create a facebook app and include the facebook javascript SDK on your site. 

Add the `[FacebookFeed]` shortcode to your content, with any of the following parameters:

```
	[FacebookFeed Href=http://www.facebook.com/silverstripe stream=true Height=1000 Width=500 AdaptContainerWidth=true ShowPagePosts=true ShowFaces=true HideCoverPhoto=true UseSmallHeader=true]
```

The only main requirement is setting the href value to your facebook page.
Default heights are provided if you enable/disable the header, or show_faces.

### Widget

The widget will only work if you have included the widget module.

## Troubleshooting

Some likebox featuers won't show up if the chosen height is too short.

## Resources 

https://developers.facebook.com/docs/plugins/page-plugin