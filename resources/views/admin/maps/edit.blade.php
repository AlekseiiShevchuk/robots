@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.maps.title')</h3>
    
    {!! Form::model($map, ['method' => 'PUT', 'route' => ['admin.maps.update', $map->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('settings', 'Settings*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('settings', old('settings'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('settings'))
                        <p class="help-block">
                            {{ $errors->first('settings') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

