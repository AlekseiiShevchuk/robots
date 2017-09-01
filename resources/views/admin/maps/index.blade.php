@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.maps.title')</h3>
    @can('map_create')
    <p>
        <a href="{{ route('admin.maps.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($maps) > 0 ? 'datatable' : '' }} @can('map_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('map_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>Name</th>
                        {{--<th>Settings</th>--}}
                        <th>Available Actions</th>
                        <th>Marker image</th>
                        <th>Is visible</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($maps) > 0)
                        @foreach ($maps as $map)
                            <tr data-entry-id="{{ $map->id }}">
                                @can('map_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $map->name }}</td>
                                {{--<td>{!! $map->settings !!}</td>--}}
                                <td>
                                    @foreach ($map->available_actions as $singleAvailableActions)
                                        <span class="label label-info label-many">{{ $singleAvailableActions->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{env('APP_URL') . 'map_data/' . $map->id . '/marker.jpg'}}" target="_blank">
                                    <img src="{{env('APP_URL') . 'map_data/' . $map->id . '/marker.jpg'}}" width="100" height="100">
                                    </a>
                                </td>
                                <td>{{$map->is_visible == true ? 'Visible' : 'Invisible'}}</td>
                                <td>
{{--                                    @can('map_view')
                                    <a href="{{ route('admin.maps.show',[$map->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
--}}
                                    @foreach(\App\Language::isActiveForAdmin() as $language)
                                        @if($map->get_localization_id_or_false($language->id))
                                            <a href="{{ route('admin.localized_maps.edit',[$map->get_localization_id_or_false($language->id)]) }}" class="btn btn-xs btn-success">Edit {{$language->name}} localization</a>
                                        @else
                                            <a href="{{ route('admin.localized_maps.create') }}?language_id={{$language->id}}&map_id={{$map->id}}" class="btn btn-xs btn-danger">Add {{$language->name}} localization</a>
                                        @endif
                                    @endforeach
                                    <hr>
                                    @can('map_edit')
                                    <a href="{{ route('admin.maps.edit',[$map->id]) }}" class="btn btn-xs btn-info">Edit Map</a>
                                    @endcan
                                    @can('map_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.maps.destroy', $map->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('map_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.maps.mass_destroy') }}';
        @endcan

    </script>
@endsection