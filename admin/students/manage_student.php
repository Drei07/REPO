<?php
require_once('../../config.php');
?>


<div class="container-fluid">
    <form action="" id="registration-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="form-group">
            <label for="firstname" class="control-label">First Name</label>
            <input type="text" name="firstname" id="firstname" autofocus placeholder="First name"
                class="form-control form-control-border" required>
        </div>
        <div class="form-group">
            <label for="middlename" class="control-label">Middle Name</label>
            <input type="text" name="middlename" id="middlename" autofocus placeholder="Middle Name"
                class="form-control form-control-border" required>
        </div>
        <div class="form-group">
            <label for="lastname" class="control-label">Last Name</label>
            <input type="text" name="lastname" id="lastname" autofocus placeholder="Last Name"
                class="form-control form-control-border" required>
        </div>
        <div class="row">
            <label for="gender" class="control-label">Gender</label>
            <div class="form-group col-auto">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="genderMale" name="gender" value="Male" required
                        checked>
                    <label for="genderMale" class="custom-control-label">Male</label>
                </div>
            </div>
            <div class="form-group col-auto">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="genderFemale" name="gender" value="Female">
                    <label for="genderFemale" class="custom-control-label">Female</label>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="form-group">
                    <span class="text-navy"><small>College</small></span>
                    <select name="department_id" id="department_id" class="form-control form-control-border select2"
                        data-placeholder="Please select college" required>
                        <option value=""></option>
                        <?php 
                                        $department = $conn->query("SELECT * FROM `department_list` where status = 1 order by `name` asc");
                                        while($row = $department->fetch_assoc()):
                                        ?>
                        <option value="<?= $row['id'] ?>"><?= ucwords($row['name']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <span class="text-navy"><small>Program</small></span>
                    <select name="curriculum_id" id="curriculum_id" class="form-control form-control-border select2"
                        data-placeholder="Please select college first" required>
                        <option value="" disabled selected>Select College First</option>
                        <?php 
                                        $curriculum = $conn->query("SELECT * FROM `curriculum_list` where status = 1 order by `name` asc");
                                        $cur_arr = [];
                                        while($row_c = $curriculum->fetch_assoc()){
                                            $row_c['name'] = ucwords($row_c['name']);
                                            $cur_arr[$row_c['department_id']][] = $row_c;
                                        }
                                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="form-control form-control-border" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="form-control form-control-border" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="cpassword" class="control-label">Confirm Password</label>
                    <input type="password" id="cpassword" placeholder="Confirm Password"
                        class="form-control form-control-border" required>
                </div>
            </div>
        </div>

    </form>
</div>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<script>
var cur_arr = $.parseJSON('<?= json_encode($cur_arr) ?>');
$(document).ready(function() {
    end_loader();
    $('.select2').select2({
        width: "100%"
    })
    $('#department_id').change(function() {
        var did = $(this).val()
        $('#curriculum_id').html("")
        if (!!cur_arr[did]) {
            Object.keys(cur_arr[did]).map(k => {
                var opt = $("<option>")
                opt.attr('value', cur_arr[did][k].id)
                opt.text(cur_arr[did][k].name)
                $('#curriculum_id').append(opt)
            })
        }
        $('#curriculum_id').trigger("change")
    })

    // Registration Form Submit
    $('#registration-form').submit(function(e) {
        e.preventDefault()
        var _this = $(this)
        $(".pop-msg").remove()
        $('#password, #cpassword').removeClass("is-invalid")
        var el = $("<div>")
        el.addClass("alert pop-msg my-2")
        el.hide()
        if ($("#password").val() != $("#cpassword").val()) {
            el.addClass("alert-danger")
            el.text("Password does not match.")
            $('#password, #cpassword').addClass("is-invalid")
            $('#cpassword').after(el)
            el.show('slow')
            return false;
        }
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Users.php?f=save_student",
            method: 'POST',
            data: _this.serialize(),
            dataType: 'json',
            error: err => {
                console.log(err)
                el.text("An error occured while saving the data")
                el.addClass("alert-danger")
                _this.prepend(el)
                el.show('slow')
                end_loader()
            },
            success: function(resp) {
                if (resp.status == 'success') {
                    location.href = "./login.php"
                } else if (!!resp.msg) {
                    el.text(resp.msg)
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('show')
                } else {
                    el.text("An error occured while saving the data")
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('show')
                }
                end_loader();
                $('html, body').animate({
                    scrollTop: 0
                }, 'fast')
            }
        })
    })
})
</script>