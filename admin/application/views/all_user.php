<pre>
<?php
foreach ($all_user as $key=>$value)
{
    echo "<a href='one/" . $value->id  . "'>Edit " . $value->name . "</a><br>";
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

