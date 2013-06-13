<? include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="<? echo $full_name; ?>">
	<link rel="stylesheet" href="stylesheet.css" media="screen, handheld" />
	<title>Publish a file − <? echo $full_name; ?></title>
</head>
<body>
	<header><h1>Publish a file</h1></header>
	<section>
		<? if ( isset($_POST['submit_files']) ) { ?>
		<article id="file_upload">
			<h2>The files are uploading</h2>
			<p>Uploading <? echo $types[$_GET['id']]['id'].'.'.$types[$_GET['id']]['extension_editable'];?>…</p>
		 
			<?
			if(file_exists("editable/".$types[$_GET['id']]['id'].'.'.$types[$_GET['id']]['extension_editable']))
			{
				for($i=1;file_exists("readonly/".$types[$_GET['id']]['id'].$i.'.'.$types[$_GET['id']]['extension_editable']);$i++) {}
				rename("editable/".$types[$_GET['id']]['id'].'.'.$types[$_GET['id']]['extension_editable'],"editable/".$types[$_GET['id']]['id'].$i.'.'.$types[$_GET['id']]['extension_editable']);
			}		 

			 if ($_FILES['editable_file'] != NULL) {
				$max_size = 10000000; // approx. 10 MB
					$directory = 'editable/'; // directory
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
			if(file_exists("readonly/".$types[$_GET['id']]['id'].'.'.$types[$_GET['id']]['extension_readonly']))
			{
				for($i=1;file_exists("readonly/".$types[$_GET['id']]['id'].$i.'.'.$types[$_GET['id']]['extension_readonly']);$i++) {}
				rename("readonly/".$types[$_GET['id']]['id'].'.'.$types[$_GET['id']]['extension_readonly'],"readonly/".$types[$_GET['id']]['id'].$i.'.'.$types[$_GET['id']]['extension_readonly']);
			}
			
			unset($erreurUp);
			if ($_FILES['readonly_file'] != NULL) {
				$max_size = 10000000; // approx. 10 MB
					$directory = 'readonly/'; // directory
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
				
			<br /><p>Go back to <a href="./">home</a></p>
		</article>	
				
		<? } else if( !isset($_GET['id']) || !isset($types[$_GET['id']]) ) { ?>
		<article id="id_select">
			<h2>Select the file name</h2>
			<p class="legend">Please select the file name you are uploading…</p>
			<form method="GET" action="">
				<select name="id">
					<? foreach($types as $element) { ?>
					<option value="<? echo $element['id']; ?>"><? echo $element['name']; ?></option>
					<? } ?>
				</select>
				<input type="submit" value="Ok">
			</form>
		</article>
		<? } else if ( !isset($_GET['submit_files']) ) { ?>
		<form method="POST" enctype="multipart/form-data" action="">
		<article id="file_select">
			<h2>Select the <span class="uppercase"><? echo $types[$_GET['id']]['extension_editable']; ?></span> file</h2>
			<p class="legend">Please select the editable file in <span class="uppercase"><? echo $types[$_GET['id']]['extension_editable']; ?></span> format, it will be renamed in <span class="filename"><? echo $types[$_GET['id']]['id'].".".$types[$_GET['id']]['extension_editable']; ?></span></p>
			<input type="file" name="editable_file">
			<br /><br />
			<h2>Select the <span class="uppercase"><? echo $types[$_GET['id']]['extension_readonly']; ?></span> file</h2>
			<p class="legend">Please select the editable file in <span class="uppercase"><? echo $types[$_GET['id']]['extension_readonly']; ?></span> format, it will be renamed in <span class="filename"><? echo $types[$_GET['id']]['id'].".".$types[$_GET['id']]['extension_readonly']; ?></span></p>
			<input type="file" name="readonly_file">
			<br /><br />
			<input type="submit" value="Submit" name="submit_files">
		</article>
		</form>
		<? } ?>
	</section>
	<footer>
		<p>
			<? echo $footer_content; ?>
		</p>
	</footer>
</body>
</html>
