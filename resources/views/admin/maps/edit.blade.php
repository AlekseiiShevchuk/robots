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
                <div class="col-xs-3 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('available_actions', 'Available actions', ['class' => 'control-label']) !!}
                    {!! Form::select('available_actions[]', $available_actions, old('available_actions') ? old('available_actions') : $map->available_actions->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('available_actions'))
                        <p class="help-block">
                            {{ $errors->first('available_actions') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

