<pre>
<?php

echo $count_sale . "sales<br>";

foreach ($all_sale as $key=>$value)
{
    echo "<strong>" . $value->date  . " (" . $value->id . ")</strong><br>";
    echo "<a href='one/" . $value->id  . "'>Edit </a> ";
    echo "<a href='del/" . $value->id  . "'>Delete </a><br>";
    echo '<br>';
}

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
        echo form_datetime('date', '', "id='datetimepicker'");
    }
    elseif ($sale[$key]["field"] == 'product')
    {
        echo form_dropdown('product', $products, '');
    }
    elseif ($sale[$key]["field"] == 'user')
    {
        echo form_dropdown('user', $users, '');
    }
    elseif ($sale[$key]["field"] == 'event')
    {
        echo form_dropdown('user', $events, '');
    }
    else
    {
        echo form_input($sale[$key]["field"], '');

    }
    // echo form_input($sale[$key]["field"], $one_sale[0]->$key);
    echo '<br><br>';
}

echo form_submit('submit', 'Submit');
echo form_close();


var_dump($count_sale);
var_dump($all_sale);

?>
</pre>

