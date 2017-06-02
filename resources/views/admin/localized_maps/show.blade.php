@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.localized-maps.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.localized-maps.fields.map')</th>
                            <td>{{ $localized_map->map->settings or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.localized-maps.fields.language')</th>
                            <td>{{ $localized_map->language->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.localized-maps.fields.title')</th>
                            <td>{{ $localized_map->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.localized-maps.fields.description')</th>
                            <td>{{ $localized_map->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.localized-maps.fields.sound-description')</th>
                            <td>@if($localized_map->sound_description)<a href="{{ asset('uploads/' . $localized_map->sound_description) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.localized_maps.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop