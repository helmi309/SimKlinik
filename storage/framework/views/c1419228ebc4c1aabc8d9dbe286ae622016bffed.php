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
    <?php
    if($cekposting == count($row)){
$disabled = "disabled";
$cursor = "not-allowed";
    }
    else{
        $disabled = "";
        $cursor = "pointer";
    }
    ?>
        <tr>

            <td><?php echo e($no=$no+1); ?></td>
            <td><?php echo e($k->nama_item); ?></td>
            <td><?php echo e($k->katagori_item); ?></td>
            <td>Rp.<?php echo e(number_format($k->harga_jual,2,',','.')); ?></td>
            <td><?php echo e($k->qty); ?></td>
            <td><?php echo e($k->diskon); ?></td>
            <td>Rp.<?php echo e(number_format($k->subtotal,2,',','.')); ?></td>
            <td>
                <button title="Hapus Data" <?php echo e($disabled); ?> style="cursor: <?php echo e($cursor); ?>"class="btn btn-outline-danger delete" data-id="<?php echo e($k->id); ?>">
                    <i class="fa fa-trash"></i></button>
            </td>
        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
    <script>
    var cekposting ='<?php echo e($cekposting); ?>';
    var cekcountrow ='<?php echo e(count($row)); ?>';
    
    if(cekposting != cekcountrow){
        document.getElementById('cekposting').innerHTML = '<button class="btn btn-danger btn-round" id="posting" data-id="<?php echo Crypt::encrypt($data->id); ?>" data-jenis="Posting" data-value="N"><i class="fa fa-save"></i>Posting</button>';
        document.getElementById('addtindakan').innerHTML = '';
        document.getElementById('additem').innerHTML = '';
        document.getElementById('addtindakan').innerHTML = '<button class="btn btn-success btn-round" id="loadmodaltransaksitindakancreate"><i class="fa fa-plus"></i>Add Tindakan</button>';
        document.getElementById('additem').innerHTML = '<button class="btn btn-primary btn-round" id="loadmodaltransaksicreate"><i class="fa fa-plus"></i>Add Item/Obat</button>';
           }
    else{
    if(cekcountrow == 0){
        document.getElementById('cekposting').innerHTML = '<button class="btn btn-danger btn-round" id="posting" data-id="<?php echo Crypt::encrypt($data->id); ?>" data-jenis="Posting" data-value="N"><i class="fa fa-save"></i>Posting</button>';
        document.getElementById('addtindakan').innerHTML = '';
        document.getElementById('additem').innerHTML = '';
        
        document.getElementById('addtindakan').innerHTML = '<button class="btn btn-success btn-round" id="loadmodaltransaksitindakancreate"><i class="fa fa-plus"></i>Add Tindakan</button>';
        document.getElementById('additem').innerHTML = '<button class="btn btn-primary btn-round" id="loadmodaltransaksicreate"><i class="fa fa-plus"></i>Add Item/Obat</button>';

    }
    else{
        document.getElementById('cekposting').innerHTML = '<button class="btn btn-danger btn-round" id="posting" data-id="<?php echo Crypt::encrypt($data->id); ?>" data-jenis="Batal Posting" data-value="Y"><i class="fa fa-save"></i>Batal Posting</button>';
        document.getElementById('addtindakan').innerHTML = '<button disabled style="cursor: not-allowed;" class="btn btn-success btn-round " id="loadmodaltransaksitindakancreate"><i class="fa fa-plus"></i>Add Tindakan</button>';
        document.getElementById('additem').innerHTML = '<button disabled style="cursor: not-allowed;" class="btn btn-primary btn-round" id="loadmodaltransaksicreate"><i class="fa fa-plus"></i>Add Item/Obat</button>'

    }
    }
    var subtotal = document.getElementById('subtotal');
    subtotal.innerHTML = "Rp. "+"<?php echo e(number_format($total,2,',','.')); ?>"
        $(document).ready(function () {
            $('#basic-datatables').DataTable({});
        });
    </script>
<?php /**PATH E:\Kerja\klinik-master-new\resources\views/pembayaran/pembayaran_detil/paginate.blade.php ENDPATH**/ ?>