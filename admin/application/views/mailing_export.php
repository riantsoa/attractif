
<div class="row">
    <div class="col-lg-12">
    <h1 class="page-header"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Export mail</h1><br>
    </div>
</div>


<div class="col-md-12">
    <h3></h3>
    <div class="col-md-6">
        <div role="form"  style="width: 100%;">
            <label for="date_event_mailing" class="">Evenement : </label>
            <select name="id_event" class="form-control" style="width:89%;" id="id_event_select">
                <option value="" selected="0">-- Selectionner un évenement --</option>
                <?foreach($events as $event):?>
                    <option value="<?=$event->id;?>"><?=$event->name;?></option>
                <?endforeach;?>
            </select>
            <br>
            <input type="submit" onclick="export_csv_action($('#id_event_select').val());return false;" style="width: 30%;" class="btn btn-primary" value="Exporter"/>
        </div>
    </div>
    <div class="col-md-6">
        <label for="date_event_mailing" class="">Liste des mails des participants: </label>
        <div id="content_event_mailing"></div>

    </div>
</div>

<script>

    //Code Starts
    $(document).ready(function() {

        $( "#id_event_select" ).change(function() {
            var event_id = $(this).val();
            $.ajax({
                url : '<?=site_url('mailing/export_mail_csv_ajax')?>',
                type : 'POST', // Le type de la requête HTTP, ici devenu POST
                data : {event_id:event_id},
                dataType : 'html',
                success : function(code_html, statut){ // code_html contient le HTML renvoyé
                    $('#content_event_mailing').html(code_html);
                }
        });
        });
    });

    function export_csv_action(e_id){
        if(e_id==0) return;
            window.open('<?=site_url('mailing/get_csv?e_id=')?>'+e_id, 'window name', 'window settings')
        return false;
    }
</script>