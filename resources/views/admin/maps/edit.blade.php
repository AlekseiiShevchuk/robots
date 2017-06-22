@extends('layouts.app')

@section('content')
    <script src="https://npmcdn.com/vue/dist/vue.js"></script>
    <h3 class="page-title">@lang('quickadmin.maps.title')</h3>

    <div id="app" class="panel panel-default">
    {!! Form::model($map, ['method' => 'PUT', 'route' => ['admin.maps.update', $map->id]]) !!}

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
            <button v-if="drew" @click.stop.prevent="drawFromScratch" class="btn btn-primary">Clear and draw from scratch</button><br>

            <input type="hidden" name="settings" :value="serializedSettings()">

            <div class="row">
                <div class="col-xs-3 form-group">
                    <label for="x_length" class="control-label">Length of the playing square: </label>
                    <input v-model.number="x_length" name="x_length" type="number" min="2" max="12"
                           class="input input-circle" :disabled="disabled">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3 form-group">
                    <label for="y_length" class="control-label">Height of the playing square: </label>
                    <input v-model.number="y_length" name="y_length" type="number" min="2" max="12"
                           :disabled="disabled"><br>
                </div>
            </div>
            <button v-if="!drew" @click="drow" class="btn btn-primary":disabled="disabled">Draw Map</button><br>
            <template
                    v-if="drew">
                <div v-for="(y, y_index) in y_length" class="row row-styled">
                    <div v-for="(x, x_index) in x_length"
                         :class="[cellClass(x,y_length - y_index)]"
                         @click="saveCurrentCellSettings(x,y_length - y_index)">
                    </div>

                </div>

            </template>

        </div>
    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger', ':disabled="!drew"']) !!}
    {!! Form::close() !!}
    </div>
    <script src="/js/create_map.js"></script>
    <script type="text/javascript">
        // apply current map settings for online map editor
        app._data.x_length = {!! json_decode($map->settings)->x_length !!};
        app._data.y_length = {!! json_decode($map->settings)->y_length !!};

        @foreach(json_decode($map->settings)->map as $item)
            app._data.settings['x_' + {{$item->x +1}} +'y_' + {{$item->y +1}}] = {
            class: 'col-xs-1 cell {{$item->type}}-cell',
            type: '{{$item->type}}',
        };
        @endforeach

            app._data.drew = true;
        app._data.disabled = true;
        app.$forceUpdate();

    </script>
@stop

