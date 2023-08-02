<style media="screen">
    .btn {
        font-size: .96rem;
    }
    profile-pic {
    width: 200px;
    max-height: 200px;
    display: inline-block;
}
img {
    max-width: 100%;
    height: auto;
}
.p-image {
  position: absolute;
  top: 10px;
  right: 10px;
  color: #666666;
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.p-image:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
  font-size: 1.2em;
}
.upload-button:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  color: #999;
}
</style>
<?php $profile = $this->Users_model->getProfile();?>
<div class="box-body box-profile">
    <?php 
        if(file_exists(FCPATH."uploads/profile/$users->id.jpg")){
            $avatar = base_url('uploads/profile/'.$users->id.'.jpg?'.time());
        }else{
            $avatar = base_url('assets/dist/img/avatar01.png');
        }
    ?>
    <div id="crop-avatar">
        <div class="avatar-view">
            <img class="profile-user-img img-responsive img-circle " src="<?php echo $avatar ?>" alt="User profile picture">
            <span class="p-image"><i class="fa fa-camera upload-button"></i>
                <form id="profile_pict" method="post" action="<?php echo site_url('users/profile_pict') ?>" enctype="multipart/form-data">
                    <input class="file-upload" type="file" name="foto_profile" style="display: none;" accept="image/jpg"/>
                </form>
            </span>
            <h3 class="profile-username text-center">
                <?php echo $profile->first_name; ?>&nbsp;<?php echo $profile->last_name; ?>
            </h3>
            <p class="text-muted text-center"><?php echo $profile->email; ?></p>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Akses</b> <a class="pull-right"><?php echo $profile->name; ?></a>
                </li>
                <li class="list-group-item">
                    <b>Tanggal Terdaftar</b> <a class="pull-right"><?php echo !is_null($user->created_on) ? date('Y-m-d H:i:s', $user->created_on) : "-"; ?></a>
                </li>
                <li class="list-group-item">
                    <b>Terakhir Login</b> <a class="pull-right"><?php echo !is_null($user->last_login) ? date('Y-m-d H:i:s', $user->last_login) : "-"; ?></a>
                </li>
            </ul>
        </div>
        <!-- Cropping modal -->
    </div>
</div><!-- /.box-body -->
<script type="text/javascript">
    $(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.img-circle').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function(){
        readURL(this);
        $("#profile_pict").submit();
    });
    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });
});
</script>