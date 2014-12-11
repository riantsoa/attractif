
<?php
echo "<div class=\"row\">
    <div class=\"col-lg-12\">";

echo "<h1 class=\"page-header\"><span class=\"glyphicon glyphicon-user\"></span>&nbsp;&nbsp;Utilisateurs (" . $count_user . ")</h1><br>
    </div>
</div>";

?>
<div class="col-md-9">

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Email</th>
            <th>Nom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($all_user as $key=>$value)
{
    echo "<tr>";
    echo "<td><strong>" . $value->id  . "</strong></td>";
    echo "<td><strong>" . $value->mail  . "</strong></td>";
    echo "<td><strong>" . $value->name  . "</strong></td>";
    echo "<td><a href='one/" . $value->id  . "'><button class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span> </button></a></td> ";
    echo "<td><button class='btn btn-default'><a href='del/" . $value->id  . "'><span class='glyphicon glyphicon-trash'></span> </a></button></td>";
    echo "</tr>";
}
?>

    </tbody>
</table>
</div>
<div class="col-md-3">
    <h3>Nouveau</h3>
<?php
echo form_open($this->uri->segment(1) . '/add/', '');
form_hidden('id', $this->uri->segment(3));

foreach ($user as $key=>$value)
{
    echo '<br>';
    echo form_label($user[$key]["label"], $user[$key]["field"]) . '<br>';
    if ($user[$key]["field"] == 'newsletter')
    {
        $options = array(
                  '1'  => 'Oui',
                  '0'    => 'Non',
                );
        echo form_dropdown('newsletter', $options, '', 'class="form-control input-sm" required="required" ');
    }
    elseif ($user[$key]["field"] == 'admin')
    {
        $options = array(
                  '1'  => 'Oui',
                  '0'    => 'Non',
                );
        echo form_dropdown('admin', $options, '', 'class="form-control input-sm" required="required" ');
    }
    elseif ($user[$key]["field"] == 'mail')
    {
        echo form_email($user[$key]["field"], '', 'class="form-control input-sm" required="required" ');
    }
    else {
        echo form_input($user[$key]["field"], '', 'class="form-control input-sm" required="required" ');
    }
    echo'<br>';

}
echo '<br>';
echo form_submit('submit', 'Ajouter', 'class="btn btn-primary"');
echo form_close();



?>
</div>

<?php
// //var_dump($count_user);
// //var_dump($all_user);

?>

