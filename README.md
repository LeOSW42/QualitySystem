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

***Notes:***

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

From the home page, click on “Access to the database”, then you are viewing the
currents problems, you can go to the previous or the next one by simply clicking on the
arrows on the top right.

***Notes:***

 * If you are trying to see a problem which doesn't exists, the website will ask you to choose between existing problems numbers.
 * The website auto correct bad links by asking you about the database to see.

### View the currents the list of problems

From the problem viewer, simply click on the `[list view]` link on the top of the page.
You can edit or view a problem in details by clicking on the pencil or magnifier on each
problem.

***Note:***

 * The website auto correct bad links by asking you about the database to see.

### Edit the current problem

From the problem viewer, simply click on the `[edit]` link on the top of the page. You can
edit all the fields (except the problem number). Once finished please press “Save
Changes” on the bottom of the page.

***Notes:***

 * If you are trying to see a problem which doesn't exists, the website will ask you to choose between existing problems numbers.
 * The website auto correct bad links by asking you about the database to see.
 * The website will show debug infos, but the changes are saved successfully.
 * Please respect the date format (or the date will be 0000-00-00).

### Add a problem

From the problem viewer, simply click on the `[new]` link on the top of the page. You can
now register all the fields you want except the number which will be set automaticly (all
the fields are optionals, you can register the information later).

***Notes:***
 * The website auto correct bad links by asking you about the database to see.
 * The website will show debug infos, but the entry is saved successfully.
 * Please respect the date format (or the date will be 0000-00-00).

### Delete a problem

You can't delete a problem

### Back up the database

The website allow you to export the database in SQL server and archive all the backed
up, You can export the database by clicking on “Export the database in SQL”.
The website will create a backup and show you the link to download it. First part of the
link is the table name encrypted and the second part is the date.
You also can click on the here link, it will generate a CSV version of the database.

***Note:***

 * You can access to the old versions here: http://domain.tld/plugin/problem_report/backup/

## Configure

This website is a CMS, you can quickly edit the content without technical skills, but you
need an FTP access and a text editor Notepad++ (or Notepad).

### Access to the configuration file

In the `/config.php` file, you'll see three differents variables. You can edit the value of
each one by simply edit the content between "". Please read the comments before
editing this file.

```php
$full_name = "Eurolec Quality System"; // The name displayed on the top of each page
$footer_content = "&copy; Eurolec Instruments Ltd. 2013"; // The footer content
$root = "http://localhost/Catalogs/ISO_Files/"; // URL of the folder containing this file
```
