<?php

foreach ($all_product_event as $key=>$value)
{
    echo "<strong>" . $value->name  . " (" . $value->id . ")</strong><br>";
    echo "<a href='one/" . $value->id  . "'>Edit </a> ";
    echo "<a href='del/" . $value->id  . "'>Delete </a><br>";
    echo '<br>';
}


?>
<pre>
<?php
var_dump($count_product_event);
var_dump($all_product_event);

?>
</pre>

