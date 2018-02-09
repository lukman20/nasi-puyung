<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
    <style type="text/css">
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
    </style>
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Blank page
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><a href="<?= base_url().'index.php/'.$uri_segment_one?>" class="btn btn-primary btn-small"> <i class="fa fa-arrow-left"></i> Back to list</a></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?php echo form_open_multipart($uri_segment_one.'/save');?>
            <input type="hidden" name="user_id" value="<?= isset($data) ? $data->user_id : ''  ?>"/>
                  <div class="box-body">
                  <div class="form-group">
                     <div class="fileupload-new thumbnail" style="width: 520px;">
                        <?php isset($data->avatar) ? $img = base_url().'upload/images/users/'.$data->avatar : base_url().'upload/images/noimage.jpg'; ?>
                                   <img id="thumb_image" class="text-center" src="<?= isset($img) ? $img : base_url().'upload/images/noimage.jpg' ?>" alt="" />
                          </div>
                  </div>
                    <div class="form-group">
                      <label>Avatar</label>
                            <span class="form-control btn btn-default btn-file">
                                <i class="fa fa-camera"></i> Browse <input class="form-control" name="avatar" placeholder="" type="file" accept="image/*" onchange="preview(event)">
                            </span>                    
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Username" value="<?= isset($data) ? $data->username : ''  ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" name="fullname" class="form-control" placeholder="Full Name" value="<?= isset($data) ? $data->fullname : ''  ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="<?= isset($data) ? $data->email : ''  ?>" required>
                    </div>
                    <?php if($type=='create'): ?>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Password" value="<?= isset($data) ? $data->password : ''  ?>" required>
                    </div>
                    <?php endif ?>
                    <div class="form-group">
                      <label>Status</label>
                      <div class="form-group">
                          <input type="radio" name="status" class="flat-red" value="1" <?= isset($data) && $data->status=='1' ? 'checked=""' : '' ?> > Active
                          <input type="radio" name="status" class="flat-red" value="0" <?= isset($data) && $data->status=='0' ? 'checked=""' : '' ?>> Non Active
                      </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label">Select Group </label>
                        <select class="select2_single form-control" tabindex="-1" required="required" name="group_id" {!! isset($data) && $data->id==1 ? 'disabled' : '' !!}>
                            <option value=""> -- </option>
                            <?php foreach($items as $item): ?>
                                <option value="<?= $item->group_id ?>" <?= isset($data) && $data->group_id==$item->group_id ? 'selected=""' : '' ?>><?= $item->group_name ?></option>
                            <?php endforeach ?>
                        </select>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            <?php echo form_close(); ?>
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<script type="text/javascript">
   function preview(event) {
        var output = document.getElementById('thumb_image');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script> 
<?php
$this->load->view('template/foot');
?>