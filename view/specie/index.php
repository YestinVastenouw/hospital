<h2>Species</h2>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Description</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	</tbody>
		<?php
			foreach ($species as $specie) {
				echo("<tr>");
				echo("<td>". $specie['species_id']. "</td>");
				echo("<td>". $specie['species_description']. "</td>");
				echo("<td class=\"center\"><a href=\"". URL. "specie/edit/". $specie['species_id']. "\">edit</a></td>");
				echo("<td class=\"center\"><a href=\"". URL. "specie/delete/". $specie['species_id']. "\">delete</a></td>");
				echo("</tr>");
			}
		?>
	</tbody>
</table>
<p><a href="<? URL ?>create">Create</a></p>