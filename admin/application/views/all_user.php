
<?php
echo "<div class=\"row\">
    <div class=\"col-lg-12\">";

echo "<h1 class=\"page-header\"><span class=\"glyphicon glyphicon-user\"></span>&nbsp;&nbsp;Utilisateurs (" . $count_user . ")</h1><br>
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
foreach ($all_user as $key=>$value)
{
    echo "<tr>";
    echo "<td><strong>" . $value->name  . " (" . $value->id . ")</strong></td>";
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

foreach ($user as $key=>$value)
{
    echo '<br>';
    echo form_label($user[$key]["label"], $user[$key]["field"]) . '<br>';
    echo form_input($user[$key]["field"], '', 'class="form-control input-sm"');

}
echo '<br>';
echo form_submit('submit', 'Ajouter', 'class="btn btn-primary"');
echo form_close();



?>
</div>

<?php
// //var_dump($count_user);
// //var_dump($all_user);

?>

