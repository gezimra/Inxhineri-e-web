<h3>Lista e perdoruseve</h3>
<div>
<table>
<thead>
    <tr>
        <th>Emri</th>
        <th>Mbiemri</th>
        <th>Username</th>
        <th>Role</th>
        <th></th>
</tr>
</thead>
<tbody>
<?php 
if(isset($viewData['users'])) {
  
    foreach($viewData['users'] as $user) {
        echo "<tr>";
        echo "<td>".$user->firstname."</td>";
        echo "<td>".$user->lastname."</td>";
        echo "<td>".$user->username."</td>";
        echo "<td>".$user->name."</td>";
        echo '<td><a href="/admin/edit?id='.$user->id.'">Modifiko</a></td>';
        echo "</tr>";
    }

}
?>
</tbody>
</table>
</div>