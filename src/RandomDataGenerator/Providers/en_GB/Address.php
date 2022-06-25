<?php

namespace RandomDataGenerator\Providers\en_GB;

use RandomDataGenerator\Providers\Defaults\Address as BaseAddress;

class Address extends BaseAddress
{
    protected static string $country = 'United Kingdom';
    protected static string $countryFullName = 'United Kingdom of Great Britain and Northern Ireland';

    protected static array $cities = [
        "London", "Edinburgh", "Cardiff", "Belfast", "Leeds", "Manchester", "Birmingham"
    ];

    protected static array $administrativeAreas = [
        "West Yorkshire" => ["Leeds"],
        "Greater London" => ["London"],
        "Lancashire" => ["Manchester"],
        "West Midlands" => ["Birmingham"],
        "South Glamorgan" => ["Cardiff"],
        "Midlothian" => ["Edinburgh"],
        "Antrim" => ["Belfast"]
    ];

    protected static array $localities = [
        "Leeds" => ["Adel", "Beeston", "Holbeck", "Harehills", "Hunslet", "Crossgates", "Burmantofts", "Burley", "Kirkstall"],
        "London" => ["Camden", "Greenwich", "Islington", "Soho"],
        "Belfast" => ["Malone", "Ormeau", "Clonard"],
        "Birmingham" => ["Aston", "Highgate", "Edgbaston", "Solihull"],
        "Cardiff" => ["Canton", "Rumney"],
        "Edinburgh" => ["Leith", "Murrayfield", "West End"],
        "Manchester" => ["Bury", "Oldham", "Trafford", "Stretford"],
    ];

    protected static array $postcodes = [
        "Leeds" => [
            "Adel" => ["LS16"],
            "Beeston" => ["LS11"],
            "Burley" => ["LS3", "LS4"],
            "Burmantofts" => ["LS9"],
            "Crossgates" => ['LS15'],
            "Harehills" => ["LS9"],
            "Holbeck" => ["LS11", "LS12"],
            "Hunslet" => ["LS10"],
            "Kirkstall" => ["LS4", "LS5"],
        ],
        "Belfast" => [
            "Malone" => ["BT9"],
            "Ormeau" => ["BT7"],
            "Clonard" => ["BT13"]
        ],
        "Birmingham" => [
            "Aston" => ["B6"],
            "Edgbaston" => ["B15"],
            "Highgate" => ["B5"],
            "Solihull" => ["B90", "B91", "B92", "B93", "B94"],
        ],
        "Cardiff" => [
            "Canton" => ["CF5"],
            "Rumney" => ["CF3"],
        ],
        "Edinburgh" => [
            "Leith" => ["EH6"],
            "Murrayfield" => ["EH12"],
            "West End" => ["EH3"]
        ],
        "London" => [
            "Camden" => ["N1", "NW1"],
            "Greenwich" => ["SE10"],
            "Islington" => ["N1", "N7"],
            "Soho" => ["W1D", "W1F"],
        ],
        "Manchester" => [
            "Bury" => ["BL8", "BL9"],
            "Oldham" => ["OL1", "OL2"],
            "Trafford" => ["M17"],
            "Stretford" => ["M32"]
        ],
    ];

    protected static array $streetNames = [
        'Main', 'High', 'Town', 'Station', 'Church', 'Victoria', 'Green',
        'Grange', 'Kings', 'Queens', 'York', 'Tudor', 'Windsor', 'North'
    ];

    protected static array $streetSuffixes = [
        'Avenue', 'Road', 'Lane', 'Street', 'Crescent', 'Mount', 'Place', 'Grove', 'Way', 'Hill'
    ];
}