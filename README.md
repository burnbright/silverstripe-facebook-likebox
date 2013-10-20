# Facebook Like Box

Provides a shortcode, and a widget for adding the facebook likebox/stream to your site.

## Usage

Add the `[FacebookFeed]` shortcode to your content, with any of the following parameters:

```
	[FacebookFeed href=http://www.facebook.com/silverstripe stream=true height=1000 width=500 header=true boder_color=#ABCABC show_faces=true colorscheme=dark]
```

The only main requirement is setting the href value to your facebook page.
Default heights are provided if you enable/disable the header, or show_faces.

### Widget

The widget will only work if you have included the widget module.

## Troubleshooting

Some likebox featuers won't show up if the chosen height is too short.

## Resources 

 * http://developers.facebook.com/docs/reference/plugins/like-box/