@extends('templates.template')

@section('title')
Home
@endsection

@section('content')
<div class="container-fluid" style="height: 650px">

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                          <div class="panel-heading"><strong>Edit User</strong></div>
                          <div class="panel-body">
                              <form role="form" method="post" action="/{{ $data->id }}/updateUser">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="Nama">Nama :</label>
                                            <input class="form-control" id="Nama" name="nama" type="text" value="{{ $data->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Username">Username :</label>
                                            <input class="form-control" id="Username" name="username" type="text" value="{{ $data->username }}">
                                        </div>
                                        <div class="form-group">
                                          <label for="sel1">Level :</label>
                                          <select class="form-control" id="sel1" name="level">
                                            <option value="{{ $data->level }}">{{ $data->level }}</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Petugas">Petugas</option>
                                          </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit </button>
                                        <input type="hidden" name="_method" value="put">
                                </form>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>

            </div>
@endsection