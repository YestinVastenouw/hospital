<form action="<?= URL ?>specie/editSave/<?= $specie['species_id'] ?>" method="POST">
	<input type="text" name="description" value="<?= $specie['species_description']?>">
	<button type="submit">Save</button>
</form>