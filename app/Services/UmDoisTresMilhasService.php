<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class UmDoisTresMilhasService extends Service
{
    /**
     * @var string
     */
    public $baseUrl;

    /**
     * @var string
     */
    private $flights_url;

    public function __construct()
    {
        $this->baseUrl = config('services.um_dois_tres_milhas.base_url');
        $this->flights_url = $this->baseUrl . 'flights';
    }

    /**
     *
     * @return array
     *
     * @throws RequestException
     */
    public function all(): array
    {
        $flights = Http::get($this->flights_url)->throw()->json();
        $groups = $this->processFlights($flights);
        $firstGroup = $groups[0];
        return [
            'totalFlights' => count($flights),
            'totalGroups' => count($groups),
            'cheapestPrice' => $firstGroup['totalPrice'],
            'cheapestGroup' => $firstGroup['uniqueId'],
            'groups' => $groups,
            'flights' => $flights,
        ];
    }

    /**
     * @param $flights
     * @return array
     */
    private function processFlights($flights): array
    {
        $data = [];
        foreach (collect($flights)->groupBy('fare') as $price => $type_group) {
            $data = array_merge($data, $this->setFlightsGroupByPrice($type_group, $price));
        }
        usort($data, function ($a, $b) {
            return $a['totalPrice'] > $b['totalPrice'];
        });
        return $data;
    }

    /**
     *
     * @param $type_group
     * @param $price
     * @return array
     */
    private function setFlightsGroupByPrice($type_group, $price): array
    {
        $data = [];
        foreach ($type_group as $item) {
            if ($item['outbound'] === 1) {
                $data['outbound'][$item['price']][] = $item['id'];
            } else {
                $data['inbound'][$item['price']][] = $item['id'];
            }
        }
        return $this->createGroups($data, $price);
    }

    /**
     *
     * @param $group
     * @param $price
     * @return array
     */
    private function createGroups($group, $price): array
    {
        $data = [];
        foreach ($group['outbound'] as $value_outbound => $outbound) {
            foreach ($group['inbound'] as $value_inbound => $inbound) {
                $data[] = [
                    'uniqueId' => sha1($price . $value_outbound . $value_inbound),
                    'totalPrice' => $value_outbound + $value_inbound,
                    'outbound' => $outbound,
                    'inbound' => $inbound,
                ];
            }
        }
        return $data;
    }

}
