<?php
echo "<div class=\"row\">
    <div class=\"col-lg-12\">";

echo "<h1 class=\"page-header\"><span class=\"glyphicon glyphicon-tasks\"></span>&nbsp;&nbsp;Catégories (" . $count_category . ")</h1><br>
    </div>
</div>";

?>
<div class="col-md-9">
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($all_category as $key=>$value)
{
    echo "<tr>";
    echo "<td><strong>" . $value->name  . " (" . $value->id . ")</strong></td>";
    echo "<td><button class='btn btn-default'><a href='one/" . $value->id  . "'>Modifier </a></button></td> ";
    echo "<td><button class='btn btn-default'><a href='del/" . $value->id  . "'>Supprimer </a></button></td>";
    echo "</tr>";
}
?>
    </tbody>
</table>
</div>
<div class="col-md-3">
    <h3>Créer nouveau</h3>
<?php
echo form_open($this->uri->segment(1) . '/add/', '');
form_hidden('id', $this->uri->segment(3));

foreach ($category as $key=>$value)
{
    echo form_label($category[$key]["label"], $category[$key]["field"]) . '<br>';
    echo form_input($category[$key]["field"], '', 'class="form-control input-sm"');
}

echo form_submit('submit', 'Envoyer');
echo form_close();
?>
</div>
<?php
// //var_dump($count_category);
// //var_dump($all_category);
?>


