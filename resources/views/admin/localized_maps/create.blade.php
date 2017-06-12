@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.localized-maps.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.localized_maps.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('map_id', 'Map*', ['class' => 'control-label']) !!}
                    {!! Form::select('map_id', $maps, old('map_id'), ['class' => 'form-control select2', 'required', 'disabled']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('map_id'))
                        <p class="help-block">
                            {{ $errors->first('map_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <input type="hidden" name="map_id" value="{{request()->get('map_id')}}">
                <div class="col-xs-12 form-group">
                    {!! Form::label('language_id', 'Language*', ['class' => 'control-label']) !!}
                    {!! Form::select('language_id', $languages, old('language_id'), ['class' => 'form-control select2', 'required', 'disabled']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('language_id'))
                        <p class="help-block">
                            {{ $errors->first('language_id') }}
                        </p>
                    @endif
                </div>
            </div>
                <input type="hidden" name="language_id" value="{{request()->get('language_id')}}">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sound_description', 'Sound description', ['class' => 'control-label']) !!}
                    {!! Form::file('sound_description', ['class' => 'form-control']) !!}
                    {!! Form::hidden('sound_description_max_size', 16) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sound_description'))
                        <p class="help-block">
                            {{ $errors->first('sound_description') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

