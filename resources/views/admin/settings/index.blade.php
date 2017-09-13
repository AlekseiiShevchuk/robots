@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.settings.title')</h3>
    @can('setting_create')
        <p>
            <a href="{{ route('admin.settings.create') }}" class="btn btn-success">@lang('quickadmin.app_add_new')</a>

        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.settings.fields.value-name')</th>
                    <th>@lang('quickadmin.settings.fields.value')</th>
                    <th>@lang('quickadmin.settings.fields.type')</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @if (count($settings) > 0)
                    @foreach ($settings as $setting)
                        <tr>
                            <td>{{ $setting->value_name }}</td>
                            <td>{{ $setting->value }}</td>
                            <td>{{ $setting->type }}</td>
                            <td>
                                @can('setting_edit')
                                    <a href="{{ route('admin.settings.edit',[$setting->value_name]) }}"
                                       class="btn btn-xs btn-info">@lang('quickadmin.app_edit')</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">@lang('quickadmin.app_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
@endsection