@extends('admin.admin')

@section('content')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">


<!-- /.card -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
                <h3 class="card-title">Posting</h3>
                <div class="card-tools">
                 <a href="{{ URL::to('/admin/posting/create')}}" class="btn btn-tool">
                     <i class="fa fa-plus"></i>
                     &nbsp; Add
                 </a>
             </div>
         </div>
         <div class="card-body">
            <div class="row">
                <div class="col-12">
                    {{ Form::open() }}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Posting </h3>
                            </div>
                            <div class="card-body">
                                @if(!empty($errors->all()))
                                <div class="alert alert-danger">
                                    {{ Html::ul($errors->all())}}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            {{ Form::label('caption', 'caption') }}
                                            {{ Form::textarea('caption', '', ['class'=>'form-control', 'placeholder'=>'Enter caption', 'rows'=>5]) }}
                                        </div>

                                    </div>
                                    <div class="col-md-6">


                                        <div class="form-group">
                                            {{ Form::label('image', 'file') }}
                                            {{ Form::file('imageFile', ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('image', 'Gambar') }}
                                            {{ Form::file('imageFile', ['class'=>'form-control']) }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div  class="card-footer">
                                <a href="{{ URL::to('admin') }}"  class="btn btn-outline-info">Kembali</a>
                                {{ Form::submit('kirim', ['class' => 'btn btn-primary pull-right']) }}
                            </div>
                        </div>
                    <!-- </form> -->
                    {{ Form::close() }}
                </div>

            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
@endsection

