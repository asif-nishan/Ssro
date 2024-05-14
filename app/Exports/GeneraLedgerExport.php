<?php

namespace App\Exports;

use App\JV;
use App\JVItem;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GeneraLedgerExport implements FromArray, WithHeadings
{
    /**
     * @return array
     */
    public function array(): array
    {
        $reportArray = [];
        $jvs = JV::all();
        foreach ($jvs as $key => $jv) {

            $hasMoreDebit = $jv->hasMoreDebit();
            $getFirstCredit = $jv->getFirstCredit();
            $getFirstDebit = $jv->getFirstDebit();
            foreach ($jv->jvItems as $key => $jvItem) {
                if ($hasMoreDebit) {
                    if ($getFirstCredit != null) {
                        if ($getFirstCredit->id != $jvItem->id) {
                            $row = [];
                            $row[] = Carbon::parse($jvItem->date)->format('d-m-Y');
                            $row[] = $jv->ref;
                            $row[] = $jv->detail;
                            $row[] = $jv->party;
                            $row[] = $jvItem->accountHead->code;
                            $row[] = $jvItem->accountHead->name;
                            $row[] = $jvItem->credit;
                            $row[] = $getFirstCredit != null ? $getFirstCredit->accountHead->code : '';
                            $row[] = $getFirstCredit != null ? $getFirstCredit->accountHead->name : '';
                            $row[] = $getFirstCredit != null ? $getFirstCredit->credit : '';
                            $row[] = $jv->remarks;
                            $reportArray[]=$row;
                        }
                    }

                } else {
                    if ($getFirstDebit != null) {
                        if ($getFirstDebit->id != $jvItem->id) {
                            $row = [];
                            $row[] = Carbon::parse($jvItem->date)->format('d-m-Y');
                            $row[] = $jv->ref;
                            $row[] = $jv->detail;
                            $row[] = $jv->party;
                            $row[] = $getFirstDebit != null ? $getFirstDebit->accountHead->code : '';
                            $row[] = $getFirstDebit != null ? $getFirstDebit->accountHead->name : '';
                            $row[] = $getFirstDebit != null ? $getFirstDebit->debit : '';
                            $row[] = $jvItem->accountHead->code;
                            $row[] = $jvItem->accountHead->name;
                            $row[] = $jvItem->credit;
                            $row[] = $jv->remarks;
                            $reportArray[]=$row;
                        }
                    }


                }

            }
        }
        return $reportArray;
    }

    public function headings(): array
    {
        return [
            'Date',
            'Ref',
            'Details',
            'Party',
            'D.C',
            'Acc. Head',
            'D.A.',
            'CC',
            'Acc. Head',
            'C.A',
            'Remark',
        ];
    }
}
