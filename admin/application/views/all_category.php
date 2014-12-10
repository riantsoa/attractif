<pre>
<?php

echo "<h1>Categories (" . $count_category . ")</h1><br>";

foreach ($all_category as $key=>$value)
{
    echo "<strong>" . $value->name  . " (" . $value->id . ")</strong><br>";
    echo "<a href='one/" . $value->id  . "'>Edit </a> ";
    echo "<a href='del/" . $value->id  . "'>Delete </a><br>";
    echo '<br>';
}

echo form_open($this->uri->segment(1) . '/add/', '');
form_hidden('id', $this->uri->segment(3));

foreach ($category as $key=>$value)
{
    echo form_label($category[$key]["label"], $category[$key]["field"]) . '<br>';
    echo form_input($category[$key]["field"], '');

    echo '<br><br>';
}

echo form_submit('submit', 'Submit');
echo form_close();

var_dump($count_category);
var_dump($all_category);
?>
</pre>

