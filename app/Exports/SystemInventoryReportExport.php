<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SystemInventoryReportExport implements FromArray, WithHeadings
{
	private $data;

	public function __construct($request)
    {
        $this->data = $request;
    }

	public function array(): array
    {
        return array_map(function($d) {
    		return [
    			$d['material'],
    			$d['value'] ? $d['value'] : '0'
    		];
    	}, $this->data);
    }

    public function headings(): array
    {
        return [
            'Material',
            'Value',
        ];
    }
}