<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

body {
    font-family: 'Poppins';
}

.nav-logo {
    width: 30px;
    height: 30px;
    border-radius: 60px;
}

.user-img {
    position: absolute;
    height: 27px;
    width: 27px;
    object-fit: cover;
    left: -7%;
    top: -12%;
}

.btn-rounded {
    border-radius: 50px;
}
</style>
<!-- Navbar -->
<style>
#login-nav {
    position: fixed !important;
    top: 0 !important;
    z-index: 1037;
    padding: 1em 1.5em !important;
}

#top-Nav {
    top: 4em;
}

.text-sm .layout-navbar-fixed .wrapper .main-header~.content-wrapper,
.layout-navbar-fixed .wrapper .main-header.text-sm~.content-wrapper {
    margin-top: calc(3.6) !important;
    padding-top: calc(5em) !important;
}
</style>

<nav class="bg-primary bg-gradiant w-100 px-2 position-fixed top-0" id="login-nav">
    <div class="d-flex justify-content-between w-100">
        <div>
            <h5 class="mr-2 mt-1 text-white"><img src="<?php echo $_settings->info('logo') ?>" class="nav-logo"
                    alt="logo" srcset=""> <?php echo $_settings->info('short_name') ?></h5>
        </div>
        <div>
            <?php if($_settings->userdata('id') > 0): ?>
            <a href="./?page=projects" class="mx-2 text-light me-2">List of Capstone</a>
            <a href="./?page=my_archives" class="mx-2 text-light">Projects</a>
            <a href="./?page=profile" class="mx-2 text-light">Profile</a>
            <span class="mx-2"><img src="<?= validate_image($_settings->userdata('avatar')) ?>" alt="User Avatar"
                    id="student-img-avatar"></span>
            <?= !empty($_settings->userdata('firstname') || $_settings->userdata('lastname')) ? strtoupper($_settings->userdata('lastname')) .", ". strtoupper($_settings->userdata('firstname')) : $_settings->userdata('email') ?>

            <a href="<?= base_url.'classes/Login.php?f=student_logout' ?>" class="mx-2 text-light">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- /.navbar -->
<script>
$(function() {
    $('#search-form').submit(function(e) {
        e.preventDefault()
        if ($('[name="q"]').val().length == 0)
            location.href = './';
        else
            location.href = './?' + $(this).serialize();
    })
    $('#search_icon').click(function() {
        $('#search-field').addClass('show')
        $('#search-input').focus();

    })
    $('#search-input').focusout(function(e) {
        $('#search-field').removeClass('show')
    })
    $('#search-input').keydown(function(e) {
        if (e.which == 13) {
            location.href = "./?page=projects&q=" + encodeURI($(this).val());
        }
    })

})
</script>