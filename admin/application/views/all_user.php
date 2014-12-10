<pre>
<?php
foreach ($all_user as $key=>$value)
{
    echo "<strong>" . $value->name  . " (" . $value->id . ")</strong><br>";
    echo "<a href='one/" . $value->id  . "'>Edit </a> ";
    echo "<a href='del/" . $value->id  . "'>Delete </a><br>";
    echo '<br>';
}

echo form_open($this->uri->segment(1) . '/add/', '');
form_hidden('id', $this->uri->segment(3));

foreach ($user as $key=>$value)
{
    echo form_label($user[$key]["label"], $user[$key]["field"]) . '<br>';
    echo form_input($user[$key]["field"], '');

    echo '<br><br>';
}

echo form_submit('submit', 'Submit');
echo form_close();

var_dump($count_user);
var_dump($all_user);

?>
</pre>

