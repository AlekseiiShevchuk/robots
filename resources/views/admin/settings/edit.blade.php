@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.settings.title')</h3>

    {!! Form::model($setting, ['method' => 'PUT', 'route' => ['admin.settings.update', $setting->value_name]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.app_edit') value <strong> {{$setting->value_name}}</strong>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-4 form-group">
                    {!! Form::label('value', 'Value*', ['class' => 'control-label']) !!}
                    @if($setting->type == 'string')
                        {!! Form::text('value', old('value'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    @elseif($setting->type == 'number')
                        {!! Form::number('value', old('value'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    @endif
                    <p class="help-block"></p>
                    @if($errors->has('value'))
                        <p class="help-block">
                            {{ $errors->first('value') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    {!! Form::label('type', 'Type*', ['class' => 'control-label']) !!}
                    {!! Form::select('type', $enum_type, old('type'), ['class' => 'form-control select2', 'disabled']) !!}
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

    {!! Form::submit(trans('quickadmin.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

