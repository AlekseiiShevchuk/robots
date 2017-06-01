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

                        <th>@lang('quickadmin.maps.fields.settings')</th>
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

                                <td>{{ $map->settings }}</td>
                                <td>
                                    @can('map_view')
                                    <a href="{{ route('admin.maps.show',[$map->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('map_edit')
                                    <a href="{{ route('admin.maps.edit',[$map->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
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