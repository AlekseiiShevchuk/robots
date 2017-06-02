@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.localized-actions.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.localized_actions.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('language_id', 'Language*', ['class' => 'control-label']) !!}
                    {!! Form::select('language_id', $languages, old('language_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('language_id'))
                        <p class="help-block">
                            {{ $errors->first('language_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('action_id', 'Action*', ['class' => 'control-label']) !!}
                    {!! Form::select('action_id', $actions, old('action_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('action_id'))
                        <p class="help-block">
                            {{ $errors->first('action_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sound', 'Sound', ['class' => 'control-label']) !!}
                    {!! Form::file('sound', ['class' => 'form-control']) !!}
                    {!! Form::hidden('sound_max_size', 8) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sound'))
                        <p class="help-block">
                            {{ $errors->first('sound') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

