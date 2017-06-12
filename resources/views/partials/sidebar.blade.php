@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('language_access')
            <li class="{{ $request->segment(2) == 'languages' ? 'active' : '' }}">
                <a href="{{ route('admin.languages.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.languages.title')</span>
                </a>
            </li>
            @endcan
            
            @can('map_access')
            <li class="{{ $request->segment(2) == 'maps' ? 'active' : '' }}">
                <a href="{{ route('admin.maps.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.maps.title')</span>
                </a>
            </li>
            @endcan
            
{{--            @can('localized_map_access')
            <li class="{{ $request->segment(2) == 'localized_maps' ? 'active' : '' }}">
                <a href="{{ route('admin.localized_maps.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.localized-maps.title')</span>
                </a>
            </li>
            @endcan--}}
            
            @can('action_access')
            <li class="{{ $request->segment(2) == 'actions' ? 'active' : '' }}">
                <a href="{{ route('admin.actions.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.actions.title')</span>
                </a>
            </li>
            @endcan
            
            @can('localized_action_access')
            <li class="{{ $request->segment(2) == 'localized_actions' ? 'active' : '' }}">
                <a href="{{ route('admin.localized_actions.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.localized-actions.title')</span>
                </a>
            </li>
            @endcan
            <li class="{{ $request->segment(2) == 'translation_items' ? 'active' : '' }}">
                <a href="{{ route('admin.translation_items.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">Translation Items</span>
                </a>
            </li>
            

            

            

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
