<?php

foreach ($all_event_user as $key=>$value)
{
    echo "<strong>" . $value->name  . " (" . $value->id . ")</strong><br>";
    echo "<button><a href='one/" . $value->id  . "'>Edit </a></button> ";
    echo "<button><a href='del/" . $value->id  . "'>Delete </a></button><br>";
    echo '<br>';
}



?>
<?php
// //var_dump($count_event_user);
// //var_dump($all_event_user);

?>

