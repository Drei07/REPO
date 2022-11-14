<?php 
require_once('inc/sess_auth.php');
require_once('config.php'); 
if($_settings->chk_flashdata('success')): ?>
<script>
alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
</script>
<?php endif;?>
<?php $_settings->userdata('id') > 0 ?  "" :header('location:login.php'); ?>
<div class="content py-3">
    <div class="container-fluid">
        <div class="card card-outline card-primary shadow rounded-0">
            <div class="card-header rounded-0">
                <h4 class="card-title">My Capstone Projects</h4>
                <a href="./?page=submit-archive" style="float:right;" class="btn btn-primary"><i class="fa fa-edit"></i>
                    Create Project</a>
            </div>
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <table class="table table-hover table-striped">
                        <colgroup>
                            <col width="5%">
                            <col width="15%">
                            <col width="15%">
                            <col width="20%">
                            <col width="20%">
                            <col width="10%">
                            <col width="10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Created</th>
                                <th>Capstone Code</th>
                                <th>Capstone Title</th>
                                <th>Program</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                $curriculum = $conn->query("SELECT * FROM curriculum_list where id in (SELECT curriculum_id from `archive_list` where student_id = '{$_settings->userdata('id')}' )");
                                $cur_arr = array_column($curriculum->fetch_all(MYSQLI_ASSOC),'name','id');
                                $qry = $conn->query("SELECT * from `archive_list` where student_id = '{$_settings->userdata('id')}' order by unix_timestamp(`date_created`) asc ");
                                while($row = $qry->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td class=""><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                                <td><?php echo ($row['archive_code']) ?></td>
                                <td><?php echo ucwords($row['title']) ?></td>
                                <td><?php echo $cur_arr[$row['curriculum_id']] ?></td>
                                <td class="text-center">
                                    <?php
                                            if($row['status'] == 1)
                                              
                                                    echo "<span class='badge badge-success badge-pill'>Published</span>";
                                                 
                                                else
                                                    echo "<span class='badge badge-secondary badge-pill'>Not Published</span>";
                                                
                                            
                                        ?>
                                </td>
                                <td align="center">
                                    <button type="button"
                                        class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon"
                                        data-toggle="dropdown">
                                        Action
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item"
                                            href="<?= base_url ?>/?page=view_archive&id=<?php echo $row['id'] ?>"
                                            target="_blank"><span class="fa fa-external-link-alt text-gray"></span>
                                            View</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item delete_data" href="javascript:void(0)"
                                            data-id="<?php echo $row['id'] ?>"><span
                                                class="fa fa-trash text-danger"></span> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $('.delete_data').click(function() {
        _conf("Are you sure to delete this project permanently?", "delete_archive", [$(this).attr(
            'data-id')])
    })
    $('.table td,.table th').addClass('py-1 px-2 align-middle')
    $('.table').dataTable({
        columnDefs: [{
            orderable: false,
            targets: 5
        }],
    });
})

function delete_archive($id) {
    start_loader();
    $.ajax({
        url: _base_url_ + "classes/Master.php?f=delete_archive",
        method: "POST",
        data: {
            id: $id
        },
        dataType: "json",
        error: err => {
            console.log(err)
            alert_toast("An error occured.", 'error');
            end_loader();
        },
        success: function(resp) {
            if (typeof resp == 'object' && resp.status == 'success') {
                location.reload();
            } else {
                alert_toast("An error occured.", 'error');
                end_loader();
            }
        }
    })
}
</script>