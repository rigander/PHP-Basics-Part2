<h3>Адрес</h3>
<p>Ukraine, Odesa, Deribasivska street 21</p>
<h3>Задайте вопрос</h3>
<form action='<?= $_SERVER['REQUEST_URI']?>' method='post'>
	<label>Letter theme: </label><br />
	<input name='subject' type='text' size="50"/><br />
	<label>Content: </label><br />
	<textarea name='body' cols="50" rows="10"></textarea><br /><br />
	<input type='submit' value='Отправить' />
</form>	
