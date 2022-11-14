<?php 
require_once('inc/sess_auth.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT a.* FROM `archive_list` a where a.id = '{$_GET['id']}'");
    if($qry->num_rows){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
    $submitted = "N/A";
    if(isset($student_id)){
        $student = $conn->query("SELECT * FROM student_list where id = '{$student_id}'");
        if($student->num_rows > 0){
            $res = $student->fetch_array();
            $submitted = $res['email'];
        }
    }
}
?>
<style>
#document_field {
    min-height: 80vh
}
</style>
<?php if(isset($status) && isset($status) == 1) {
    echo '<style>.hide{display:none;}</style>';
    }else
    { 
        echo "<style>.hide{display:block;}</style>";
        }?>
<div class="col-lg-6 mx-auto">
    <div class="content py-4">
        <div class="col-12">
            <div class="card card-outline card-primary shadow rounded-0">
                <div class="card-header">
                    <h3 class="card-title">
                        Capstone ID - <?= isset($archive_code) ? $archive_code : "" ?>
                    </h3>
                    <div class="hide" style="float:right;">
                        <?php if(isset($student_id) && $_settings->userdata('login_type') == "2" && $student_id == $_settings->userdata('id')): ?>
                        <div class="form-group">
                            <a href="./?page=submit-archive&id=<?= isset($id) ? $id : "" ?>" class="btn btn-primary "><i
                                    class="fa fa-edit"></i> Edit</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body rounded-0">
                    <div class="container-fluid">
                        <h2><b><?= isset($title) ? $title : "" ?></b></h2>
                        <small class="text-muted">Submitted by <b class="text-info"><?= $submitted ?></b> on
                            <?= date("F d, Y h:i A",strtotime($date_created)) ?></small>

                        <hr>
                        <center>
                            <img src="<?= validate_image(isset($banner_path) ? $banner_path : "") ?>" alt="Banner Image"
                                id="banner-img" class="img-fluid border bg-gradient-dark">
                        </center>
                        <fieldset>
                            <legend class="text-navy mx-auto">Project Year:</legend>
                            <div class="pl-4">
                                <large><?= isset($year) ? $year : "----" ?></large>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="text-navy">Abstract:</legend>
                            <div class="pl-4">
                                <large><?= isset($abstract) ? html_entity_decode($abstract) : "" ?></large>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="text-navy">Members:</legend>
                            <div class="pl-4">
                                <large><?= isset($members) ? html_entity_decode($members) : "" ?></large>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="text-navy">Project Document:</legend>
                            <div class="pl-4">
                                <iframe src="<?= isset($document_path) ? base_url.$document_path : "" ?>"
                                    frameborder="0" id="document_field" class="text-center w-100">Loading Document
                                    ...</iframe>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $('.delete-data').click(function() {
        _conf("Are you sure to delete <b>Archive-<?= isset($archive_code) ? $archive_code : "" ?></b>",
            "delete_archive")
    })
})

function delete_archive() {
    start_loader();
    $.ajax({
        url: _base_url_ + "classes/Master.php?f=delete_archive",
        method: "POST",
        data: {
            id: "<?= isset($id) ? $id : "" ?>"
        },
        dataType: "json",
        error: err => {
            console.log(err)
            alert_toast("An error occured.", 'error');
            end_loader();
        },
        success: function(resp) {
            if (typeof resp == 'object' && resp.status == 'success') {
                location.replace("./");
            } else {
                alert_toast("An error occured.", 'error');
                end_loader();
            }
        }
    })
}
</script>