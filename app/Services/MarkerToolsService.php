<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Milon\Barcode\Facades\DNS1DFacade;

class MarkerToolsService
{

    static function saveBarCodeForMap($mapId)
    {
        if (!file_exists(public_path('map_data/' . $mapId))) {
            mkdir(public_path('map_data/' . $mapId), 0777);
        }

        $fileName = DNS1DFacade::getBarcodePNGPath((string)$mapId, "C128");

        Image::make(public_path($fileName))->resize(null, 60, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('map_data/' . $mapId . '/bar_code.png'));

        unlink(public_path($fileName));
    }

    static function createMarker($mapId)
    {
        $xPosition = (411 - (int)Image::make(public_path('map_data/' . $mapId . '/bar_code.png'))->width()) / 2;

        Image::make(public_path('map_data/empty_marker.jpg'))
            ->insert(public_path('map_data/' . $mapId . '/bar_code.png'), 'bottom-left', (int)$xPosition, 35)
            ->save(public_path('map_data/' . $mapId . '/marker.jpg'), 90);
    }

    static function createMarkerSettings($mapId)
    {
        $level = 4;
        $leveli = 3;
        $max_dpi = 96;
        $min_dpi = 6.54;
        $default_dpi = 40;

        $trainingCommand = 'genTexData -level=' . $level .
            ' -leveli=' . $leveli .
            ' -max_dpi=' . $max_dpi .
            ' -min_dpi=' . $min_dpi .
            ' -dpi=' . $default_dpi;
        shell_exec($trainingCommand . ' ' . public_path('map_data/' . $mapId . '/marker.jpg'));

    }
}