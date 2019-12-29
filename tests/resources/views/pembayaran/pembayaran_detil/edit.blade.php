@extends('layouts.master')
@section('content')

<div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">{{$title}}</h4>
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
                <a href="{{url('/registrasi')}}">Registrasi</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="{{url('/registrasi')}}">{{$subtitle}}</a>
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
                                <input type="text" class="form-control" id="namaDepan"  placeholder="Nama Lengkap" value="{{$data->registrasi1->pasien->nocm}}" required="required" readonly="readonly">
                            </div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Pasien</label>
                                <input type="text" class="form-control" id="namaDepan"  placeholder="Nama Lengkap" value="{{$data->registrasi1->pasien->nama}}" required="required" readonly="readonly">
                            </div>
                             
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" class="form-control"  id="nama_belakang" aria-describedby="emailHelp" value="{{$data->registrasi1->pasien->tempat_lahir}}" placeholder="Tempat Lahir"  required="required" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="text" 
                                class="datepicker-here form-control" 
                                data-language='en'
                                data-position="top left"
                                value="{{$data->registrasi1->pasien->tgl_lahir}}"
                                required="required"
                                readonly="readonly"
                                />
                            </div> 
                        </div>
					
                        <div class="col-md-6 col-lg-6">				
						<div class="form-group">
                        <label for="exampleInputEmail1">No Regs</label>
                        <input type="text" class="form-control" id="kode"  name="kode" placeholder="Kode" value=" {{$data->registrasi1->no_registrasi}}" readonly="readonly">
                        </div>
                 
                        <div class="form-group">
                        <label for="exampleInputEmail1">dokter</label>
                        <select class="form-control select" style="min-width:350px;" required  name="dokter_id" readonly="readonly">
                                <option></option>         
                                    @foreach($d as $a)
                                    @if($a->id == $data->registrasi1->dokter_id)
                                    
                                    <option value='{{$a->id}}' selected >{{$a->nama_dokter}}</option>
                                    @else
                                    <option value='{{$a->id}}'>{{$a->nama_dokter}}</option>
                                    @endif
                                    @endforeach
                        </select> 
                        </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Poli</label>
                            <select class="form-control select" name="poli_id" readonly="readonly">
                                        <option></option>  
                                        @foreach($pol as $a)
                                        @if($a->id == $data->registrasi1->poli_id)
                                        <option value='{{$a->id}}' selected>{{$a->nama_poli}}</option> 
                                        @else
                                            <option value='{{$a->id}}' >{{$a->nama_poli}}</option> 
                                        @endif

                                        @endforeach
                            </select>
                            </div>    
                            <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" readonly="readonly" cols="30" rows="3">{{$data->registrasi1->keterangan}}</textarea>
                            </div>
						</div>
                    </div>
               

                 </div>
               </div>
            
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                            <button class="btn btn-success btn-round " data-toggle="modal"
                            data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Add Tindakan
                            </button>

                            <button class="btn btn-primary btn-round" data-toggle="modal"
                            data-target="#addRowModal1">
                            <i class="fa fa-plus"></i>
                            Add Item/Obat
                            </button>

                            </div>
                    </div>

                    <div class="table-responsive">
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
                                        
                                        </tbody>
                                    </table>
                               
                                </div>

                
            </div>
        </div>
  </div>
</div>


<div class="modal fade" id="addRowModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-light">
                             Data Item/Obat
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Saldo Awal</label>
                                        <input name="kas_awal" type="text" class="form-control"
                                               placeholder="Saldo Awal">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Keterangan kas</label>
                                        <input name="keterangan" type="text" class="form-control"
                                               placeholder="Alamat kas">
                                    </div>
                                </div>
                                
                            </div>

                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

{{-- modal untuk input data tindakan --}}

        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-light">
                             Data Tindakan
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Saldo Awal</label>
                                        <input name="kas_awal" type="text" class="form-control"
                                               placeholder="Saldo Awal">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Keterangan kas</label>
                                        <input name="keterangan" type="text" class="form-control"
                                               placeholder="Alamat kas">
                                    </div>
                                </div>
                                
                            </div>

                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

   

@endsection

@section('js')
<script type="text/javascript">
$(".date").datepicker({
  autoclose: true,
  locale: 'no',
  format: 'yyyy-mm-dd',
})

$('#idDokter').select2({placeholder: "Pilih Dokter...", width: '100%'});
$('#idPoli').select2({placeholder: "Pilih Poli...", width: '100%'});

$('#basic-datatables').DataTable({});
</script>
@endsection
