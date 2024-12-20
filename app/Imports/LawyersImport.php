<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Lawyer;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class LawyersImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $stt = 1;
        foreach ($collection as $key => $row) {
            $fullname = trim($row[0]);
            $slug = trim(Str::slug($fullname).'-'.$stt++);
            $card_number = trim($row[1]);
            $workplace = trim($row[2]);
            $organization_id = trim($row[3]);
            $birthday = Carbon::createFromFormat('d/m/Y', trim($row[4]))->format('Y-m-d');
            $card_issuance_date = Carbon::createFromFormat('d/m/Y', trim($row[5]))->format('Y-m-d');

            $lawyer = Lawyer::create([
                'fullname' => $fullname,
                'slug' => $slug,
                'card_number' => $card_number,
                'workplace' => $workplace,
                'organization_id' => $organization_id,
                'birthday' => $birthday,
                'card_issuance_date' => $card_issuance_date,
            ]);
        }
    }
}
