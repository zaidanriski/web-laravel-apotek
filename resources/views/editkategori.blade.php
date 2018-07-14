@extends('templates.template')

@section('title')
Edit kategori Obat
@endsection

@section('content')
<div class="container-fluid" style="height: 650px">

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                          <div class="panel-heading"><strong>Edit Kategori Obat</strong></div>
                          <div class="panel-body">
                              <form role="form" method="post" action="/{{ $data->id }}/updatekategori">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="Nama">Kategori Obat :</label>
                                            <input class="form-control" id="Nama" name="kategori" type="text" value="{{ $data->kategori }}">
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