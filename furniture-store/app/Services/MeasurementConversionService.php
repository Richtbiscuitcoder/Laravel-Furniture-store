<?php

namespace App\Services;

class MeasurementConversionService
{
    public const MM = 'mm';
    public const CM = 'cm';
    public const IN = 'in';
    public const FT = 'ft';

    public const UNITS = [
        MeasurementConversionService::MM => 1,
        MeasurementConversionService::CM => 10,
        MeasurementConversionService::IN => 25.4,
        MeasurementConversionService::FT => 304.8,
    ];

    public static function convertUnit( string $unitOfMeasurement)
    {
//        if ($value < 0) {
//            throw new Exception('Dimension must be greater than 0');
//        }

        return number_format($value / MeasurementConversionService::UNITS[$unitOfMeasurement], 2) . $unitOfMeasurement;
    }
}
