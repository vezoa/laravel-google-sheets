<?php
namespace GoogleSheets;

use Illuminate\Support\Collection;

class SheetsLaravel extends Sheets
{
    /**
     * @return Collection
     */
    public function get()
    {
        $values = $this->all();

        return collect($values);
    }

    /**
     * @param array $header
     * @param array|Collection $rows
     *
     * @return Collection
     */
    public function collection($header, $rows)
    {
        $collection = [];

        if ($rows instanceof Collection) {
            $rows = $rows->toArray();
        }

        foreach ($rows as $row) {
            $col = [];

            foreach ($header as $index => $head) {
                $col[$head] = empty($row[$index]) ? '' : $row[$index];
            }

            if (!empty($col)) {
                $collection[] = $col;
            }
        }

        return collect($collection);
    }

}
