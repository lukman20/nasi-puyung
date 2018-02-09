<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
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
            <?php echo form_open($uri_segment_one.'/save');?>
            
                  <div class="box-body">
                  <div class="form-group">
                    <label class="control-label">Select Tim </label>
                        <select class="select2_single form-control" tabindex="-1" required="required" name="id_tim">
                            <option value=""> -- </option>
                            <?php foreach($collection as $c): ?>
                                <option value="<?= $c->id ?>" <?= isset($data) && $data->id_tim==$c->id ? 'selected=""' : '' ?>><?= $c->nama_tim ?></option>
                            <?php endforeach ?>
                        </select>
                  </div>
                    <div class="form-group">
                      <label>Tanggal Laporan</label>
                      <input type="text" name="tanggal_laporan" class="form-control" placeholder="Tanggal Laporan" value="<?= isset($data) ? $data->tanggal_laporan : ''  ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Jumlah PK yang di terima</label>
                      <input type="text" name="jml_pk_terima" class="form-control" placeholder="Jumlah PK yang di terima" value="<?= isset($data) ? $data->jml_pk_terima : ''  ?>" required>
                    </div>
                     <div class="form-group">
                      <label>Jumlah PK yang di kembalikan</label>
                      <input type="text" name="jml_pk_kembali" class="form-control" placeholder="Jumlah PK yang di terima" value="<?= isset($data) ? $data->jml_pk_kembali : ''  ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Rupiah Yang di dapat</label>
                      <input type="text" name="jml_rp" class="form-control" placeholder="Jumlah Rupiah Yang di dapat" value="<?= isset($data) ? $data->jml_rp : ''  ?>" required>
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
   $(function () {
        $('.select2_single').select2();
    });
</script> 
<?php
$this->load->view('template/foot');
?>