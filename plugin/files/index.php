<?

/* Function called to display an element on the index page */
function displayIndexElement_files($element, $root) { ?>
		<article id="<? echo $element['id']; ?>">
			<h2><? echo $element['name']; ?></h2>
			<p>
				<a <? if(!file_exists("plugin/files/readonly/".$element['id'].".".$element['extension_readonly'])) { echo 'style="opacity: 0.4;" '; } ?>class="dl_readonly" href="<? echo $root; ?>plugin/files/readonly/<? echo $element['id']; ?>.<? echo $element['extension_readonly']; ?>">Read only version</a>
				<a <? if(!file_exists("plugin/files/editable/".$element['id'].".".$element['extension_editable'])) { echo 'style="opacity: 0.4;" '; } ?>class="dl_editable" href="<? echo $root; ?>plugin/files/editable/<? echo $element['id']; ?>.<? echo $element['extension_editable']; ?>">Editable version</a>
				<a class="upload" href="<? echo $root; ?>plugin/files/publish.php?id=<? echo $element['id']; ?>">Publish a new version</a>
			</p>
		</article>
<? } ?>
