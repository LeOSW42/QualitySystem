<?

/* Function called to display an element on the index page */
function displayIndexElement_user_complaints($element, $root) { ?>
		<article id="<? echo $element['id']; ?>">
			<h2><? echo $element['name']; ?></h2>
			<p>
				<a class="database" href="<? echo $root; ?>plugin/user_complaints/view.php?id=<? echo $element['id']; ?>">Access to this module</a>
			</p>
		</article>
<? } ?>
