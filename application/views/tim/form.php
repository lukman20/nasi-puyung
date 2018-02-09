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
        Form Permohonan Work Permit
        <small>Diharapkan mengsi data dengan lengkap dan benar</small>
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
            <input type="hidden" name="id" value="<?= isset($data) ? $data->id : ''  ?>"/>

                  <div class="box-body">
                 
                    <div class="form-group">
                      <label>No. SPK</label>
                      <input type="text" name="no_spk" class="form-control" placeholder="No. SPK" value="<?= isset($data) ? $data->no_spk : ''  ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Pelaksana</label>
                      <input type="text" name="pelaksana" class="form-control" placeholder="Pelaksana" value="<?= isset($data) ? $data->pelaksana : ''  ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Uraian Pekerjaan</label>
                      <input type="text" name="uraian_kerja" class="form-control" placeholder="Uraian pekerjaan" value="<?= isset($data) ? $data->uraian_kerja : ''  ?>" required>
                    </div>

                     <div class="form-group">
                      <label>Unit Kerja</label>
                      <input type="text" name="anggota" class="form-control" placeholder="Input Anggota Pisahkan dengan tanda ," value="<?= isset($data) ? $data->anggota : ''  ?>" required>
                    </div>

                    <div class="form-group">
                    <label class="control-label">Unit Kerja</label>
                        <select class="select2_single form-control" tabindex="-1" required="required" name="jenis_tim">
                            <option value=""> -- </option>
                            <?php for($i=1;$i<=10;$i++): ?>
                                <option value="tim-<?= $i ?>" <?= isset($data) && $data->jenis_tim=='tim-'.$i ? 'selected=""' : '' ?>>
                                Tim-<?= $i ?>
                                </option>
                            <?php endfor ?>
                        </select>
                  </div>
                   <div class="form-group">
                      <label>Lokasi Pekerjaan</label>
                      <input type="text" name="anggota" class="form-control" placeholder="Input Anggota Pisahkan dengan tanda ," value="<?= isset($data) ? $data->anggota : ''  ?>" required>
                    </div>

                     <div class="form-group">
                      <label>apakah perlu pemadaman</label>
                      <input type="text" name="anggota" class="form-control" placeholder="Input Anggota Pisahkan dengan tanda ," value="<?= isset($data) ? $data->anggota : ''  ?>" required>
                    </div>
                     <div class="form-group">
                      <label>apakah perlu grounding</label>
                      <input type="text" name="anggota" class="form-control" placeholder="Input Anggota Pisahkan dengan tanda ," value="<?= isset($data) ? $data->anggota : ''  ?>" required>
                    </div>

                     <div class="form-group">
                    <label class="control-label">Apakah Perlu Pemadaman ?</label>
                        <select class="select2_single form-control" tabindex="-1" required="required" name="jenis_tim">
                            <option value=""> -- </option>
                            <?php for($i=1;$i<=10;$i++): ?>
                                <option value="tim-<?= $i ?>" <?= isset($data) && $data->jenis_tim=='tim-'.$i ? 'selected=""' : '' ?>>
                                Tim-<?= $i ?>
                                </option>
                            <?php endfor ?>
                        </select>
                  </div>

                   <div class="form-group">
                    <label class="control-label">Apakah Perlu Grounding ?</label>
                        <select class="select2_single form-control" tabindex="-1" required="required" name="jenis_tim">
                            <option value=""> -- </option>
                            <?php for($i=1;$i<=10;$i++): ?>
                                <option value="tim-<?= $i ?>" <?= isset($data) && $data->jenis_tim=='tim-'.$i ? 'selected=""' : '' ?>>
                                Tim-<?= $i ?>
                                </option>
                            <?php endfor ?>
                        </select>
                  </div>

                   <div class="form-group">
                      <label>Tgl. Mulai</label>
                      <input type="text" name="anggota" class="form-control" placeholder="Input Anggota Pisahkan dengan tanda ," value="<?= isset($data) ? $data->anggota : ''  ?>" required>
                    </div>

                     <div class="form-group">
                      <label>Tgl. Selesai</label>
                      <input type="text" name="anggota" class="form-control" placeholder="Input Anggota Pisahkan dengan tanda ," value="<?= isset($data) ? $data->anggota : ''  ?>" required>
                    </div>

                   <!--
                   <div class="form-group">
                       <label>Tgl. Mulai</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                        </div>
                
                  
                  </div>

                  <div class="form-group">
                       <label>Tgl. Selesais</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                        </div>
              
                  </div>

                -->

                     <div class="form-group">
                      <label>Tgl. Selesai pekerjaan</label>
                      <input type="text" name="anggota" class="form-control" placeholder="Input Anggota Pisahkan dengan tanda ," value="<?= isset($data) ? $data->anggota : ''  ?>" required>
                    </div>

                     <div class="form-group">
                      <label>Penyulang yang dipadamkan</label>
                      <input type="text" name="padam_penyulang" class="form-control" placeholder="Input Anggota Pisahkan dengan tanda ," value="<?= isset($data) ? $data->apadam_penyulang : ''  ?>" required>
                    </div>

                    <div class="form-group">
                      <label>APD disediakan oleh :</label>
                      <input type="text" name="apd" class="form-control" placeholder="Input Anggota Pisahkan dengan tanda ," value="<?= isset($data) ? $data->apd : ''  ?>" required>
                    </div>

                     <div class="form-group">
                      <label>Penanggung Jawab</label>
                      <input type="text" name="pj" class="form-control" placeholder="Input Anggota Pisahkan dengan tanda ," value="<?= isset($data) ? $data->pj : ''  ?>" required>
                    </div>


                    <div class="form-group">
                      <label>Pengawas K3</label>
                      <input type="text" name="pengawask3" class="form-control" placeholder="Input Anggota Pisahkan dengan tanda ," value="<?= isset($data) ? $data->pengawask3 : ''  ?>" required>
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