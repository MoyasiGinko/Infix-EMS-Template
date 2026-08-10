<?php

namespace Modules\Notes\Exports;

use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NotesExport implements FromArray, WithHeadings, Responsable
{
    private array $rows;

    public $fileName = 'notes.xlsx';

    public function __construct(array $rows)
    {
        $this->rows = $rows;
    }

    public function array(): array
    {
        return $this->rows;
    }

    public function headings(): array
    {
        return [
            'Title','Type','Content','Reference ID','Tags','Quantity','Amount','Created By','Related ID','Related Type','Created At'
        ];
    }

    public function toResponse($request)
    {
        return \Maatwebsite\Excel\Facades\Excel::download($this, $this->fileName);
    }
}
