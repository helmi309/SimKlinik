<table id="basic-datatables" class="display table table-striped table-hover">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Item</th>
        <th>Katagori</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Diskon</th>
        <th>SubTotal</th>
        <th>Aksi</th>
    </tr>
    </thead>

    <tbody>
    <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($no=$no+1); ?></td>
            <td><?php echo e($k->nama_item); ?></td>
            <td><?php echo e($k->katagori_item); ?></td>
            <td>Rp.<?php echo e(number_format($k->harga_jual,2,',','.')); ?></td>
            <td><?php echo e($k->qty); ?></td>
            <td><?php echo e($k->diskon); ?></td>
            <td>Rp.<?php echo e(number_format($k->subtotal,2,',','.')); ?></td>
            <td>
                <button title="Hapus Data" class="btn btn-outline-danger delete" data-id="<?php echo e($k->id); ?>">
                    <i class="fa fa-trash"></i></button>
            </td>
        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
    <script>
        $(document).ready(function () {
            $('#basic-datatables').DataTable({});
        });
    </script>
<?php /**PATH E:\Kerja\klinik-master\klinik-master\resources\views/pembayaran/pembayaran_detil/paginate.blade.php ENDPATH**/ ?>