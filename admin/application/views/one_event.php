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
        // print_r($all_product_event[$key]);
        echo "<li><a href='" . $this->uri->segment(1) . '/../../../product_event/del/' . $all_product_event[$key]->id  . "/" . $this->uri->segment(3) . "'>Remove " . $all_product_event[$key]->name . " " . $all_product_event[$key]->id . "</a></li>";
        echo '<br>';
        // die;
    }
    // var_dump($all_product);
    ?>
    </ol>
<hr>
<h2>Add new product</h2>
<?php
echo form_open($this->uri->segment(1) . '/../product_event/add/', '');
// //

// print_r($form_product_event);
$options = array();
foreach ($all_product as $key=>$value)
{
    $options[] = array($value->id=>$value->name);
}
// var_dump($options);
// $options = array('toto'=>'1');
foreach ($form_product_event as $key=>$value)
{
    echo form_hidden('id', $this->uri->segment(3));
    echo form_hidden('event', $this->uri->segment(3));
    if ($form_product_event[$key]["field"] == 'product')
    {
        echo form_dropdown('product', $options, '');
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

