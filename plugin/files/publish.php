<? include "../../config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="<? echo $full_name; ?>">
	<link rel="stylesheet" href="../../stylesheet.css" media="screen, handheld" />
	<title>Publish a file − <? echo $full_name; ?></title>
</head>
<body>
	<header><h1><a href="<? echo $root; ?>">Publish a file</a></h1></header>
	<section>
<?
/* Section called when a file is submitted */
/* This code save the file, archive the old one and displays informations on the screen */
		 if ( isset($_POST['submit_files']) && $types[$_GET['id']]['plugin'] == "files") { ?>
		<article id="file_upload">
			<h2>The files are uploading</h2>
			<p>Uploading <? echo $types[$_GET['id']]['id'].'.'.$types[$_GET['id']]['extension_editable'];?>…</p>
		 
			<?

			$directory = 'editable/'; // directory where the file is stored

			// Here we move the other files (archive function) in order to make place for the new file.
			// File → File1, File1 → File2, File2 → File3… With the File space clear
			if(file_exists($directory.$types[$_GET['id']]['id'].'.'.$types[$_GET['id']]['extension_editable']))
			{
				for($i=1;file_exists($directory.$types[$_GET['id']]['id'].$i.'.'.$types[$_GET['id']]['extension_editable']);$i++) {}
				rename($directory.$types[$_GET['id']]['id'].'.'.$types[$_GET['id']]['extension_editable'],$directory.$types[$_GET['id']]['id'].$i.'.'.$types[$_GET['id']]['extension_editable']);
			}		 

			if ($_FILES['editable_file'] != NULL) {
				$max_size = 10000000; // approx. 10 MB
				if (isset($_FILES['editable_file']))
				{
					// Test max size
					if ($_FILES['editable_file']['size'] > $max_size)
					{
						$erreurUp = 'The maximum size is ' . $max_size/1024 . 'KB per file.';
					}
					// Upload directory exists ?
					elseif (!file_exists($directory))
					{
						$erreurUp = 'The upload directory doesn\'t exist.';
					}
					// Display error message or continue
					if(isset($erreurUp))
					{
						echo '<span class="error">' . $erreurUp . '</span><br />';
					}
					else
					{
						// Define the new filename and extension
						$extension = '.'.$types[$_GET['id']]['extension_editable'];
						$filename = $_GET['id'];

						// Upload the file to the server
						if (move_uploaded_file($_FILES['editable_file']['tmp_name'], $directory.$filename.$extension))
						{ echo '<span class="ok">Ok</span><br />'; }
						else
						{
							echo '<span class="error">Error while uploading the file.</span><br />';
						}

					}
				}
			} ?>
		
			<br /><p>Uploading <? echo $types[$_GET['id']]['id'].'.'.$types[$_GET['id']]['extension_readonly'];?>…</p>
			
			<?

			$directory = 'readonly/'; // directory where the file is stored

			// Here we move the other files (archive function) in order to make place for the new file.
			// File → File1, File1 → File2, File2 → File3… With the File space clear
			if(file_exists($directory.$types[$_GET['id']]['id'].'.'.$types[$_GET['id']]['extension_readonly']))
			{
				for($i=1;file_exists($directory.$types[$_GET['id']]['id'].$i.'.'.$types[$_GET['id']]['extension_readonly']);$i++) {}
				rename($directory.$types[$_GET['id']]['id'].'.'.$types[$_GET['id']]['extension_readonly'],$directory.$types[$_GET['id']]['id'].$i.'.'.$types[$_GET['id']]['extension_readonly']);
			}
			
			unset($erreurUp);
			if ($_FILES['readonly_file'] != NULL) {
				$max_size = 10000000; // approx. 10 MB
					if (isset($_FILES['readonly_file']))
					{
						// Test max size
						if ($_FILES['readonly_file']['size'] > $max_size)
						{
							$erreurUp = 'The maximum size is ' . $max_size/1024 . 'KB per file.';
						}
						// Upload directory exists ?
						elseif (!file_exists($directory))
						{
							$erreurUp = 'The upload directory doesn\'t exist.';
						}
						// Display error message or continue
						if(isset($erreurUp))
						{
							echo '<span class="error">' . $erreurUp . '</span><br />';
						}
						else
						{
							// Define the new filename and extension
							$extension = '.'.$types[$_GET['id']]['extension_readonly'];
							$filename = $_GET['id'];
 
							// Upload the file to the server
							if (move_uploaded_file($_FILES['readonly_file']['tmp_name'], $directory.$filename.$extension))
							{ echo '<span class="ok">Ok</span><br />'; }
							else
							{
								echo '<span class="error">Error while uploading the file.</span><br />';
							}
 
						}
					}
				} ?>
				
			<br /><p>Go back to <a href="<? echo $root; ?>">home</a></p>
		</article>	
<?
/* Section called when the id is correct but no files sent to this page */
/* This code allow the user to select two file, then he can press submit and we go to part 1 */
		 } else if ($types[$_GET['id']]['plugin'] == "files") { ?>
		<form method="POST" enctype="multipart/form-data" action="">
		<article id="file_select">
			<h2>Select the <span class="uppercase"><? echo $types[$_GET['id']]['extension_editable']; ?></span> file</h2>
			<p class="legend">Please select the editable file in <span class="uppercase"><? echo $types[$_GET['id']]['extension_editable']; ?></span> format, it will be renamed in <span class="filename"><? echo $types[$_GET['id']]['id'].".".$types[$_GET['id']]['extension_editable']; ?></span></p>
			<input type="file" name="editable_file">
			<br /><br />
			<h2>Select the <span class="uppercase"><? echo $types[$_GET['id']]['extension_readonly']; ?></span> file</h2>
			<p class="legend">Please select the editable file in <span class="uppercase"><? echo $types[$_GET['id']]['extension_readonly']; ?></span> format, it will be renamed in <span class="filename"><? echo $types[$_GET['id']]['id'].".".$types[$_GET['id']]['extension_readonly']; ?></span></p>
			<input type="file" name="readonly_file">
			<br /><br /><p class="warning"><b>Warning:</b> if you select only one file, the two current file will be backed up and only the file you've selected above will be accessible from the main page.</p><br />
			<input type="submit" value="Submit" name="submit_files">
		</article>
		</form>
<?
/* Section called when the id is not existing, can redirect to a 404 error page */
/* This script list the installed plugin and allow the user to choose between this plugins, then we will go to part 2 */
		} else { ?>
		<article id="id_select">
			<h2>Select the file name</h2>
			<p class="legend">Please select the file name you are uploading…</p>
			<form method="GET" action="">
				<select name="id">
					<? foreach($types as $element) { 
						if ($element['plugin']=="files") { ?>
							<option value="<? echo $element['id']; ?>"><? echo $element['name']; ?></option>
						<? }
					} ?>
				</select>
				<input type="submit" value="Ok">
			</form>
		</article>
		<? } ?>	
	</section>
	<footer>
		<p>
			<? echo $footer_content; ?>
		</p>
	</footer>
</body>
</html>
