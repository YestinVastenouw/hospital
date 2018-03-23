<form action="<?= URL ?>client/editSave/<?= $client['client_id'] ?>" method="POST">
	<input type="text" name="firstname" value="<?= $client['client_firstname']?>">
	<input type="text" name="lastname" value="<?= $client['client_lastname']?>">
	<button type="submit">Save</button>
</form>