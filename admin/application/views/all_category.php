<?php
echo "<div class=\"row\">
    <div class=\"col-lg-12\">";

echo "<h1 class=\"page-header\"><span class=\"glyphicon glyphicon-trash\"></span>&nbsp;&nbsp;Catégories (" . $count_category . ")</h1><br>
    </div>
</div>";

?>
<div class="col-md-9">
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Modifier</span></th>
            <th>Supprimer</span></th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($all_category as $key=>$value)
{
    echo "<tr>";
    echo "<td><strong>" . $value->name  . "</strong></td>";
    echo "<td><button class='btn btn-default'><a href='one/" . $value->id  . "'><span class='glyphicon glyphicon-edit'></span> </a></button></td> ";
    echo "<td><button class='btn btn-default'><a href='del/" . $value->id  . "'><span class='glyphicon glyphicon-trash'></span> </a></button></td>";
    echo "</tr>";
}
?>
    </tbody>
</table>
</div>
<div class="col-md-3">
<?php
echo form_open($this->uri->segment(1) . '/add/', '');
form_hidden('id', $this->uri->segment(3));

foreach ($category as $key=>$value)
{
    echo form_label($category[$key]["label"], $category[$key]["field"]) . '<br>';
    echo form_input($category[$key]["field"], '', 'class="form-control input-sm"');
}

echo form_submit('submit', 'Ajouter', 'class="btn btn-primary"');
echo form_close();
?>
</div>
<?php
// //var_dump($count_category);
// //var_dump($all_category);
?>


