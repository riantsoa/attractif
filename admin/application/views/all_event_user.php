<?php

foreach ($all_event_user as $key=>$value)
{
    echo "<strong>" . $value->name  . " (" . $value->id . ")</strong><br>";
    echo "<a href='one/" . $value->id  . "'>Edit </a> ";
    echo "<a href='del/" . $value->id  . "'>Delete </a><br>";
    echo '<br>';
}



?>
<pre>
<?php
var_dump($count_event_user);
var_dump($all_event_user);

?>
</pre>

