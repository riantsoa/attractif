<?php
echo form_open($this->uri->segment(1) . '/edit/' . $this->uri->segment(3), '');
form_hidden('id', $this->uri->segment(3));
$options = array();
foreach ($all_category as $key=>$value)
{
    $options[] = array($value->id=>$value->name);
}
foreach ($product as $key=>$value)
{
    echo form_label($product[$key]["label"], $product[$key]["field"]) . '<br>';
    if ($product[$key]["field"] == 'category')
    {
        echo form_dropdown('category', $options, $one_product[0]->$key, 'class="form-control input-sm" required="required" ');
    }
    elseif ($product[$key]["field"] == 'descript')
    {
        echo form_textarea($product[$key]["field"], $one_product[0]->$key, 'class="form-control input-sm" required="required" ');
    }
    else
    {
        echo form_input($product[$key]["field"], $one_product[0]->$key, 'class="form-control input-sm" required="required" ');
    }
    echo '<br><br>';
}

echo form_submit('submit', 'Envoyer', 'class="btn btn-primary"');
echo form_close();

?>

<?php
//var_dump($one_product[0]);
?>
</pre>

