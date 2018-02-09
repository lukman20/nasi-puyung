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
            <h3 class="box-title"><a href="<?= base_url().'index.php/'.$uri_segment_one.'/add/'?>" class="btn btn-primary btn-small"> <i class="fa fa-plus"></i> Add</a></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table id="datatables" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>avatar</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Group Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($items)!=0):?>
                <?php foreach ($items as $item):?>
                    <tr>
                    <td>
                        <div class="fileupload-new thumbnail" style="width: 110px;">
                        <?php $img = base_url().'upload/images/users/'.$item->avatar; ?>
                                   <img id="thumb_image" class="text-center" src="<?= isset($img) ? $img : base_url().'upload/images/noimage.jpg' ?>" alt="" />
                          </div>
                      </td>
                    <td><?= $item->username ?></td>
                    <td><?= $item->fullname ?></td>
                    <td><?= $item->email ?></td>
                    <td><?= $item->status==1 ? 'active' : 'non active' ?></td>
                    <td><?= $item->group_name ?></td>
                    <td>
                        <a href="<?= base_url().'index.php/'.$uri_segment_one.'/update/'.$item->user_id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                        <a data-url="<?= base_url().'index.php/'.$uri_segment_one.'/delete/'.$item->user_id;?>" class="btn btn-danger btn-xs single-delete"><i class="fa fa-trash"></i></a>
                    </td>
                    </tr>
                <?php endforeach ?>
                <?php endif ?>
                </tbody>                
            </table>
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
        $('#datatables').DataTable({
            "aoColumnDefs": [
              { 'bSortable': false, 'aTargets': [0] }
            ],
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });

$(document).on('click','.single-delete', function(){
        var url = $(this).data('url');
        swal({   
                title: "Are you sure?",   
                text: "You want to delete this data!",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it!",   
                closeOnConfirm: true 
            }, function(isConfirm){
                    if(isConfirm){
                        location.replace(url);   
                    }
            });
    });
</script>
<?php
$this->load->view('template/foot');
?>