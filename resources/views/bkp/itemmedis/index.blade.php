@extends('layout.master')
@section('content')
<section class="content-header">
      <h1>
       {{$title}}
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{$subtitle}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         	@if(session('sukses'))
		<div class="alert alert-success" role="alert">
			{{session('sukses')}}
		</div>
		@endif
		@if(session('gagal'))
		<div class="alert alert-danger" role="alert">
			{{session('gagal')}}
		</div>
		@endif
		<div class="row">
			 <div class="col-md-12">
				 <div class="col-md-6">
					
				 </div>
				 <div class="row">
				 <div class="col-md-6 text-right">
				 <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">
  				Add Item
				</button>
				</div>
				</div>
	<table id="dataTableDashboard1" class="table table-bordered table-striped">
		<tr>
		<th>No</th>
		<th>Kode</th>
		<th>Nama Item</th>
		<th>Harga Beli</th>
		<th>Harga Jual</th>
        <th>Keterangan</th>
        <th>stok</th>
		<th>aktif</th>
		<th>Aksi</th>
		</tr>
	
		@foreach($data as $k)
		<?php $id = Crypt::encrypt($k->id); ?>
		<tr>
		<td>{{$no=$no+1}}</td>
		<td>{{$k->kode}}</a></td>
		<td>{{$k->nm_item }}</a></td>
		<td>{{rupiah($k->hargabeli) }}</a></td>
		<td>{{rupiah($k->hargajual)}}</td>
        <td>{{$k->keterangan}}</td>
        <td>{{$k->stok}}</td>
		<td>{{$k->aktif}}</td>
		<td><a href="{{url('/itemmedis/'.$id.'/edit')}}" class="btn btn-warning btn-xs">Update</a></td>
		</tr>
		@endforeach
		</table>
		<center>{{ $data->links() }}</center>
		</div>
	<!-- </div> -->
<!--Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM TINDAKAN<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/tindakan/create')}}" method="POST">
        	  {{csrf_field()}}
			 
			   <div class="form-group">
			    <label for="exampleInputEmail1">Kode</label>
			    <input type="text" class="form-control" name="kode"id="kode" aria-describedby="emailHelp" placeholder="kode">
			  </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Nama Tindakan </label>
			    <input type="text" class="form-control" id="nm_tindakan"  name="nm_tindakan" placeholder="Nama Tindakan">
			   </div>
			    <div class="form-group">
          <label for="exampleInputEmail1">Katagori Tindakan</label>
          <select class="select2 form-control" style="min-width:350px;" required name="katagoritindakan_id" id="idKelas">
                          <option></option>
                           @foreach($katagori as $i)
                             {
                              <option value='{{$i->id}}'>{{$i->nm_katagoritindakan }} </option>;
                              }
                          @endforeach
                          
                        </select>
          
        </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Tarif </label>
			    <input type="text" class="form-control" id="tarif"  name="tarif" placeholder="Tarif">
			   </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Fee Dokter </label>
			    <input type="text" class="form-control" id="feedokter"  name="feedokter" placeholder="Fee Dokter">
			   </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Fee Nurse </label>
			    <input type="text" class="form-control" id="feenurse"  name="feenurse" placeholder="Fee Nurse">
			   </div>
			    
		      <div class="form-group">
			    <label for="exampleFormControlTextarea1">keterangan</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan" rows="3"></textarea>
			  </div>
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submint" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
			</div>
</div>
      <!-- /.box -->

    </section>
@endsection