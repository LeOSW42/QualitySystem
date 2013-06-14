<?

$full_name = "Eurolec Quality System";
$footer_content = "&copy; Eurolec Instruments Ltd. 2013";
$root = "http://localhost/Catalogs/ISO_Files/";

/* This table is used to create the system */
$types = array(
	"quality_manual" => array(
		"id" => "quality_manual",
		"name" => "Quality Manual",
		"plugin" => "files",
		"extension_readonly" => "pdf",
		"extension_editable" => "doc",
	),
	"quality_policy" => array(
		"id" => "quality_policy",
		"name" => "Quality Policy Statement",
		"plugin" => "files",
		"extension_readonly" => "pdf",
		"extension_editable" => "doc",
	),
	"sop_procedure" => array(
		"id" => "sop_procedure",
		"name" => "SOP &amp; Procedure",
		"plugin" => "files",
		"extension_readonly" => "pdf",
		"extension_editable" => "xls",
	),
	"vendor_approval" => array(
		"id" => "vendor_approval",
		"name" => "Vendor Approval",
		"plugin" => "files",
		"extension_readonly" => "pdf",
		"extension_editable" => "xls",
	),
	"customers_complaints" => array(
		"id" => "customers_complaints",
		"name" => "Customers Complaints",
		"plugin" => "user_complaints",
	),
	"calibration_report" => array(
		"id" => "calibration_report",
		"name" => "Calibration Report",
		"plugin" => "files",
		"extension_readonly" => "pdf",
		"extension_editable" => "xls",
	),
/********************************************************************
Please follow the following instructions if you want to add an object
Firstly you have to copy and paste an item (one array) in order to create a new item
You must replace the value before the "=> array(" by the id of the id, the id field must be the same.
The name field is the name displayed.
Now, you have to choose a plugin in the list bellow :
 * files
   It is used to create a file on the system, you must register the following special values :
	"extension_readonly" => "", // With the extension of the readonly version (eg. pdf)
	"extension_editable" => "", // With the extension of the editable version (eg. doc)
 * user_complaints
   It is used to create a customers complaints on the system, you must register the following special values :
********************************************************************/
);

?>
