<h2>Clients</h2>
<table>
	<thead>
		<tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	</tbody>
		<?php
			foreach ($clients as $client) {
				echo("<tr>");
				echo("<td>". $client['client_firstname']. "</td>");
				echo("<td>". $client['client_lastname']. "</td>");
				echo("<td class=\"center\"><a href=\"". URL. "client/edit/". $client['client_id']. "\">edit</a></td>");
				echo("<td class=\"center\"><a href=\"". URL. "client/delete/". $client['client_id']. "\">delete</a></td>");
				echo("</tr>");
			}
		?>
	</tbody>
</table>
<p><a href="<? URL ?>create">Create</a></p>