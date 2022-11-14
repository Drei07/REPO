<?php if($_settings->userdata('type') == 1 || $_settings->userdata('type') == 2  ): ?>
<h1><?php echo ($_settings->info('name')) ?></h1>
<hr class="border-info">
<style>
.size {
    height: 100px;
}
</style>
<div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="size info-box bg-info  ">
            <span class="info-box-icon elevation-1"><i class="fas fa-th-list"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">DHVSU Colleges</span>
                <span class="info-box-number text-right">
                    Total: <?php 
                    echo $conn->query("SELECT * FROM `department_list` where status = 1")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="size info-box bg-gradient-dark ">
            <span class="info-box-icon  elevation-1"><i class="fas fa-scroll"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">DHVSU Programs</span>
                <span class="info-box-number text-right">
                    Total: <?php
                    echo $conn->query("SELECT * FROM `curriculum_list` where `status` = 1")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="size info-box bg-primary ">
            <span class="info-box-icon elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">DHVSU Students</span>
                <span class="info-box-number text-right">
                    Total: <?php 
                    echo $conn->query("SELECT * FROM `student_list` where `status` = 1")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="size info-box bg-warning ">
            <span class="info-box-icon elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">DHVSU Instructors</span>
                <span class="info-box-number text-right">
                    Total: <?php 
                    echo $conn->query("SELECT * FROM `users` where `type` = 5")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="size info-box bg-secondary ">
            <span class="info-box-icon elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">DHVSU VPRET</span>
                <span class="info-box-number text-right">
                    Total: <?php 
                    echo $conn->query("SELECT * FROM `users` where `type` = 3")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="size info-box bg-secondary ">
            <span class="info-box-icon elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">DHVSU DIRR</span>
                <span class="info-box-number text-right">
                    Total: <?php 
                 echo $conn->query("SELECT * FROM `users` where `type` = 4")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="size info-box bg-secondary ">
            <span class="info-box-icon elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">DHVSU MIS</span>
                <span class="info-box-number text-right">
                    Total: <?php 
                    echo $conn->query("SELECT * FROM `users` where `type` = 2")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <?php if($_settings->userdata('type') == 1 ): ?>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="size info-box bg-danger ">
            <span class="info-box-icon elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">DHVSU Superadmin</span>
                <span class="info-box-number text-right">
                    Total: <?php 
                    echo $conn->query("SELECT * FROM `users` where `type` = 1")->num_rows;
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>
<?php
if($_settings->userdata('type') >= 3){
    redirect('admin/?page=projects');
}
?>