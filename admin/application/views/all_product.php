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
            <th>ref.</th>
            <th>Nom</th>
            <th>Qté</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($all_product as $key=>$value)
{
    echo "<tr>";
    echo "<td><strong>" . $value->id  . "</strong></td> ";
    echo "<td><strong>" . $value->name  . "</strong></td> ";
    echo "<td><strong>" . $value->quantity  . "</strong></td> ";
    echo "<td><a href='one/" . $value->id  . "'><button class='btn btn-primary'><span class=\"glyphicon glyphicon-edit\"></span></button></a></td> ";
    echo "<td><a href='del/" . $value->id  . "'><button class='btn btn-primary'><span class=\"glyphicon glyphicon-trash\"></span></button></a></td>";
    echo "</tr>";
}
?>
    </tbody>
</table>
</div>
<div class="col-md-3">
    <h3>Nouveau</h3>

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

