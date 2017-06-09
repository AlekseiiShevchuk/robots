@extends('layouts.app')

@section('content')
    <script src="https://npmcdn.com/vue/dist/vue.js"></script>
    <h3 class="page-title">Create New Map</h3>

    {!! Form::open(['method' => 'POST', 'route' => ['admin.maps.store']]) !!}

    <div id="app">
        <div class="row">
            <div class="col-xs-3 form-group">
                <label for="name" class="control-label">Map name</label>
                <input class="form-control" required name="name">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('available_actions', 'Available actions', ['class' => 'control-label']) !!}
                {!! Form::select('available_actions[]', $available_actions, old('available_actions') ?? [1,2,3,4], ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                <p class="help-block"></p>
                @if($errors->has('available_actions'))
                    <p class="help-block">
                        {{ $errors->first('available_actions') }}
                    </p>
                @endif
            </div>
        </div>

        <input type="hidden" name="settings" :value="serializedSettings()">

        <div class="row">
            <div class="col-xs-3 form-group">
                <label for="x_length" class="control-label">Length of the playing square: </label>
                <input v-model.number="x_length" name="x_length" type="number" min="2" max="12" class="input input-circle" :disabled="disabled">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-3 form-group">
                <label for="y_length" class="control-label">Height of the playing square: </label>
                <input v-model.number="y_length" name="y_length" type="number" min="2" max="12" :disabled="disabled"><br>
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
    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger', ':disabled="!drew"']) !!}
    {!! Form::close() !!}

    </div>




    <script src="/js/create_map.js"></script>
@stop

