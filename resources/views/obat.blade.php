@extends('templates.template')

@section('title')
Obat
@endsection

@section('content')
<div class="container-fluid" style="height: 650px">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Obat
                            <small>Apotek</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    @if(\Session::has('alert'))
                                    <div class="alert alert-success alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <i class="icon fa fa-warning"></i> {{Session::get('alert')}}
                                    </div>
                                @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Tambah Obat</button>
                    </div>
                </div>
                <div class="row" style="padding-top: 7px;">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="25%">Nama Obat</th>
                                        <th width="20%">Jenis Obat</th>
                                        <th width="15%">Kategori</th>
                                        <th width="15%">Harga</th>
                                        <th width="5%">Jumlah</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($data as $datas)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $datas->nama_obat }}</td>
                                        <td>{{ $datas->jenis_obat }}</td>
                                        <td>{{ $datas->kategori }}</td>
                                        <td>{{ $datas->harga_obat }}</td>
                                        <td>{{ $datas->jumlah_jumlah }}</td>
                                        <td>
                                            <form method="POST" action="/{{ $datas->id }}/deleteUser">
                                        <a href="/{{ $datas->id }}/editUser" class="btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-pencil"></span> Edit 
                                        </a>
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Tambah User</h4>
                    </div>
                    <div class="modal-body">
                      <form role="form" method="POST" action="{{ url('/register') }}">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="Nama">Nama Obat :</label>
                                            <input class="form-control" id="Nama" name="nama_obat" type="text" placeholder="Nama Obat">
                                        </div>
                                        <div class="form-group has-feedback">
                                          {!! Form::label('Jenis Obat :', null, ['class' => 'control-label']) !!}
                                          {!! Form::select('jenis', $jenis, null, ['class' => 'form-control', 'placeholder' => '----', 'id' => 'jenis']) !!}
                                        </div>
                                        <div class="form-group">
                                          <label for="sel1">Level :</label>
                                          <select class="form-control" id="sel1" name="level">
                                            <option value="Admin">Admin</option>
                                            <option value="Petugas">Petugas</option>
                                          </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                        <button type="button" class="btn btn-link" class="close" data-dismiss="modal">Cancel</button>
                                </form>
                    </div>
                  </div>
                  
                </div>
              </div>
@endsection