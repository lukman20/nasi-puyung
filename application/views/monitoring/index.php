<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->

<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header hide">
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
    <?=$this->session->flashdata('error')?>
    <?=$this->session->flashdata('success')?>
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3>Sebelum mengupload, pastikan file anda berformat <strong>.xls/.xlsx</strong></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
            <div class="box-body">
                <?php echo @$pesan; ?>
                <?= form_open_multipart('monitoring/do_upload_master') ?>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Upload File Master
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12 ini" name="master" placeholder="" type="file">
                    </div>
                </div>
                <?= form_submit('name', 'Go !', 'class = "btn btn-default"') ?>
                <?= form_close() ?>
                <?= form_open_multipart('monitoring/do_upload_tagihan') ?>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Upload File Tagihan
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12 ini" name="tagihan" placeholder="" type="file">
                    </div>
                </div>
                <?= form_submit('name', 'Go !', 'class = "btn btn-default"') ?>
                <?= form_close() ?>
            </div><!-- /.box-body -->
        </div>
        <div class="box-body">
            <div class="row" style="margin-top: 23px;">
                <div class="col-md-12">
                  <!-- Custom Tabs (Pulled to the right) -->
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                      <li class="active"><a href="#tab_1-1" data-toggle="tab">Data Realisasi</a></li>
                      <li><a href="#tab_3-3" data-toggle="tab">Data Belum Bayar</a></li>
                      <li><a href="#tab_2-2" data-toggle="tab">Rekap Perdesa</a></li>
                      <li class="pull-left header"><i class="fa fa-th"></i> Data</li>
                  </ul>
                  <div class="tab-content">
                      <div class="tab-pane active" id="tab_1-1">
                         <table class="table table-bordered table-hover datatables">
                            <thead>
                                <tr>                        
                                    <th>Petugas</th>
                                    <th>Saldo Awal</th>
                                    <th>Saldo AKhir</th>
                                    <th>Rupiah Realisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($result)!=0):?>
                                    <?php foreach ($result as $r):?>
                                        <tr>
                                            <td><?= $r->ptgs ?></td>
                                            <td><?= $r->saldo_awal ?></td>
                                            <td><?= $r->saldo_akhir ?></td>
                                            <td><?= $r->h_akhir ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                      </div><!-- /.tab-pane -->
                      <div class="tab-pane" id="tab_3-3">
                         <table class="table table-bordered table-hover datatables">
                            <thead>
                                <tr>                        
                                    <th>ID Pelanggan</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Petugas</th>
                                    <th>RP Tagihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($collection)!=0):?>
                                    <?php foreach ($collection as $c):?>
                                        <tr>
                                            <td><?= $c->idpel ?></td>
                                            <td><?= $c->nama ?></td>
                                            <td><?= $c->alamat ?></td>
                                            <td><?= $c->ptgs ?></td>
                                            <td><?= $c->rptag ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                      </div><!-- /.tab-pane -->
                      <div class="tab-pane" id="tab_2-2">
                        <table class="table table-bordered table-hover datatables">
                            <thead>
                                <tr>                        
                                    <th>Desa</th>
                                    <th>Rp Tagihan</th>
                                    <th>Petugas</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($items)!=0):?>
                                    <?php foreach ($items as $item):?>
                                        <tr>
                                            <td><?= $item->daerah ?></td>
                                            <td><?= $item->rp_tagihan ?></td>
                                            <td><?= $item->ptgs ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </div> <!-- /.row -->
</div><!-- /.box-body -->
</div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<script type="text/javascript">
    $(function () {
        $('.datatables').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
      });
    });
</script>
<?php
$this->load->view('template/foot');
?>