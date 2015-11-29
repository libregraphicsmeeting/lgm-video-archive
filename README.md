# A website for the LGM video archive

An under-development website for the video archive of the Libre Graphics Meeting conference.

## Technical matters

This theme is a child-theme of [Afterlight](https://wordpress.org/themes/afterlight/).

## Discussion

Discussion about structure and functionality of the archive [is going on here](https://github.com/libregraphicsmeeting/infrastructure/issues/42).

## Theme setup

### CSS (style sheets)

Manuel: for greater clarity, I propose use the following CSS directory structure: 

- The file style.css at root level is necessary for the WordPress theme to work, but we don't load it.
- We put the css files into /css/dev/, where we split them into different files : typography, layout, mediaqueries, print styles...
- Once the site is in an advanced state, we will use a build-script (such as Grunt) that compiles them into a single minimized CSS file, in the /css/build/ directory.