<table class="table table-bordered">
    <th>Email</th>
    <th>Nom</th>
    <?foreach($events as $event):?>
        <tr><td><?=$event->mail;?></td><td><?=$event->name;?></td></tr>
    <?endforeach;?>
</table>