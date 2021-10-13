<h3>Lista e Postimeve</h3>
<div>
<table>
<thead>
    <tr>
        <th>Titulli</th>
        <th>Text</th>
        <th>Kategoria</th>
        <th></th>
</tr>
</thead>
<tbody>
<?php 
if(isset($viewData['newslist'])) {
  
    foreach($viewData['newslist'] as $news) {
        echo "<tr>";
        echo "<td>".$news->title."</td>";
        echo "<td>".$news->text."</td>";
        echo "<td>".$news->name."</td>";
        echo '<td><a href="/admin/newsedit?id='.$news->id.'">Modifiko</a></td>';
        echo "</tr>";
    }

}
?>
</tbody>
</table>
</div>