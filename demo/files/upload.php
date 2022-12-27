<pre>
<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		var_dump($_FILES);
        $n = $_FILES['userfile']['name'];
        $t = $_FILES['userfileclea']['tmp_name'];
        move_uploaded_file($t, $n);
	}
?>
<form action='upload.php' method='post'
      enctype='multipart/form-data'>
<input type='file' name='userfile'>
<input type='submit'>
</form>

