<?php

namespace App\Imports;

use App\Rate;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportRate implements WithHeadingRow,ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if($row->filter()->isNotEmpty() && !empty($row['plan'])){
                
                $rate = Rate::where('plan',$row['plan'])->where('age',$row['age'])->where('pterm',$row['pterm'])->where('mterm',$row['mterm'])->where('rate',$row['rate'])->first();
                
                if(empty($rate)) {
                    Rate::create([
                        'plan'  => $row['plan'],
                        'age'   => $row['age'],
                        'pterm' => !empty($row['pterm']) ? $row['pterm'] : '',
                        'mterm' => $row['mterm'],
                        'rate'  => $row['rate'],
                    ]);
                }
            }
        }
    }
    // public function model(array $row)
    // {
    //     return new Rate([
    //         'plan'  => $row['plan'],
    //         'age'   => $row['age'],
    //         'pterm' => $row['pterm'],
    //         'mterm' => $row['mterm'],
    //         'rate'  => $row['rate'],
    //     ]);
    // }
}
