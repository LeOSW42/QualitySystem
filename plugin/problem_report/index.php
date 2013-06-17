<?
/* Official plugin created by Léo SERRE under WTF License  */

/* Function called to display an element on the index page */
/* A block is creater containing a title and two links   */
/* * One link to the detail viewer			   */
/* * One link to the export manager			   */
function displayIndexElement_problem_report($element, $root) { ?>
		<article id="<? echo $element['id']; ?>">
			<h2><? echo $element['name']; ?></h2>
			<p>
				<a class="database" href="<? echo $root; ?>plugin/problem_report/list.php?id=<? echo $element['id']; ?>">Access to the database</a>
				<a class="database_export" href="<? echo $root; ?>plugin/problem_report/export.php?id=<? echo $element['id']; ?>">Export the database in SQL</a>
			</p>
		</article>
<? } ?>
