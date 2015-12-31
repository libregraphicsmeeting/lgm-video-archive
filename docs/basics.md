# Basic Structure

This document explains the basic structure of the LGM Video Archive website.

The archive is - as of fall 2015 - built with WordPress. However, it should be possible to migrate the data into any other system in the future.

## Main content types

The main content types of the archive are:

1. **Talks** : since this is the most important content, we use the "post", the default content type in WordPress. We simply rename it as "Talks".
2. **Speakers** : a custom taxonomy, defined in our functionality plugin.
3. **Topics** : a taxonomy - for simplicity we use the built-in "tags" functionality, and rename it as "Topics.

### Talks : content metadata

The content metadata we want to attach to Talks. They are implemented as WordPress [custom fields](https://codex.wordpress.org/Custom_Fields).

- Video URL (Youtube): `talk_video_youtube`
- Video URL (Archive.org): `talk_video_archiveorg`
- Video URL: `talk_video` - expects direct link to video file, for example: http://video.constantvzw.org/LGM15/day-04/38-Snelting-Conversations.ogv
- Slides URL: `talk_slides` - can be a direct link to the slides, or to a web page displaying them. 

Why do we use specific fields for Youtube and Archive.org? Because we will use those links to embed the player. We could create a function to parse the URLs, but it seems OK to anticipate those specific video providers.

Other metadata we could add at some moment: 

- transcript
- audio recording
- language : there were talks in French at LGM 2007
- licence : some talks in the 2007 have licence information: CC-BY, CC-BY-SA, Public Domain...

#### Talks: Categories

The default categories taxonomy could be used to designate the events: LGM 2006, LGM 2007, etc. We could base the event on the year ... but we could decide to open the video archive to other events, such as LGRU, OSP summer school, etc... so it will be practical to identify the events by a taxonomy.

### Speakers: content metadata

The speakers are handled as a custom taxonomy. There are three default content fields for a taxonomy: Name, Slug, Description.

1. **Name:** the name of the speaker
2. **Slug:** how the name will be rendered in the URL
3. **Description:** the speaker biography

**Additional fields:** implemented as Custom Fields. Since WordPress 4.4, taxonomies offer support for custom metadata. 

- **URL:** personal homepage of the speaker. Field ID: `speaker_url` - could also be used for social media profiles, WikiPedia page, etc.

## Miscellaneous

In a first iteration, we defined the Speaker as a *Post Type* (in order to have more flexibility, such as adding custom fields, images, URL, etc). However, with the new native support for *Term Metadata* in WordPress 4.4 (released December 2015), we consider that the archive will be more future-proof if we define the Speaker as a *[Custom Taxomony](https://codex.wordpress.org/Custom_Taxonomies#Custom_Taxonomies)*.

Some motivations behind that decision:
- posts2posts relationships cannot be easily "imported" with the WordPress eXtended RSS file format - taxonomy terms can.
- posts2posts isn't core WordPress functionality and may become a maintenance issue in the future.
