<div class="col-md-9">
<?php
echo "<div class=\"row\">
    <div class=\"col-lg-12\">";

echo "<h1 class=\"page-header\">Users (" . $count_user . ")</h1><br>
    </div>
</div>";


foreach ($all_user as $key=>$value)
{
    echo "<strong>" . $value->name  . " (" . $value->id . ")</strong><br>";
    echo "<a href='one/" . $value->id  . "'>Edit </a> ";
    echo "<a href='del/" . $value->id  . "'>Delete </a><br>";
    echo '<br>';
}
?>
</div>
<div class="col-md-3">
    <h1>Add new user</h1>
<?php
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



?>
</div>
<div class="col-md-12">
<pre>
<?php
var_dump($count_user);
var_dump($all_user);

?>
</pre>
</div>

