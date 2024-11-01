<?php

namespace App\Service;

class HomeService
{

    /**
     * @param $countryCode
     * @param mixed $row
     * @return void
     */
    public function getServicePricesByLocation($countryCode, mixed $row): void
    {
        if ($countryCode === "NG") {
            $row['price_text'] = "₦" . number_format($row->cost);
            $row['price_value'] = $row->cost;
        } else {
            $row['price_text'] = "$" . number_format($row->cost_usd);
            $row['price_value'] = $row->cost_usd;
        }
    }

}
