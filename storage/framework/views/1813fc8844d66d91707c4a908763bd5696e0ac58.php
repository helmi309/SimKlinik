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
                            <a href="<?php echo e(url('/registrasi')); ?>">Registrasi</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/registrasi')); ?>"><?php echo e($subtitle); ?></a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Registrasi Pasien</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nomor RM</label>
                                        <input type="text" class="form-control" id="namaDepan"
                                               placeholder="Nama Lengkap" value="<?php echo e($data->registrasi1->pasien->nocm); ?>"
                                               required="required" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namaDepan"
                                               placeholder="Nama Lengkap" value="<?php echo e($data->registrasi1->pasien->nama); ?>"
                                               required="required" readonly="readonly">
                                    </div>

                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="nama_belakang"
                                               aria-describedby="emailHelp"
                                               value="<?php echo e($data->registrasi1->pasien->tempat_lahir); ?>"
                                               placeholder="Tempat Lahir" required="required" readonly="readonly">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                                        <input type="text"
                                               class="datepicker-here form-control"
                                               data-language='en'
                                               data-position="top left"
                                               value="<?php echo e($data->registrasi1->pasien->tgl_lahir); ?>"
                                               required="required"
                                               readonly="readonly"
                                        />
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">No Regs</label>
                                        <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode"
                                               value=" <?php echo e($data->registrasi1->no_registrasi); ?>" readonly="readonly">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">dokter</label>
                                        <select class="form-control select" style="min-width:350px;" required
                                                name="dokter_id" readonly="readonly">
                                            <option></option>
                                            <?php $__currentLoopData = $d; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($a->id == $data->registrasi1->dokter_id): ?>

                                                    <option value='<?php echo e($a->id); ?>' selected><?php echo e($a->nama_dokter); ?></option>
                                                <?php else: ?>
                                                    <option value='<?php echo e($a->id); ?>'><?php echo e($a->nama_dokter); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pilih Poli</label>
                                        <select class="form-control select" name="poli_id" readonly="readonly">
                                            <option></option>
                                            <?php $__currentLoopData = $pol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($a->id == $data->registrasi1->poli_id): ?>
                                                    <option value='<?php echo e($a->id); ?>' selected><?php echo e($a->nama_poli); ?></option>
                                                <?php else: ?>
                                                    <option value='<?php echo e($a->id); ?>'><?php echo e($a->nama_poli); ?></option>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" id="keterangan"
                                                  readonly="readonly" cols="30"
                                                  rows="3"><?php echo e($data->registrasi1->keterangan); ?></textarea>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-success btn-round " id="loadmodaltransaksitindakancreate">
                                    <i class="fa fa-plus"></i>
                                    Add Tindakan
                                </button>

                                <button class="btn btn-primary btn-round" id="loadmodaltransaksicreate">
                                    <i class="fa fa-plus"></i>
                                    Add Item/Obat
                                </button>

                                <button class="btn btn-warning btn-round" id="printprev">
                                    <i class="fa fa-print"></i>
                                    Print Preview
                                </button>

                                <button class="btn btn-danger btn-round" id="postingpembayaran">
                                    <i class="fa fa-save"></i>
                                    Posting
                                </button>
                               
                                <h4>  Total Bill: Rp.<?php echo e(number_format($total,2,',','.')); ?></h4>
                               
                            </div>
                        </div>

                        <div class="table-responsive" id="reloadpaginate">
                            <?php echo $__env->make('pembayaran.pembayaran_detil.paginate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>

     
        <div id="modaladdtransaksi"></div>
        <div id="loadmodaltembyaddtransaksi"></div>
        <div id="modaladdtransaksitindakan"></div>
        <div id="loadmodalTindakanbyaddtransaksi"></div>
        
        
        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('js'); ?>

            <script type="text/javascript">
                $(document).ready(function () {
                    //function show modal create
                    $("#loadmodaltransaksicreate").click(function () {
                        $("#loadmodaltransaksicreate").prop('disabled', true);
                        $('#modaladdtransaksi').load("/load-modal-data-create-transaksi/" + '<?php echo Crypt::encrypt($data->id); ?>');
                    })
                    $("#loadmodaltransaksitindakancreate").click(function () {
                        $("#loadmodaltransaksitindakancreate").prop('disabled', true);
                        $('#modaladdtransaksitindakan').load("/load-modal-data-create-transaksi-tindakan/" + '<?php echo Crypt::encrypt($data->id); ?>');
                    })
                    $(document).on('click', '.delete', function (event) {
                        event.preventDefault();
                        var $this = $(this);
                        var id = $this.data('id');
                        swal({
                            title: 'Apakah Anda Yakin ?',
                            text: "Hapus Data Tersebut!",
                            type: 'warning',
                            buttons: {
                                confirm: {
                                    text: 'Ya, Hapus!',
                                    className: 'btn btn-success'
                                },
                                cancel: {
                                    visible: true,
                                    className: 'btn btn-danger'
                                }
                            }
                        })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $.ajax({
                                        url: '/hapus-pembayaran-detail/' + id,
                                        data: {
                                            "id": id,
                                            "_token": $("input[name='_token']").val(),
                                        },
                                        type: 'post',
                                        success: function (response) {

                                            swal(
                                                'Hapus!',
                                                'Data Berhasil Dihapus.',
                                                'success'
                                            )
                                            $('#reloadpaginate').load("/pembayaran_detil/" + '<?php echo Crypt::encrypt($data->id); ?>' + "/edit");

                                        },

                                    })
                                }
                            })

                    })
                })
                $(".date").datepicker({
                    autoclose: true,
                    locale: 'no',
                    format: 'yyyy-mm-dd',
                })

                $('#idDokter').select2({placeholder: "Pilih Dokter...", width: '100%'});
                $('#idPoli').select2({placeholder: "Pilih Poli...", width: '100%'});

                $('#basic-datatables').DataTable({});

                function validate(evt) {
                    var theEvent = evt || window.event;

                    // Handle paste
                    if (theEvent.type === 'paste') {
                        key = event.clipboardData.getData('text/plain');
                    } else {
                        // Handle key press
                        var key = theEvent.keyCode || theEvent.which;
                        key = String.fromCharCode(key);
                    }
                    var regex = /[0-9]|\./;
                    if (!regex.test(key)) {
                        theEvent.returnValue = false;
                        if (theEvent.preventDefault) theEvent.preventDefault();
                    }
                }
            </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Kerja\klinik-master\klinik-master\resources\views/pembayaran/pembayaran_detil/edit.blade.php ENDPATH**/ ?>