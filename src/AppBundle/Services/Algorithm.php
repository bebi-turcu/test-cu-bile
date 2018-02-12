<?php

namespace AppBundle\Services;

class Algorithm
{
    /*
     * @param string $distr
     * @param string $dim
     */
    public function verify($distr, $dim) {
        $toInteger = function($str) {
            return intval(trim($str));
        };
        $n = $toInteger($dim);                  # number of colors
        $bowls = explode(',', $distr);

        if (count($bowls) != $n) {
            return 'Nu ati specificat nr. de bile pentru fiecare culoare data';
        }

        $bowls = array_map($toInteger, $bowls); # numbers of balls for each colour
        if (array_sum($bowls) != $n * $n) {
            return 'Nr. de bile adunate nu e egal cu nr. de culori la patrat';
        }

        # form groups of balls as rows in an array
        $rows = array();
        for ($r = 0; $r < $n; $r++) {
            if (!($rows[$r] = $this->takeAndPlaceBalls([], $bowls, $n))) {
                return 'Grupare nereusita';
            }
            $needed = $n - count($rows[$r]);
            if ($needed) {
                if (!($rows[$r] = $this->takeAndPlaceBalls($rows[$r], $bowls, $n, $needed))) {
                    return 'Grupare nereusita';
                }
            }
        }

        return $rows;
    }

    # take balls from a certain bowl and place them on the current row
    # passing $n as argument instead of calculating count($bowls) every time (for speed)
    private function takeAndPlaceBalls($row, &$bowls, $n, $needed = 0) {
        # find a bowl with lowest number of balls, but >= $min
        $min = $needed ? $needed: 1;
        $sorted = $bowls;
        sort($sorted);
        foreach ($sorted as $val) {
            if ($val >= $min) {
                $balls = $val;
                $colour = array_search($val, $bowls);
                break;
            }
        }
        if (!isset($balls)) {
            $row = null; # if no value is >= $min
        }
        else {
            $taken = $needed ? $needed: ($balls < $n ? $balls: $n);
            $bowls[$colour] = $balls - $taken;

            # place balls on the current row
            for ($col = 0; $col < $taken; $col++) {
                $row[] = $colour;
            }
        }
        return $row;
    }
}