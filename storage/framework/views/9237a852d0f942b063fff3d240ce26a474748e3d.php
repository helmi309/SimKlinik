<div class="modal fade" id="modal_pilih_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="min-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header" style="background: #8fbdfa">
                <center><h5 class="modal-title" id="exampleModalLabel">Daftar Tindakan</h5></center>
                <button type="button" class="close" id="closemodalcustomercreate" data-toggle=""
                        title="Keluar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-portlet__body">
                    <table class="display table table-striped table-hover"  style="width:100%"
                           id="add-item-datatables">
                        <thead>
                        <tr align="center">
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Item</th>
                            <th>Kategori</th>
                            <th>Harga Jual</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody align="center">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($no=$no+1); ?></td>
                                <td><?php echo e($row->kode); ?></td>
                                <td><?php echo e($row->nama_tindakan); ?></td>
                                <td><?php echo e($row->tindakan_kategori->nama_tindakan_katagori); ?></td>
                                <td>Rp.<?php echo e(number_format($row->harga_jual,2,',','.')); ?></td>
                                <td>
                                    <button class="btn btn-outline-info" data-id="<?php echo e($row->id); ?>"
                                            data-nama="<?php echo e($row->nama_tindakan); ?>" id="PilihItemData"
                                            title="Pilih Item"><i class="fa fa-check"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#add-item-datatables').DataTable({});
        // pilih customer
        $(document).off('click', '#PilihItemData')
        $(document).on('click', '#PilihItemData', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            $("input[name='nama_item']").val(nama)
            $("input[name='kode']").val(id)
            $('#modal_pilih_item').modal('hide');
            $('#ModalAddTransaksi').css('overflow', 'auto')
            $('#ModalAddTransaksi').modal({backdrop: 'static'});
        })


        $("#showmodalitembyinput").prop('disabled', false);
        $("#showmodalitembybutton").prop('disabled', false);
        // show modal pilih customer
        $('#ModalAddTransaksi').modal('hide');
        $('#modal_pilih_item').modal({backdrop: 'static'})
        $('#modal_pilih_item').css('overflow', 'auto')

        // close modal pilih customer
        $("#closemodalcustomercreate").click(function () {
            $('#ModalAddTransaksi').css('overflow', 'auto')
            $('#modal_pilih_item').modal('hide');
            $('#ModalAddTransaksi').modal({backdrop: 'static'}
            )
        })
        $("#closemodalcustomercreateclose").click(function () {
            $('#ModalAddTransaksi').css('overflow', 'auto')
            $('#modal_pilih_item').modal('hide');
            $('#ModalAddTransaksi').modal({backdrop: 'static'})
        })
    })
</script><?php /**PATH E:\Kerja\klinik-master\klinik-master\resources\views/pembayaran/pembayaran_detil/moda_pilih_tindakan.blade.php ENDPATH**/ ?>