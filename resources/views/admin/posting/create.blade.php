@extends('admin/admin')
@section('content')
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
                                    {{ Form::label('file', 'file') }}
                                    {{ Form::file('file', ['class'=>'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('image', 'gambar') }}
                                    {{ Form::file('image', ['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div  class="card-footer">
                        <a href="{{ URL::to('admin/dashboard') }}"  class="btn btn-outline-info">Kembali</a>
                        {{ Form::submit('kirim', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>
            <!-- </form> -->
            {{ Form::close() }}
        </div>
    </div>
@endsection
