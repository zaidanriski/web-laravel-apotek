@extends('templates.template')

@section('title')
User
@endsection

@section('content')
<div class="container-fluid" style="height: 650px">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data User
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
                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Tambah User</button>
                    </div>
                </div>
                <div class="row" style="padding-top: 7px;">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="30%">Nama</th>
                                        <th width="25%">Username</th>
                                        <th width="15%">Level</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($data as $datas)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $datas->nama }}</td>
                                        <td>{{ $datas->username }}</td>
                                        <td>{{ $datas->level }}</td>
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
                                            <label for="Nama">Nama :</label>
                                            <input class="form-control" id="Nama" name="nama" type="text" placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="Username">Username :</label>
                                            <input class="form-control" id="Username" name="username" type="text" placeholder="Username">
                                        </div>

                                        <div class="form-group">
                                            <label for="Password">Password :</label>
                                            <input class="form-control" id="Password" name="password" type="password" placeholder="Password">
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