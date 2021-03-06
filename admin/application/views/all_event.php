<?php

// echo $count_event . "events<br>";
echo "<div class=\"row\">
    <div class=\"col-lg-12\">";
echo "<h1 class=\"page-header\"><span class=\"glyphicon glyphicon-time\"></span>&nbsp;&nbsp;Événements (" . $count_event . ")</h1><br>
    </div>
</div>";

?>
<div class="col-md-9">
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Id.</th>
            <th>Nom</th>
            <th>Date</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
<?php

foreach ($all_event as $key=>$value)
{
    echo "<tr>";
    echo "<td>" . $value->id  . "</td>";
    echo "<td><strong>" . $value->name  . "</strong></td>";
    echo "<td>" . $value->date  . "</td>";
    echo "<td><a href='one/" . $value->id  . "'><button class='btn btn-primary'><span class=\"glyphicon glyphicon-edit\"></span></button></a></td> ";
    echo "<td><a href='del/" . $value->id  . "'><button class='btn btn-primary'><span class=\"glyphicon glyphicon-trash\"></span></button></a></td>";
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

foreach ($event as $key=>$value)
{
    echo form_label($event[$key]["label"], $event[$key]["field"]) . '<br>';

    if($key == 'date'){
        echo form_input(array('name' => $event[$key]["field"] , 'class'=>'form-control input-sm', 'id' => 'evenement_date', 'required' => 'required')) . '<br>';
    }
    elseif ($event[$key]["field"] == 'descript')
    {
        echo form_textarea($event[$key]["field"], '', 'class="form-control input-sm" required="required" ');

    }else echo form_input($event[$key]["field"], '', 'class="form-control input-sm" required="required" ') . '<br>';

}

echo form_submit('submit', 'Ajouter', 'class="btn btn-primary"');
echo form_close();

?>

<script>
    $(function() {
        jQuery('#evenement_date').datetimepicker({lang:'fr',startDate:'+1971/05/01'});
    });
</script>
