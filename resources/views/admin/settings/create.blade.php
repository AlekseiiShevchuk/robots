@extends('layouts.app')

@section('content')
    <h3 class="page-title">Settings</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.settings.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Add new Setting
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('value_name', 'Value name*', ['class' => 'control-label']) !!}
                    {!! Form::text('value_name', old('value_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('value_name'))
                        <p class="help-block">
                            {{ $errors->first('value_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('value', 'Value*', ['class' => 'control-label']) !!}
                    {!! Form::text('value', old('value'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('value'))
                        <p class="help-block">
                            {{ $errors->first('value') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('type', 'Type*', ['class' => 'control-label']) !!}
                    {!! Form::select('type', $enum_type, old('type'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('type'))
                        <p class="help-block">
                            {{ $errors->first('type') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

