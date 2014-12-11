<?php
echo form_open($this->uri->segment(1) . '/edit/' . $this->uri->segment(3), '');
form_hidden('id', $this->uri->segment(3));

foreach ($category as $key=>$value)
{
    echo form_label($category[$key]["label"], $category[$key]["field"]) . '<br>';
    echo form_input($category[$key]["field"], $one_category[0]->$key, 'class="form-control input-sm" required="required" ');
    echo '<br><br>';
}

echo form_submit('submit', 'Envoyer', 'class="btn btn-primary"');
echo form_close();

?>

<?php
//var_dump($one_category[0]);
?>
</pre>
