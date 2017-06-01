@extends('layouts.app')

@section('content')
    <script src="https://npmcdn.com/vue/dist/vue.js"></script>
    <h3 class="page-title">Adding new map</h3>
    <div id="app">

        <div class="badge">Length of the playing square</div>
        <input v-model.number="x_length" number type="number" min="1" max="12" class="input input-circle"
               :disabled="disabled"><br>

        <div class="badge">Height of the playing square</div>
        <input v-model.number="y_length" number type="number" min="1" max="12" :disabled="disabled"><br>

        <button @click="drow" class="btn btn-primary":disabled="disabled">Draw square</button><br>

        <template
                v-if="drew">
            <div v-for="(y, y_index) in y_length" class="row row-styled">
                <div v-for="(x, x_index) in x_length"
                        :class="[cellClass(x,y_length - y_index)]"
                        @click="saveCurrentCellSettings(x,y_length - y_index)">
                x = @{{x}}; y = @{{y_length - y_index}};
                </div>

            </div>

    </template>
    </div>
    <script src="/js/create_map.js"></script>
@stop

