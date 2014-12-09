<?php
echo form_open($this->uri->segment(1) . '/edit/' . $this->uri->segment(3), '');
form_hidden('id', $this->uri->segment(3));

foreach ($event as $key=>$value)
{
    echo form_label($event[$key]["label"], $event[$key]["field"]) . '<br>';
    if ($event[$key]["field"] == 'date')
    {
        echo form_datetime('date', $one_event[0]->$key, "id='datetimepicker'");
                // $data = array(
                      // 'name'=> 'date',
                      // 'id' => 'datepicker',
                      // 'type' => 'date',
                      // 'placeholder' => $one_event[0]->$key,
                      // 'value' => $one_event[0]->$key,
                    // );
// echo form_input($data);
    }
    else
    {
        echo form_input($event[$key]["field"], $one_event[0]->$key);

    }
    // echo form_input($event[$key]["field"], $one_event[0]->$key);
    echo '<br><br>';
}

echo form_submit('submit', 'Submit');
echo form_close();

?>
<pre>
<?php
var_dump($one_event[0]);
?>
</pre>

