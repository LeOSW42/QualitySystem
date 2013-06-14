<?

/* Function called to display an element on the index page */
function displayIndexElement_problem_report($element, $root) { ?>
		<article id="<? echo $element['id']; ?>">
			<h2><? echo $element['name']; ?></h2>
			<p>
				<a class="database" href="<? echo $root; ?>plugin/problem_report/view.php?id=<? echo $element['id']; ?>">Access to the database</a>
				<a class="database_export" href="<? echo $root; ?>plugin/problem_report/export.php?id=<? echo $element['id']; ?>">Export the database in SQL</a>
			</p>
		</article>
<? } ?>
