<?

$full_name = "Eurolec Quality System";
$footer_content = "&copy; Eurolec Instruments Ltd. 2013";

/* This table contains all the files in the system */
/* Add an array for each document */
/* The array name must be the same than id field */
$types = array(
	"quality_manual" => array(
		"id" => "quality_manual",
		"name" => "Quality Manual",
		"extension_readonly" => "pdf",
		"extension_editable" => "doc",
	),
	"quality_policy" => array(
		"id" => "quality_policy",
		"name" => "Quality Policy Statement",
		"extension_readonly" => "pdf",
		"extension_editable" => "doc",
	),
	"sop_procedure" => array(
		"id" => "sop_procedure",
		"name" => "SOP &amp; Procedure",
		"extension_readonly" => "pdf",
		"extension_editable" => "xls",
	),
	"vendor_approval" => array(
		"id" => "vendor_approval",
		"name" => "Vendor Approval",
		"extension_readonly" => "pdf",
		"extension_editable" => "xls",
	),
	"calibration_report" => array(
		"id" => "calibration_report",
		"name" => "Calibration Report",
		"extension_readonly" => "pdf",
		"extension_editable" => "xls",
	)
/* If you want to add a line, pleas copy and paste the lines before to add a new array */
/* Then, you'll need to add a coma "," just after the closing bracet ")" behind this line */
);

?>