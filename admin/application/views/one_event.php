<div class="col-md-6">
<?php

echo "<h1>Evénement: " . $one_event[0]->name   . "</h1><br>";
echo form_open($this->uri->segment(1) . '/edit/' . $this->uri->segment(3), '');
form_hidden('id', $this->uri->segment(3));

foreach ($event as $key=>$value)
{
    echo form_label($event[$key]["label"], $event[$key]["field"]) . '<br>';
    if ($event[$key]["field"] == 'date')
    {
        echo form_datetime('date', $one_event[0]->$key, 'class="form-control input-sm" id="evenement_date"');
        // echo form_input(array('name' => $event[$key]["field"] , 'class'=>'form-control input-sm', 'id' => 'evenement_date')) . '<br>';
    }
    elseif ($event[$key]["field"] == 'descript')
    {
        echo form_textarea($event[$key]["field"], $one_event[0]->$key, 'class="form-control input-sm"');

    }
    else
    {
        echo form_input($event[$key]["field"], $one_event[0]->$key, 'class="form-control input-sm"');

    }
    // echo form_input($event[$key]["field"], $one_event[0]->$key);
    echo '<br><br>';
}

echo form_submit('submit', 'Envoyer', 'class="btn btn-primary"');
echo form_close();

?>
</div>
<div class="col-md-3">
    <h2>Produits</h2>
    <ol>
    <?php
    foreach ($all_product_event as $key=>$value)
    {
        // print_r($all_product_event[$key]);
        echo "<li><a href='" . $this->uri->segment(1) . '/../../../product_event/del/' . $all_product_event[$key]->id  . "/" . $this->uri->segment(3) . "'>Supprimer " . $all_product_event[$key]->name . " " . $all_product_event[$key]->id . "</a></li>";
        echo '<br>';
        // die;
    }
    // //var_dump($all_product);
    ?>
    </ol>
<hr>
<!--
</div>
<div class="col-md-3">
-->
<h2>Ajouter nouveau</h2>
<?php
echo form_open($this->uri->segment(1) . '/../product_event/add/', '');
// //

// print_r($form_product_event);
$options = array();
foreach ($all_product as $key=>$value)
{
    $options[] = array($value->id=>$value->name);
}
// //var_dump($options);
// $options = array('toto'=>'1');
foreach ($form_product_event as $key=>$value)
{
    echo form_hidden('id', $this->uri->segment(3));
    echo form_hidden('event', $this->uri->segment(3));
    if ($form_product_event[$key]["field"] == 'product')
    {
        echo form_dropdown('product', $options, '', 'class="form-control input-sm"');
    }
    echo '<br><br>';
}
// //
echo form_submit('submit', 'Envoyer', 'class="btn btn-primary"');
echo form_close();
?>
</div>

<div class="col-md-3">
    <h2>Utilisateurs</h2>
    <ol>
    <?php
    // foreach ($all_product_event as $key=>$value)
    // {
        // echo "<li><a href='" . $this->uri->segment(1) . '/../../../product_event/del/' . $all_product_event[$key]->id  . "/" . $this->uri->segment(3) . "'>Supprimer " . $all_product_event[$key]->name . " " . $all_product_event[$key]->id . "</a></li>";
        // echo '<br>';
    // }

foreach ($all_event_user as $key=>$value)
{
    print_r($value);
}
    // //var_dump($all_product);
    ?>
    </ol>
<hr>
<h2>Ajouter nouveau</h2>
<?php
echo form_open($this->uri->segment(1) . '/../product_event/add/', '');
// //

// print_r($form_product_event);
$options = array();
foreach ($all_product as $key=>$value)
{
    $options[] = array($value->id=>$value->name);
}
// //var_dump($options);
// $options = array('toto'=>'1');
foreach ($form_product_event as $key=>$value)
{
    echo form_hidden('id', $this->uri->segment(3));
    echo form_hidden('event', $this->uri->segment(3));
    if ($form_product_event[$key]["field"] == 'product')
    {
        echo form_dropdown('product', $options, '', 'class="form-control input-sm"');
    }
    echo '<br><br>';
}
// //
echo form_submit('submit', 'Envoyer', 'class="btn btn-primary"');
echo form_close();
?>
</div>
<div class="col-md-12">

<?php
//var_dump($all_product_event);
//var_dump($all_product);
//var_dump($one_event[0]);
?>

<script>
    $(function() {
        jQuery('#evenement_date').datetimepicker({lang:'fr',startDate:'+1971/05/01'});
    });
</script>
