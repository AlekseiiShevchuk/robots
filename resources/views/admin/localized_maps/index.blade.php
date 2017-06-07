@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.localized-maps.title')</h3>
    @can('localized_map_create')
    <p>
        <a href="{{ route('admin.localized_maps.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($localized_maps) > 0 ? 'datatable' : '' }} @can('localized_map_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('localized_map_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.localized-maps.fields.map')</th>
                        <th>@lang('quickadmin.localized-maps.fields.language')</th>
                        <th>@lang('quickadmin.localized-maps.fields.title')</th>
                        <th>@lang('quickadmin.localized-maps.fields.description')</th>
                        <th>@lang('quickadmin.localized-maps.fields.sound-description')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($localized_maps) > 0)
                        @foreach ($localized_maps as $localized_map)
                            <tr data-entry-id="{{ $localized_map->id }}">
                                @can('localized_map_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $localized_map->map->name or '' }}</td>
                                <td>{{ $localized_map->language->name or '' }}</td>
                                <td>{{ $localized_map->title }}</td>
                                <td>{{ $localized_map->description }}</td>
                                <td>@if($localized_map->sound_description)<a href="{{ asset('uploads/' . $localized_map->sound_description) }}" target="_blank">Download file</a>@endif</td>
                                <td>
                                    @can('localized_map_view')
                                    <a href="{{ route('admin.localized_maps.show',[$localized_map->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('localized_map_edit')
                                    <a href="{{ route('admin.localized_maps.edit',[$localized_map->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('localized_map_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.localized_maps.destroy', $localized_map->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('localized_map_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.localized_maps.mass_destroy') }}';
        @endcan

    </script>
@endsection