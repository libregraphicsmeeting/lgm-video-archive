# WordPress theme for the LGM Video Archive

This folder contains the WordPress theme for the LGM Video Archive.

## Parent Theme

This theme is a child-theme of [Afterlight](https://wordpress.org/themes/afterlight/). Afterlight was created in 2015 by [Takashi Irie](http://takashiirie.com/), a prolific theme author at Automattic. Afterlight is licensed under GPL v2.

Some information about Afterlight can be [found here](https://theme.wordpress.com/themes/afterlight/).

Useful info:

Quick Specs (all measurements in pixels)

1. The main column width is max 704.
2. The slide-out sidebar width is max 704.
3. Featured Images work best with 833 wide.
4. Custom Header Image is 2000 wide by 320 high.


## Theme organisation

### CSS (style sheets)

We use the following CSS directory structure: 

- The file `style.css` at root level is necessary for the WordPress theme to work, but we don't load it.
- We put the css files into `/css/dev/`, where we split them into different files : typography, layout, mediaqueries, print styles...
- Once the site is in an advanced state, we will use a build-script (such as [Grunt](http://gruntjs.com/)) that compiles them into a single minimized CSS file, in the `/css/build/` directory.

## More Documentation

Documentation about the principles and architecture of the archive can be found [in the project README](../../docs/README.md). 


