<?php
echo "<div class=\"row\">
    <div class=\"col-lg-12\">";

echo "<h1 class=\"page-header\"><span class=\"glyphicon glyphicon-shopping-cart\"></span>&nbsp;&nbsp;Ventes (" . $count_sale . ")</h1><br>
    </div>
</div>";

?>
<div class="col-md-9">
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>ref.</th>
            <th>Date</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
<?php

foreach ($all_sale as $key=>$value)
{
    echo "<tr>";
    echo "<td><strong>" . $value->id  . "</strong></td>";
    echo "<td>" . $value->date  . "</td>";
    echo "<td><a href='one/" . $value->id  . "'><button class='btn btn-primary'><span class=\"glyphicon glyphicon-edit\"></span></button></a></td> ";
    echo "<td><a href='del/" . $value->id  . "'><button class='btn btn-primary'><span class=\"glyphicon glyphicon-trash\"></span></button></a></td>";
    echo "</tr>";
}

?>
    </tbody>
</table>
</div>
<div class="col-md-3">

<?php
echo form_open($this->uri->segment(1) . '/add/' . $this->uri->segment(3), '');
form_hidden('id', $this->uri->segment(3));



$products = array();
foreach ($all_product as $key=>$value)
{
    $products[] = array($value->id=>$value->name);
}

$users = array();
foreach ($all_user as $key=>$value)
{
    $users[] = array($value->id=>$value->name);
}

$events = array();
foreach ($all_event as $key=>$value)
{
    $events[] = array($value->id=>$value->name);
}



foreach ($sale as $key=>$value)
{
    echo form_label($sale[$key]["label"], $sale[$key]["field"]) . '<br>';
    if ($sale[$key]["field"] == 'date')
    {
        echo form_datetime('date', '', 'class="form-control input-sm" required="required"  id="evenement_date"');
    }
    elseif ($sale[$key]["field"] == 'product')
    {
        echo form_dropdown('product', $products, '', 'class="form-control input-sm" required="required" ');
    }
    elseif ($sale[$key]["field"] == 'user')
    {
        echo form_dropdown('user', $users, '', 'class="form-control input-sm" required="required" ');
    }
    elseif ($sale[$key]["field"] == 'event')
    {
        echo form_dropdown('user', $events, '', 'class="form-control input-sm" required="required" ');
    }
    else
    {
        echo form_input($sale[$key]["field"], '', 'class="form-control input-sm" required="required" ');

    }
}

echo form_submit('submit', 'Ajouter', 'class="btn btn-primary"');
echo form_close();


?>
</div>
<?php
// //var_dump($count_sale);
// //var_dump($all_sale);

?>

<script>
    $(function() {
        jQuery('#evenement_date').datetimepicker({lang:'fr',startDate:new Date()});
    });
</script>
