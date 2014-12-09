<?php
echo form_open($this->uri->segment(1) . '/edit/' . $this->uri->segment(3), '');
form_hidden('id', $this->uri->segment(3));

foreach ($product as $key=>$value)
{
    echo form_label($product[$key]["label"], $product[$key]["field"]) . '<br>';
    if ($product[$key]["field"] == 'newsletter')
    {
        $options = array(
                  '1'  => 'Oui',
                  '0'    => 'Non',
                );
        echo form_dropdown('newsletter', $options, $one_product[0]->$key);
    }
    elseif ($product[$key]["field"] == 'alert')
    {
        $options = array(
                  '1'  => 'Oui',
                  '0'    => 'Non',
                );
        echo form_dropdown('alert', $options, $one_product[0]->$key);
    }
    elseif ($product[$key]["field"] == 'admin')
    {
        $options = array(
                  '1'  => 'Oui',
                  '0'    => 'Non',
                );
        echo form_dropdown('admin', $options, $one_product[0]->$key);
    }
    elseif ($product[$key]["field"] == 'mail')
    {
        echo form_email($product[$key]["field"], $one_product[0]->$key);
    }
    else
    {
        echo form_input($product[$key]["field"], $one_product[0]->$key);
    }
    echo '<br><br>';
}





echo form_submit('submit', 'Submit');
echo form_close();

?>
<pre>
<?php
var_dump($one_product[0]);
?>
</pre>

