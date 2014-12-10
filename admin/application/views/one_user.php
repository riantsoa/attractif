<?php
echo form_open($this->uri->segment(1) . '/edit/' . $this->uri->segment(3), '');
form_hidden('id', $this->uri->segment(3));

foreach ($user as $key=>$value)
{
    echo form_label($user[$key]["label"], $user[$key]["field"]) . '<br>';
    if ($user[$key]["field"] == 'newsletter')
    {
        $options = array(
                  '1'  => 'Oui',
                  '0'    => 'Non',
                );
        echo form_dropdown('newsletter', $options, $one_user[0]->$key);
    }
    elseif ($user[$key]["field"] == 'alert')
    {
        $options = array(
                  '1'  => 'Oui',
                  '0'    => 'Non',
                );
        echo form_dropdown('alert', $options, $one_user[0]->$key);
    }
    elseif ($user[$key]["field"] == 'admin')
    {
        $options = array(
                  '1'  => 'Oui',
                  '0'    => 'Non',
                );
        echo form_dropdown('admin', $options, $one_user[0]->$key);
    }
    elseif ($user[$key]["field"] == 'mail')
    {
        echo form_email($user[$key]["field"], $one_user[0]->$key, 'class="form-control input-sm"');
    }
    else
    {
        echo form_input($user[$key]["field"], $one_user[0]->$key, 'class="form-control input-sm"');
    }
    echo '<br><br>';
}





echo form_submit('submit', 'Envoyer');
echo form_close();

?>

<?php
//var_dump($one_user[0]);
?>
</pre>

