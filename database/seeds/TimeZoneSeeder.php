<?php

use Illuminate\Database\Seeder;

class TimeZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timezones')->delete();

        $timezones = [[
	        	'name' => 'Europe/Andorra',
		    ], [
		        'name' => 'Asia/Dubai',
		    ], [
		        'name' => 'Asia/Kabul',
		    ], [
		        'name' => 'Europe/Tirane',
		    ], [
		        'name' => 'Asia/Yerevan',
		    ], [
		        'name' => 'Antarctica/Casey',
		    ], [
		        'name' => 'Antarctica/Davis',
		    ], [
		        'name' => 'Antarctica/Mawson',
		    ], [
		        'name' => 'Antarctica/Palmer',
		    ], [
		        'name' => 'Antarctica/Rothera',
		    ], [
		        'name' => 'Antarctica/Syowa',
		    ], [
		        'name' => 'Antarctica/Troll',
		    ], [
		        'name' => 'Antarctica/Vostok',
		    ], [
		        'name' => 'America/Argentina/Buenos_Aires',
		    ], [
		        'name' => 'America/Argentina/Cordoba',
		    ], [
		        'name' => 'America/Argentina/Salta',
		    ], [
		        'name' => 'America/Argentina/Jujuy',
		    ], [
		        'name' => 'America/Argentina/Tucuman',
		    ], [
		        'name' => 'America/Argentina/Catamarca',
		    ], [
		        'name' => 'America/Argentina/La_Rioja',
		    ], [
		        'name' => 'America/Argentina/San_Juan',
		    ], [
		        'name' => 'America/Argentina/Mendoza',
		    ], [
		        'name' => 'America/Argentina/San_Luis',
		    ], [
		        'name' => 'America/Argentina/Rio_Gallegos',
		    ], [
		        'name' => 'America/Argentina/Ushuaia',
		    ], [
		        'name' => 'Pacific/Pago_Pago',
		    ], [
		        'name' => 'Europe/Vienna',
		    ], [
		        'name' => 'Australia/Lord_Howe',
		    ], [
		        'name' => 'Antarctica/Macquarie',
		    ], [
		        'name' => 'Australia/Hobart',
		    ], [
		        'name' => 'Australia/Currie',
		    ], [
		        'name' => 'Australia/Melbourne',
		    ], [
		        'name' => 'Australia/Sydney',
		    ], [
		        'name' => 'Australia/Broken_Hill',
		    ], [
		        'name' => 'Australia/Brisbane',
		    ], [
		        'name' => 'Australia/Lindeman',
		    ], [
		        'name' => 'Australia/Adelaide',
		    ], [
		        'name' => 'Australia/Darwin',
		    ], [
		        'name' => 'Australia/Perth',
		    ], [
		        'name' => 'Australia/Eucla',
		    ], [
		        'name' => 'Asia/Baku',
		    ], [
		        'name' => 'America/Barbados',
		    ], [
		        'name' => 'Asia/Dhaka',
		    ], [
		        'name' => 'Europe/Brussels',
		    ], [
		        'name' => 'Europe/Sofia',
		    ], [
		        'name' => 'Atlantic/Bermuda',
		    ], [
		        'name' => 'Asia/Brunei',
		    ], [
		        'name' => 'America/La_Paz',
		    ], [
		        'name' => 'America/Noronha',
		    ], [
		        'name' => 'America/Belem',
		    ], [
		        'name' => 'America/Fortaleza',
		    ], [
		        'name' => 'America/Recife',
		    ], [
		        'name' => 'America/Araguaina',
		    ], [
		        'name' => 'America/Maceio',
		    ], [
		        'name' => 'America/Bahia',
		    ], [
		        'name' => 'America/Sao_Paulo',
		    ], [
		        'name' => 'America/Campo_Grande',
		    ], [
		        'name' => 'America/Cuiaba',
		    ], [
		        'name' => 'America/Santarem',
		    ], [
		        'name' => 'America/Porto_Velho',
		    ], [
		        'name' => 'America/Boa_Vista',
		    ], [
		        'name' => 'America/Manaus',
		    ], [
		        'name' => 'America/Eirunepe',
		    ], [
		        'name' => 'America/Rio_Branco',
		    ], [
		        'name' => 'America/Nassau',
		    ], [
		        'name' => 'Asia/Thimphu',
		    ], [
		        'name' => 'Europe/Minsk',
		    ], [
		        'name' => 'America/Belize',
		    ], [
		        'name' => 'America/St_Johns',
		    ], [
		        'name' => 'America/Halifax',
		    ], [
		        'name' => 'America/Glace_Bay',
		    ], [
		        'name' => 'America/Moncton',
		    ], [
		        'name' => 'America/Goose_Bay',
		    ], [
		        'name' => 'America/Blanc-Sablon',
		    ], [
		        'name' => 'America/Toronto',
		    ], [
		        'name' => 'America/Nipigon',
		    ], [
		        'name' => 'America/Thunder_Bay',
		    ], [
		        'name' => 'America/Iqaluit',
		    ], [
		        'name' => 'America/Pangnirtung',
		    ], [
		        'name' => 'America/Atikokan',
		    ], [
		        'name' => 'America/Winnipeg',
		    ], [
		        'name' => 'America/Rainy_River',
		    ], [
		        'name' => 'America/Resolute',
		    ], [
		        'name' => 'America/Rankin_Inlet',
		    ], [
		        'name' => 'America/Regina',
		    ], [
		        'name' => 'America/Swift_Current',
		    ], [
		        'name' => 'America/Edmonton',
		    ], [
		        'name' => 'America/Cambridge_Bay',
		    ], [
		        'name' => 'America/Yellowknife',
		    ], [
		        'name' => 'America/Inuvik',
		    ], [
		        'name' => 'America/Creston',
		    ], [
		        'name' => 'America/Dawson_Creek',
		    ], [
		        'name' => 'America/Fort_Nelson',
		    ], [
		        'name' => 'America/Vancouver',
		    ], [
		        'name' => 'America/Whitehorse',
		    ], [
		        'name' => 'America/Dawson',
		    ], [
		        'name' => 'Indian/Cocos',
		    ], [
		        'name' => 'Europe/Zurich',
		    ], [
		        'name' => 'Africa/Abidjan',
		    ], [
		        'name' => 'Pacific/Rarotonga',
		    ], [
		        'name' => 'America/Santiago',
		    ], [
		        'name' => 'America/Punta_Arenas',
		    ], [
		        'name' => 'Pacific/Easter',
		    ], [
		        'name' => 'Asia/Shanghai',
		    ], [
		        'name' => 'Asia/Urumqi',
		    ], [
		        'name' => 'America/Bogota',
		    ], [
		        'name' => 'America/Costa_Rica',
		    ], [
		        'name' => 'America/Havana',
		    ], [
		        'name' => 'Atlantic/Cape_Verde',
		    ], [
		        'name' => 'America/Curacao',
		    ], [
		        'name' => 'Indian/Christmas',
		    ], [
		        'name' => 'Asia/Nicosia',
		    ], [
		        'name' => 'Asia/Famagusta',
		    ], [
		        'name' => 'Europe/Prague',
		    ], [
		        'name' => 'Europe/Berlin',
		    ], [
		        'name' => 'Europe/Copenhagen',
		    ], [
		        'name' => 'America/Santo_Domingo',
		    ], [
		        'name' => 'Africa/Algiers',
		    ], [
		        'name' => 'America/Guayaquil',
		    ], [
		        'name' => 'Pacific/Galapagos',
		    ], [
		        'name' => 'Europe/Tallinn',
		    ], [
		        'name' => 'Africa/Cairo',
		    ], [
		        'name' => 'Africa/El_Aaiun',
		    ], [
		        'name' => 'Europe/Madrid',
		    ], [
		        'name' => 'Africa/Ceuta',
		    ], [
		        'name' => 'Atlantic/Canary',
		    ], [
		        'name' => 'Europe/Helsinki',
		    ], [
		        'name' => 'Pacific/Fiji',
		    ], [
		        'name' => 'Atlantic/Stanley',
		    ], [
		        'name' => 'Pacific/Chuuk',
		    ], [
		        'name' => 'Pacific/Pohnpei',
		    ], [
		        'name' => 'Pacific/Kosrae',
		    ], [
		        'name' => 'Atlantic/Faroe',
		    ], [
		        'name' => 'Europe/Paris',
		    ], [
		        'name' => 'Europe/London',
		    ], [
		        'name' => 'Asia/Tbilisi',
		    ], [
		        'name' => 'America/Cayenne',
		    ], [
		        'name' => 'Africa/Accra',
		    ], [
		        'name' => 'Europe/Gibraltar',
		    ], [
		        'name' => 'America/Godthab',
		    ], [
		        'name' => 'America/Danmarkshavn',
		    ], [
		        'name' => 'America/Scoresbysund',
		    ], [
		        'name' => 'America/Thule',
		    ], [
		        'name' => 'Europe/Athens',
		    ], [
		        'name' => 'Atlantic/South_Georgia',
		    ], [
		        'name' => 'America/Guatemala',
		    ], [
		        'name' => 'Pacific/Guam',
		    ], [
		        'name' => 'Africa/Bissau',
		    ], [
		        'name' => 'America/Guyana',
		    ], [
		        'name' => 'Asia/Hong_Kong',
		    ], [
		        'name' => 'America/Tegucigalpa',
		    ], [
		        'name' => 'America/Port-au-Prince',
		    ], [
		        'name' => 'Europe/Budapest',
		    ], [
		        'name' => 'Asia/Jakarta',
		    ], [
		        'name' => 'Asia/Pontianak',
		    ], [
		        'name' => 'Asia/Makassar',
		    ], [
		        'name' => 'Asia/Jayapura',
		    ], [
		        'name' => 'Europe/Dublin',
		    ], [
		        'name' => 'Asia/Jerusalem',
		    ], [
		        'name' => 'Asia/Kolkata',
		    ], [
		        'name' => 'Indian/Chagos',
		    ], [
		        'name' => 'Asia/Baghdad',
		    ], [
		        'name' => 'Asia/Tehran',
		    ], [
		        'name' => 'Atlantic/Reykjavik',
		    ], [
		        'name' => 'Europe/Rome',
		    ], [
		        'name' => 'America/Jamaica',
		    ], [
		        'name' => 'Asia/Amman',
		    ], [
		        'name' => 'Asia/Tokyo',
		    ], [
		        'name' => 'Africa/Nairobi',
		    ], [
		        'name' => 'Asia/Bishkek',
		    ], [
		        'name' => 'Pacific/Tarawa',
		    ], [
		        'name' => 'Pacific/Enderbury',
		    ], [
		        'name' => 'Pacific/Kiritimati',
		    ], [
		        'name' => 'Asia/Pyongyang',
		    ], [
		        'name' => 'Asia/Seoul',
		    ], [
		        'name' => 'Asia/Almaty',
		    ], [
		        'name' => 'Asia/Qyzylorda',
		    ], [
		        'name' => 'Asia/Qostanay',
		    ], [
		        'name' => 'Asia/Aqtobe',
		    ], [
		        'name' => 'Asia/Aqtau',
		    ], [
		        'name' => 'Asia/Atyrau',
		    ], [
		        'name' => 'Asia/Oral',
		    ], [
		        'name' => 'Asia/Beirut',
		    ], [
		        'name' => 'Asia/Colombo',
		    ], [
		        'name' => 'Africa/Monrovia',
		    ], [
		        'name' => 'Europe/Vilnius',
		    ], [
		        'name' => 'Europe/Luxembourg',
		    ], [
		        'name' => 'Europe/Riga',
		    ], [
		        'name' => 'Africa/Tripoli',
		    ], [
		        'name' => 'Africa/Casablanca',
		    ], [
		        'name' => 'Europe/Monaco',
		    ], [
		        'name' => 'Europe/Chisinau',
		    ], [
		        'name' => 'Pacific/Majuro',
		    ], [
		        'name' => 'Pacific/Kwajalein',
		    ], [
		        'name' => 'Asia/Yangon',
		    ], [
		        'name' => 'Asia/Ulaanbaatar',
		    ], [
		        'name' => 'Asia/Hovd',
		    ], [
		        'name' => 'Asia/Choibalsan',
		    ], [
		        'name' => 'Asia/Macau',
		    ], [
		        'name' => 'America/Martinique',
		    ], [
		        'name' => 'Europe/Malta',
		    ], [
		        'name' => 'Indian/Mauritius',
		    ], [
		        'name' => 'Indian/Maldives',
		    ], [
		        'name' => 'America/Mexico_City',
		    ], [
		        'name' => 'America/Cancun',
		    ], [
		        'name' => 'America/Merida',
		    ], [
		        'name' => 'America/Monterrey',
		    ], [
		        'name' => 'America/Matamoros',
		    ], [
		        'name' => 'America/Mazatlan',
		    ], [
		        'name' => 'America/Chihuahua',
		    ], [
		        'name' => 'America/Ojinaga',
		    ], [
		        'name' => 'America/Hermosillo',
		    ], [
		        'name' => 'America/Tijuana',
		    ], [
		        'name' => 'America/Bahia_Banderas',
		    ], [
		        'name' => 'Asia/Kuala_Lumpur',
		    ], [
		        'name' => 'Asia/Kuching',
		    ], [
		        'name' => 'Africa/Maputo',
		    ], [
		        'name' => 'Africa/Windhoek',
		    ], [
		        'name' => 'Pacific/Noumea',
		    ], [
		        'name' => 'Pacific/Norfolk',
		    ], [
		        'name' => 'Africa/Lagos',
		    ], [
		        'name' => 'America/Managua',
		    ], [
		        'name' => 'Europe/Amsterdam',
		    ], [
		        'name' => 'Europe/Oslo',
		    ], [
		        'name' => 'Asia/Kathmandu',
		    ], [
		        'name' => 'Pacific/Nauru',
		    ], [
		        'name' => 'Pacific/Niue',
		    ], [
		        'name' => 'Pacific/Auckland',
		    ], [
		        'name' => 'Pacific/Chatham',
		    ], [
		        'name' => 'America/Panama',
		    ], [
		        'name' => 'America/Lima',
		    ], [
		        'name' => 'Pacific/Tahiti',
		    ], [
		        'name' => 'Pacific/Marquesas',
		    ], [
		        'name' => 'Pacific/Gambier',
		    ], [
		        'name' => 'Pacific/Port_Moresby',
		    ], [
		        'name' => 'Pacific/Bougainville',
		    ], [
		        'name' => 'Asia/Manila',
		    ], [
		        'name' => 'Asia/Karachi',
		    ], [
		        'name' => 'Europe/Warsaw',
		    ], [
		        'name' => 'America/Miquelon',
		    ], [
		        'name' => 'Pacific/Pitcairn',
		    ], [
		        'name' => 'America/Puerto_Rico',
		    ], [
		        'name' => 'Asia/Gaza',
		    ], [
		        'name' => 'Asia/Hebron',
		    ], [
		        'name' => 'Europe/Lisbon',
		    ], [
		        'name' => 'Atlantic/Madeira',
		    ], [
		        'name' => 'Atlantic/Azores',
		    ], [
		        'name' => 'Pacific/Palau',
		    ], [
		        'name' => 'America/Asuncion',
		    ], [
		        'name' => 'Asia/Qatar',
		    ], [
		        'name' => 'Indian/Reunion',
		    ], [
		        'name' => 'Europe/Bucharest',
		    ], [
		        'name' => 'Europe/Belgrade',
		    ], [
		        'name' => 'Europe/Kaliningrad',
		    ], [
		        'name' => 'Europe/Moscow',
		    ], [
		        'name' => 'Europe/Simferopol',
		    ], [
		        'name' => 'Europe/Kirov',
		    ], [
		        'name' => 'Europe/Astrakhan',
		    ], [
		        'name' => 'Europe/Volgograd',
		    ], [
		        'name' => 'Europe/Saratov',
		    ], [
		        'name' => 'Europe/Ulyanovsk',
		    ], [
		        'name' => 'Europe/Samara',
		    ], [
		        'name' => 'Asia/Yekaterinburg',
		    ], [
		        'name' => 'Asia/Omsk',
		    ], [
		        'name' => 'Asia/Novosibirsk',
		    ], [
		        'name' => 'Asia/Barnaul',
		    ], [
		        'name' => 'Asia/Tomsk',
		    ], [
		        'name' => 'Asia/Novokuznetsk',
		    ], [
		        'name' => 'Asia/Krasnoyarsk',
		    ], [
		        'name' => 'Asia/Irkutsk',
		    ], [
		        'name' => 'Asia/Chita',
		    ], [
		        'name' => 'Asia/Yakutsk',
		    ], [
		        'name' => 'Asia/Khandyga',
		    ], [
		        'name' => 'Asia/Vladivostok',
		    ], [
		        'name' => 'Asia/Ust-Nera',
		    ], [
		        'name' => 'Asia/Magadan',
		    ], [
		        'name' => 'Asia/Sakhalin',
		    ], [
		        'name' => 'Asia/Srednekolymsk',
		    ], [
		        'name' => 'Asia/Kamchatka',
		    ], [
		        'name' => 'Asia/Anadyr',
		    ], [
		        'name' => 'Asia/Riyadh',
		    ], [
		        'name' => 'Pacific/Guadalcanal',
		    ], [
		        'name' => 'Indian/Mahe',
		    ], [
		        'name' => 'Africa/Khartoum',
		    ], [
		        'name' => 'Europe/Stockholm',
		    ], [
		        'name' => 'Asia/Singapore',
		    ], [
		        'name' => 'America/Paramaribo',
		    ], [
		        'name' => 'Africa/Juba',
		    ], [
		        'name' => 'Africa/Sao_Tome',
		    ], [
		        'name' => 'America/El_Salvador',
		    ], [
		        'name' => 'Asia/Damascus',
		    ], [
		        'name' => 'America/Grand_Turk',
		    ], [
		        'name' => 'Africa/Ndjamena',
		    ], [
		        'name' => 'Indian/Kerguelen',
		    ], [
		        'name' => 'Asia/Bangkok',
		    ], [
		        'name' => 'Asia/Dushanbe',
		    ], [
		        'name' => 'Pacific/Fakaofo',
		    ], [
		        'name' => 'Asia/Dili',
		    ], [
		        'name' => 'Asia/Ashgabat',
		    ], [
		        'name' => 'Africa/Tunis',
		    ], [
		        'name' => 'Pacific/Tongatapu',
		    ], [
		        'name' => 'Europe/Istanbul',
		    ], [
		        'name' => 'America/Port_of_Spain',
		    ], [
		        'name' => 'Pacific/Funafuti',
		    ], [
		        'name' => 'Asia/Taipei',
		    ], [
		        'name' => 'Europe/Kiev',
		    ], [
		        'name' => 'Europe/Uzhgorod',
		    ], [
		        'name' => 'Europe/Zaporozhye',
		    ], [
		        'name' => 'Pacific/Wake',
		    ], [
		        'name' => 'America/New_York',
		    ], [
		        'name' => 'America/Detroit',
		    ], [
		        'name' => 'America/Kentucky/Louisville',
		    ], [
		        'name' => 'America/Kentucky/Monticello',
		    ], [
		        'name' => 'America/Indiana/Indianapolis',
		    ], [
		        'name' => 'America/Indiana/Vincennes',
		    ], [
		        'name' => 'America/Indiana/Winamac',
		    ], [
		        'name' => 'America/Indiana/Marengo',
		    ], [
		        'name' => 'America/Indiana/Petersburg',
		    ], [
		        'name' => 'America/Indiana/Vevay',
		    ], [
		        'name' => 'America/Chicago',
		    ], [
		        'name' => 'America/Indiana/Tell_City',
		    ], [
		        'name' => 'America/Indiana/Knox',
		    ], [
		        'name' => 'America/Menominee',
		    ], [
		        'name' => 'America/North_Dakota/Center',
		    ], [
		        'name' => 'America/North_Dakota/New_Salem',
		    ], [
		        'name' => 'America/North_Dakota/Beulah',
		    ], [
		        'name' => 'America/Denver',
		    ], [
		        'name' => 'America/Boise',
		    ], [
		        'name' => 'America/Phoenix',
		    ], [
		        'name' => 'America/Los_Angeles',
		    ], [
		        'name' => 'America/Anchorage',
		    ], [
		        'name' => 'America/Juneau',
		    ], [
		        'name' => 'America/Sitka',
		    ], [
		        'name' => 'America/Metlakatla',
		    ], [
		        'name' => 'America/Yakutat',
		    ], [
		        'name' => 'America/Nome',
		    ], [
		        'name' => 'America/Adak',
		    ], [
		        'name' => 'Pacific/Honolulu',
		    ], [
		        'name' => 'America/Montevideo',
		    ], [
		        'name' => 'Asia/Samarkand',
		    ], [
		        'name' => 'Asia/Tashkent',
		    ], [
		        'name' => 'America/Caracas',
		    ], [
		        'name' => 'Asia/Ho_Chi_Minh',
		    ], [
		        'name' => 'Pacific/Efate',
		    ], [
		        'name' => 'Pacific/Wallis',
		    ], [
		        'name' => 'Pacific/Apia',
		    ], [
		        'name' => 'Africa/Johannesburg'
		    ]
		];

		DB::table('timezones')->insert($timezones);
    }
}
