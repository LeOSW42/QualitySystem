# Quality System

You can find a demo [here](http://leo-serre.legtux.org/QS/) and a screenshot [here](https://raw.github.com/LeOSW42/QualitySystem/master/imgs/screenshot.png)

## Summary

* [Files Plugin](#files-plugin)
  - [Publish a new version](#publish-a-new-version)
  - [Accessing to the archive](#accessing-to-the-archive)
* [Problem Report Plugin](#problem-report-plugin)
  - [View the currents problems in detail](#view-the-currents-problems-in-detail)
  - [View the currents the list of problems](#view-the-currents-the-list-of-problems)
  - [Edit the current problem](#edit-the-current-problem)
  - [Add a problem](#add-a-problem)
  - [Delete a problem](#delete-a-problem)
  - [Back up the database](#back-up-the-database)
* [Configure](#configure)
  - [Access to the configuration file](#access-to-the-configuration-file)
  - [General configuration](#general-configuration)
  - [Moving the blocks](#moving-the-blocks)
  - [Editing a block](#editing-a-block)
  - [Database configuration](#database-configuration)
  - [Files Extensions](#files-extensions)
  - [Drop-down menus](#drop-down-menus)
* [Access protected](#access-protected)
  - [Change the password](#change-the-password)
  - [Add the security](#add-the-security)
* [Install this software](#install-this-software)
  - [Copy files](#copy-files)
  - [Database](#database)

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

The configuration file is `/config.php`, you'll need to download it, edit it and upload it (or
editing it in live on the server).

### General configuration

In the `/config.php` file, you'll see three differents variables. You can edit the value of
each one by simply edit the content between "". Please read the comments before
editing this file.

```php
$full_name = "Eurolec Quality System"; // The name displayed on the top of each page
$footer_content = "&copy; Eurolec Instruments Ltd. 2013"; // The footer content
$root = "http://localhost/Catalogs/ISO_Files/"; // URL of the folder containing this file
```

### Moving the blocks

You can quickly move the blocks on the home page, access to the config file, and move
the blocks in the order you want. A block is an array like this one (please do not destroy
an array)

```php
"vendor_approval" => array(
	"id" => "vendor_approval",
	"name" => "Vendor Approval",
	"plugin" => "files",
	"extension_readonly" => "pdf",
	"extension_editable" => "xls",
),
```

### Editing a block

This is a block :

```php
"$vendor_approval$" => array(
	"id" => "$vendor_approval$",
	"name" => "$Vendor Approval$",
	"plugin" => "$files$",
	"extension_readonly" => "$pdf$",
	"extension_editable" => "$xls$",
),
```

In this block, you only can change the values between tho $ sign. The two firsts value must be
the same, without stange characters.

The name name value is the human readable value, which is displayed.

The plugin value is the type of the object, the list is at the end of the config file.

The others values depends of the plugin used, please read the end of the config file.

### Database configuration

The MySQL database is used by the report_problem plugin to store the data, you must
complete this values only if you want to use this plugin.

```php
// The MySQL Database connexion used by problem_report plugin
$host = "localhost";
$user = "username";
$password = "secret!";
$base = "base_name";
```

Do not change this values if you are not sure.

### Files Extensions

In the files plugin, you can easily change the file extension of both of read only and
editable versions, in ordr to do that, you have to open the `/config.php` file, where you'll
see the following lines for each block:

```php
	"extension_readonly" => "pdf",
	"extension_editable" => "xls",
```

You can replace this extension by all the extensions in the world. No limit.

### Drop-down menus

You also can easily change the drop-down menus in order to add an option (***please do
not remove or edit on option because the database will not be changed***).

You will the this lines at the end of the `/config.php` file:

```php
$type_of_pb_ddm = array(
	"CAR",
	"Non Conforming Product",
	"Customer Complaint",
);
	$auditor_ddm= array(
	"Internal Auditor",
	"QA Manager",
	"TH",
	"CM",
	"External",
	"KG",
	"TM",
	"MM",
);
```

You just have to add a line in the menu you want, use the same synthax than the others.

## Access protected.

The access of this website can be protected, You can change add a password.

### Change the password

Create a `/.htpasswd` file, you have to write a single line looking like that:

```
user:4kBOFakrn0.xY
```

### Add the security

In `/.htaccess` file, You can add the 4 lines like bellow:

```
AuthName "Secured Area"
AuthType Basic
AuthUserFile "/ABSOLUTE_PATH/.htpasswd"
Require valid-user
```

You must replace the ABSOLUTE_PATH by the absolute path looking like `/home/xxx/qs/`. **Do not remove the error document line!**

## Install this software

You have two steps, the first one is important, the second option (you can skip it if you
don't use the problem_report plugin).

### Copy files

Connect you via an FTP client (like Filezilla) and copy all the [source code](https://github.com/LeOSW42/QualitySystem/archive/master.zip) folder to the
folder you want on the website (accessible by the internet).

### Database

Connect you to the MySQL database using PHPMyAdmin, then open a database and a
table (or create it if not exists). In the table view, click on import and select the
`database_stuct.sql` file, click on import.

Now, in the file manager, go to the `/config.php` file and write the correct database
name, username, password, table name and host adress.

You can now acces to the website, all is working !
