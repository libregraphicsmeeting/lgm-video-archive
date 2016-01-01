# A functionality plugin for the LGM video archive website

This plugin adds functionalities to the [LGM video archive](http://libregraphicsmeeting.org/video/) website.

We keep those functions in a plugin, to separate functionality and design.  This makes it easier to maintain and modify the theme.

## Current functionalities:

- **lgm-vid.php** = base file, loads the different functionalities.
- **lgm-speakers.php** = defines the "Speaker" custom taxonomy.
- **lgm-talks.php** = relabels "post" as "talk".
- **lgm-topics.php** = renames "tags" as "topics".

See the [documentation](../../docs/basics.md) for more information about how the archive works.