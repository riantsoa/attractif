<?php
echo "<div class=\"row\">
    <div class=\"col-lg-12\">";

echo "<h1 class=\"page-header\">Products (" . $count_product . ")</h1><br>
    </div>
</div>";


$options = array();
foreach ($all_category as $key=>$value)
{
    $options[] = array($value->id=>$value->name);
}

foreach ($all_product as $key=>$value)
{
    echo "<strong>" . $value->name  . " (" . $value->id . ")</strong><br>";
    echo "<a href='one/" . $value->id  . "'>Edit </a> ";
    echo "<a href='del/" . $value->id  . "'>Delete </a><br>";
    echo '<br>';
}

echo form_open($this->uri->segment(1) . '/add/', '');
form_hidden('id', $this->uri->segment(3));

foreach ($product as $key=>$value)
{
    echo form_label($product[$key]["label"], $product[$key]["field"]) . '<br>';
    if ($product[$key]["field"] == 'category')
    {
        echo form_dropdown('category', $options, $product[$key]["field"]) . '<br>';
    }
    else
    {
        echo form_input($product[$key]["field"], '');
    }
    echo '<br><br>';
}

echo form_submit('submit', 'Submit');
echo form_close();


?>
<pre>
<?php
var_dump($count_product);
var_dump($all_product);

?>
</pre>

