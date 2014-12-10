<div class="col-md-9">
<?php

echo "<h1>Event: " . $one_event[0]->name   . "</h1><br>";
echo form_open($this->uri->segment(1) . '/edit/' . $this->uri->segment(3), '');
form_hidden('id', $this->uri->segment(3));

foreach ($event as $key=>$value)
{
    echo form_label($event[$key]["label"], $event[$key]["field"]) . '<br>';
    if ($event[$key]["field"] == 'date')
    {
        echo form_datetime('date', $one_event[0]->$key, "id='datetimepicker'");
    }
    else
    {
        echo form_input($event[$key]["field"], $one_event[0]->$key);

    }
    // echo form_input($event[$key]["field"], $one_event[0]->$key);
    echo '<br><br>';
}

echo form_submit('submit', 'Submit');
echo form_close();

?>
</div>
<div class="col-md-3">
    <h2>Products</h2>
    <ol>
    <?php
    foreach ($all_product_event as $key=>$value)
    {
        // echo $all_product[$key]->id;
        // echo $all_product[$key]->name;
        echo "<li><a href='" . $this->uri->segment(1) . '/../../../product_event/del/' . $all_product_event[$key]->id . "'>Retirer " . $all_product_event[$key]->name . "</a></li>";
        // var_dump($all_product[$key]->name);
        // var_dump($all_product[$key]->id);
        echo '<br>';
        // die;
    }
    // var_dump($all_product);
    ?>
    </ol>
    <h2>Add new product</h2>
<?php
echo form_open($this->uri->segment(1) . '/../../index.php/product_event/add/', '');
// //

print_r($form_product_event);
$options = array();
foreach ($all_product as $key=>$value)
{
    echo $value->id;
    echo $value->name;
    $options[] = array($value->id=>$value->name);
}

foreach ($form_product_event as $key=>$value)
{
    if ($form_product_event[$key]["field"] == 'product')
    {
        // echo form_label($form_product_event[$key]["label"], $form_product_event[$key]["field"]) . '<br>';
        echo form_dropdown('product', $options, '' . '<br>');
    }
    echo '<br><br>';
}
// //
echo form_submit('submit', 'Submit');
echo form_close();
?>
</div>
<div class="col-md-12">
<pre>
<?php
var_dump($all_product_event);
var_dump($all_product);
var_dump($one_event[0]);
?>
</pre>

