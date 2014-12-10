<?php

// echo $count_event . "events<br>";
echo "<div class=\"row\">
    <div class=\"col-lg-12\">";
echo "<h1 class=\"page-header\"><span class=\"glyphicon glyphicon-time\"></span>&nbsp;&nbsp;Evenements (" . $count_event . ")</h1><br>
    </div>
</div>";


foreach ($all_event as $key=>$value)
{
    echo "<strong>" . $value->name  . " (" . $value->id . ")</strong><br>";
    echo "<a href='one/" . $value->id  . "'>Edit </a> ";
    echo "<a href='del/" . $value->id  . "'>Delete </a><br>";
    echo '<br>';
}

echo form_open($this->uri->segment(1) . '/add/', '');
form_hidden('id', $this->uri->segment(3));

foreach ($event as $key=>$value)
{
    echo form_label($event[$key]["label"], $event[$key]["field"]) . '<br>';
    if($key == 'date'){
        echo form_input(array('name' => $event[$key]["field"] , 'id' => 'evenement_date'));
    }else echo form_input($event[$key]["field"], '');

    echo '<br><br>';
}

echo form_submit('submit', 'Submit');
echo form_close();

?>
<pre>
<?php
var_dump($count_event);
var_dump($all_event);

?>
</pre>
<script>
    $(function() {
        jQuery('#evenement_date').datetimepicker({lang:'fr',startDate:'+1971/05/01'});
    });
</script>

