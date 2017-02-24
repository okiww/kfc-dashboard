@extends('admin_template')

@section('title') | {!! trans('app.label.dashboard') !!}@endsection

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('app.menu.create_user') !!}
        </h1>
    </section>
    <section class="content" id="index-component">
        <div class="box box-primary">
            <div class="box-body">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-upload{{ $errors->has('upload') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Avatar</label>
                            <div class="col-md-6 upload-image">
                                <input type="file" id="upload-file" name="upload" value="{!! old('upload') !!}">
                                <img class="img-thumbnail" id="upload-thumbnail" data-src="holder.js/300x300">
                                <button type="button" class="btn btn-danger" id="upload-remove">
                                    Remove
                                </button>
                                @if ($errors->has('upload'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('upload') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style type="text/css">
    .upload-image input,
    .upload-image img,
    .upload-image button {
        display: block;
        width: 300px;
    }

    .checkbox-inline {
        padding-left: 0;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript">

    $(document).ready(function(e) {
        $imgsrc=$('.upload-image img').attr('src');
        if ($imgsrc == undefined) {
            $('#upload-remove').hide();
            $('.upload-image img').hide();
        } else {
            
        }
    });

    $(function(){
        $('#upload-file').on('change', function () {
            call.readerImageURL(this, '#upload-thumbnail');
            $('.upload-image img').show();
            $('#upload-remove').show();
        });

        $('#upload-thumbnail').on('click', function () {
            $('#upload-file').click();
        });

        $('#upload-remove').on('click', function () {
            $('#upload-file').val('');
            $('#upload-thumbnail').attr('src', '');
            Holder.run({
                image: '#upload-thumbnail'
            });
        });
    });
</script>
@endpush