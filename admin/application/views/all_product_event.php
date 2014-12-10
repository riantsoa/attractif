<?php

foreach ($all_product_event as $key=>$value)
{
    // echo "<strong>" . $value->name  . " (" . $value->id . ")</strong><br>";
    echo "<button><a href='one/" . $value->id  . "'>Edit </a></button> ";
    echo "<button><a href='del/" . $value->id  . "'>Delete </a></button><br>";
    echo '<br>';
}


?>

<?php
//var_dump($count_product_event);
//var_dump($all_product_event);

?>
</pre>

