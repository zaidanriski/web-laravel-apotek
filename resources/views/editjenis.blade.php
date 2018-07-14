@extends('templates.template')

@section('title')
Edit Jenis Obat
@endsection

@section('content')
<div class="container-fluid" style="height: 650px">

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                          <div class="panel-heading"><strong>Edit Jenis Obat</strong></div>
                          <div class="panel-body">
                              <form role="form" method="post" action="/{{ $data->id }}/updatejenis">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="Nama">Jenis Obat :</label>
                                            <input class="form-control" id="Nama" name="jenis" type="text" value="{{ $data->jenis }}">
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