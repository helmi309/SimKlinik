<?php $__env->startSection('content'); ?>
<div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="page-header">
            <h4 class="page-title"><?php echo e($title); ?></h4>
            <ul class="breadcrumbs">
              <li class="nav-home">
                <a href="#">
                  <i class="flaticon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('/registrasi')); ?>">registrasi</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(url('/registrasi')); ?>"><?php echo e($subtitle); ?></a>

              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              
               <!-- <a href="<?php echo e(url('/pasien/cari')); ?>" class="btn btn-danger btn-round ml-1"> <i class="fa fa-search"></i>cari data pasien</a> -->
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                  <h4 class="card-title"><?php echo e($subtitle); ?></h4>
              
                </div>
                </div>
                <div class="card-body">
                    <?php if(session('sukses')): ?>
                 <div class="alert alert-success" role="alert">
                <?php echo e(session('sukses')); ?>

                </div>  
                 <?php endif; ?>
                  <?php if(session('gagal')): ?>
                 <div class="alert alert-danger" role="alert">
                <?php echo e(session('gagal')); ?>

                </div>  
                 <?php endif; ?>
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                       <tr>
                        <th>No</th>
                        <th>No Reg</th>
                        <th>Nama Pasien</th>
                        <th>Dokter</th>
                        <th>Poli</th>
                        <!-- <th>Usia</th> -->
                        <th>Tgl Reg</th>
                        <th>Aksi</th>
                        </tr>
                      </thead>
                     
                      <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $id = Crypt::encrypt($k->id); ?>
                            <tr>
                            <td><?php echo e($no=$no+1); ?></td>
                            <td><?php echo e($k->no_registrasi); ?></td>
                            <td><?php echo e($k->pasien->nama); ?></td>
                            <td><?php echo e($k->dokter->nama_dokter); ?></td>
                            <td><?php echo e($k->poli->nama_poli); ?></td>
                            <!-- <td><?php echo e(hitung_usia($k->tgl_lahir)); ?></td> -->
                            <td><?php echo e(tgl_indo($k->tgl_reg)); ?></td>
                            <td>
                            <form id="cencel-regitrasi" action=" <?php echo e(url('pembayaran/lanjut/'.$k->id)); ?>" method="post">
                                                <?php echo e(csrf_field()); ?>

                                                
                                                <button type="button" class="btn btn-success btn-xs" onclick="confirmCencel('cencel-regitrasi')">Proses</button>
                                            </form>
                            
                            </td>
                            </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
</div>


       
<!-- TES -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
$(document).ready(function() {
      $('#basic-datatables').DataTable({
      });

// $(document).ready(function() {
//     $('#datatable').DataTable({
//         processing:true,
//         serverside:true,
//         ajax:"<?php echo e(route('ajax.get.data.pasien')); ?>",
//         columns:[
//             {data:'nocm',name:'nocm'},
//             {data:'nama',name:'nama'},
//             {data:'tanggal_indo',name:'tanggal_indo'},
//             {data:'alamat',name:'alamat'},
//             {data:'pekerjaan',name:'pekerjaan'}
//         ]
//     })
// });

  $('#multi-filter-select').DataTable( {
        "pageLength": 5,
        initComplete: function () {
          this.api().columns().every( function () {
            var column = this;
            var select = $('<select class="form-control"><option value=""></option></select>')
            .appendTo( $(column.footer()).empty() )
            .on( 'change', function () {
              var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
                );

              column
              .search( val ? '^'+val+'$' : '', true, false )
              .draw();
            } );

            column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
          } );
        }
      });

      // Add Row
      $('#add-row').DataTable({
        "pageLength": 5,
      });

      var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $('#addRowButton').click(function() {
        $('#add-row').dataTable().fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action
          ]);
        $('#addRowModal').modal('hide');

      });
    });


</script>

<script>
        function confirmCencel(item_id) {
            swal({
                 title: 'Apakah Anda Yakin Melajutkan Pembayaran?',
                  text: "Registrasi akan di closing!",
                  type: 'warning',
                  buttons:{
                  confirm: {
                   text : 'Yes, Lanjutkan!',
                    className : 'btn btn-success'
                  },
                  cancel: {
                  visible: true,
                  className: 'btn btn-danger'
                 }
              }
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#'+item_id).submit();
                    } 
                });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Kerja\klinik-master\klinik-master\resources\views/pembayaran/pembayaran/index.blade.php ENDPATH**/ ?>