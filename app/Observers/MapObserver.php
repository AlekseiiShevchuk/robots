<?php

namespace App\Observers;

use App\Map;
use App\Services\MarkerToolsService;

class MapObserver
{
    public function __construct()
    {

    }

    /**
     * Listen to the Map created event.
     *
     * @param  Map $map
     * @return void
     */
    public function created(Map $map)
    {
        MarkerToolsService::saveBarCodeForMap($map->id);
        MarkerToolsService::createMarker($map->id);
        MarkerToolsService::createMarkerSettings($map->id);
    }

    public function creating(Map $map)
    {
    }

    /**
     * Listen to the Map deleting event.
     *
     * @param  Map $map
     * @return void
     */
    public function deleting(Map $map)
    {
    }
}