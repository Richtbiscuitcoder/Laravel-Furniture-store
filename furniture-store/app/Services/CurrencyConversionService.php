<?php
//
//namespace App\Services;
//
//
//
//class CurrencyConversionService
//{
//    public const POUNDS = '£';
//    public const DOLLARS = '$';
//    public const EUROS = '€';
//    public const YEN = '¥';
//
//    public const UNITS = [
//        CurrencyConversionService::POUNDS => 1,
//        CurrencyConversionService::DOLLARS => 1.27,
//        CurrencyConversionService::EUROS => 1.17,
//        CurrencyConversionService::YEN => 199.36,
//    ];
//
//    public static function convertPrice(string $currency, int $price): string
//    {
//
//        return number_format($price * CurrencyConversionService::UNITS[$currency], 2) . $currency;
//    }
//}
