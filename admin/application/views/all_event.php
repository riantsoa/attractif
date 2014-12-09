<pre>
<?php

echo $count_event . "events<br>";

foreach ($all_event as $key=>$value)
{
    echo "<a href='one/" . $value->id  . "'>Edit " . $value->name . "</a><br>";
}

echo form_open($this->uri->segment(1) . '/add/', '');
form_hidden('id', $this->uri->segment(3));

foreach ($event as $key=>$value)
{
    echo form_label($event[$key]["label"], $event[$key]["field"]) . '<br>';
    echo form_input($event[$key]["field"], '');

    echo '<br><br>';
}

echo form_submit('submit', 'Submit');
echo form_close();

var_dump($count_event);
var_dump($all_event);

?>
</pre>

