<?php
echo "<div class=\"row\">
    <div class=\"col-lg-12\">";

echo "<h1 class=\"page-header\"><span class=\"glyphicon glyphicon-phone\"></span>&nbsp;&nbsp;Produits (" . $count_product . ")</h1><br>
    </div>
</div>";


$options = array();
foreach ($all_category as $key=>$value)
{
    $options[] = array($value->id=>$value->name);
}
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
foreach ($all_product as $key=>$value)
{
    echo "<tr>";
    echo "<td><strong>" . $value->name  . " (" . $value->id . ")</strong></td> ";
    echo "<td><button class='btn btn-default'><a href='one/" . $value->id  . "'><span class=\"glyphicon glyphicon-edit\"></span> </a></button></td> ";
    echo "<td><button class='btn btn-default'><a href='del/" . $value->id  . "'><span class=\"glyphicon glyphicon-trash\"></span> </a></button></td>";
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

foreach ($product as $key=>$value)
{
    echo '<br>';
    echo form_label($product[$key]["label"], $product[$key]["field"]) . '<br>';
    if ($product[$key]["field"] == 'category')
    {
        echo form_dropdown('category', $options, $product[$key]["field"], 'class="form-control input-sm" required="required" ') ;
    }
    else
    {
        echo form_input($product[$key]["field"], '', 'class="form-control input-sm" required="required" ');
    }
}
echo '<br>';
echo form_submit('submit', 'Envoyer', 'class="btn btn-primary"');
echo form_close();


?>
</div>
<?php
// //var_dump($count_product);
// //var_dump($all_product);

?>

