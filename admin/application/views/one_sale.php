<pre>
<?php
echo form_open($this->uri->segment(1) . '/edit/' . $this->uri->segment(3), '');
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
        echo form_datetime('date', $one_sale[0]->$key, "id='datetimepicker'");
    }
    elseif ($sale[$key]["field"] == 'product')
    {
        echo form_dropdown('product', $products, $one_sale[0]->$key);
    }
    elseif ($sale[$key]["field"] == 'user')
    {
        echo form_dropdown('user', $users, $one_sale[0]->$key);
    }
    elseif ($sale[$key]["field"] == 'event')
    {
        echo form_dropdown('user', $events, '');
    }
    else
    {
        echo form_input($sale[$key]["field"], $one_sale[0]->$key);

    }
    // echo form_input($sale[$key]["field"], $one_sale[0]->$key);
    echo '<br><br>';
}

echo form_submit('submit', 'Submit');
echo form_close();


var_dump($one_sale);

?>
</pre>

