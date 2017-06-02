@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.languages.title')</h3>
    @can('language_create')
    <p>
        
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($languages) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        
                        <th>@lang('quickadmin.languages.fields.abbreviation')</th>
                        <th>@lang('quickadmin.languages.fields.name')</th>
                        <th>@lang('quickadmin.languages.fields.is-active-for-admin')</th>
                        <th>@lang('quickadmin.languages.fields.is-active-for-users')</th>
                        <th>@lang('quickadmin.languages.fields.flag-image')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($languages) > 0)
                        @foreach ($languages as $language)
                            <tr data-entry-id="{{ $language->id }}">
                                
                                <td>{{ $language->abbreviation }}</td>
                                <td>{{ $language->name }}</td>
                                <td>{{ Form::checkbox("is_active_for_admin", 1, $language->is_active_for_admin == 1 ? true : false, ["disabled"]) }}</td>
                                <td>{{ Form::checkbox("is_active_for_users", 1, $language->is_active_for_users == 1 ? true : false, ["disabled"]) }}</td>
                                <td>@if($language->flag_image)<a href="{{ asset('uploads/' . $language->flag_image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $language->flag_image) }}"/></a>@endif</td>
                                <td>                                    @can('language_edit')
                                    <a href="{{ route('admin.languages.edit',[$language->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        
    </script>
@endsection