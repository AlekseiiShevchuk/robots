<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Setting;

class DevNeedsController extends Controller
{
    public function get_minimum_required_build_for_ios_apps()
    {
        return response()->json(Setting::getValue('minimum_required_build_for_ios_apps'));
    }

    public function get_minimum_required_build_for_android_apps()
    {
        return response()->json(Setting::getValue('minimum_required_build_for_android_apps'));
    }
}
