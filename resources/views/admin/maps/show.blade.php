@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.maps.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Name</th>
                            <td>{!! $map->name !!}</td>
                        </tr>

                        <tr>
                            <th>Settings</th>
                            <td>{!! $map->settings !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active"><a href="#localizedmaps" aria-controls="localizedmaps" role="tab"
                                                          data-toggle="tab">Localized maps</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="localizedmaps">
                    <table class="table table-bordered table-striped {{ count($localized_maps) > 0 ? 'datatable' : '' }}">
                        <thead>
                        <tr>
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
                                    <td>{{ $localized_map->map->name or '' }}</td>
                                    <td>{{ $localized_map->language->name or '' }}</td>
                                    <td>{{ $localized_map->title }}</td>
                                    <td>{{ $localized_map->description }}</td>
                                    <td>@if($localized_map->sound_description)<a
                                                href="{{ asset('uploads/' . $localized_map->sound_description) }}"
                                                target="_blank">Download file</a>@endif</td>
                                    <td>
                                        @can('localized_map_view')
                                            <a href="{{ route('admin.localized_maps.show',[$localized_map->id]) }}"
                                               class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                        @endcan
                                        @can('localized_map_edit')
                                            <a href="{{ route('admin.localized_maps.edit',[$localized_map->id]) }}"
                                               class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.maps.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop