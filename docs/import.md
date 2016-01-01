# Import

Some notes about methods for importing talk data into the archive.

Since the current website runs in WordPress, we import data using the  WordPress eXtended RSS file format (used by native WordPress import / export).

To export such a file from an existing website: in wp-admin, go into Tools > Export.

To import such a file, it is needed to install the [WordPress Importer](https://wordpress.org/plugins/wordpress-importer/) plugin.

## Import FAQ

**Q:** Is it ok to define only the visible name of a term (Example: speaker name, without defining the "nicename")? Will existing terms be correctly linked?
**A:** NO! if the "nicename" isn't defined, the taxonomy term won't be imported.

**Q:** What to do when several talks start at the same time (in different rooms)? 
**A:** Add a difference of 10 seconds - this allows the "next / previous" links to work correctly in WordPress.

