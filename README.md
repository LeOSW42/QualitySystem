# Quality System

![screenshot](https://raw.github.com/LeOSW42/QualitySystem/master/imgs/screenshot.png)

## Summary

* [Files Plugin](#files-plugin)
  - [Publish a new version](#publish-a-new-version)
  - [Accessing to the archive](#accessing-to-the-archive)
* [Problem Report Plugin](#problem-report-plugin)
  - [View the currents problems in detail](#view-the-currents-problems-in-detail)
  - View the currents the list of problems
  - Edit the current problem
  - Add a problem
  - Delete a problem
  - Back up the database
* Configure
  - Access to the configuration file
  - General configuration
  - Moving the blocks
  - Editing a block
  - Database configuration
  - Files Extensions
  - Drop-down menus
* Access protected
  - Change the password
  - Remove the security
* Install this software
  - Copy files
  - Database

## Files Plugin

This plugin allow the user to download and upload files to the webserver, it rename
automaticly the files into a standard format and archive the olds files.

### Publish a new version

You'll need to click on publish a new version, from the home page. You'll be asked to
select two files (the universal format and the source format) and press Submit.

The files will be uploaded, *the maximum size is 10MB per file*. The extension will be
overwritten to the standard one, so **please upload the correct file**. There is no control
on the extension you are uploading.

***Notes***

 * An error message will be displayed if there are no files selected.
 * If you've cliqued on an old or bad link, it will automaticly allow you to choose between all the possibilities.

### Accessing to the archive

The files are automaticly backed up, the new one are not replacing the olds one.
If you want to acces to the archive, please go on one of this adresses :

 * http://domain.tld/plugin/files/readonly/
 * http://domain.tld/plugin/files/editable/

The current one is `name.pdf`, the older one is `name1.pdf` and the newer is `nameX.pdf` (X
higher than 1)

## Problem Report Plugin

This plugin use a MySQL database in order to store some informations about problems.

### View the currents problems in detail
