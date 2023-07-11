<?php


class RouteCalculator
{
    private $flying_speed = 500; // mph  804.67 km/h
    private $takeoff_langing_time = 50; // minutes

    //calculate distance from iata code
    public function calculateDistance($place1_latitude_deg, $place1_longitude_deg, $longitude_deg, $place2_latitude_deg, $place2_longitude_deg, $mu = 'mi', $round = TRUE)
    { // km or mi

        if (isset($place1_latitude_deg) && isset($place2_longitude_deg)) {


            $theta = $place1_longitude_deg - $place2_longitude_deg;
            $dist = sin(deg2rad($place1_latitude_deg)) * sin(deg2rad($place2_latitude_deg)) + cos(deg2rad($place1_latitude_deg)) * cos(deg2rad($place2_latitude_deg)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            if ($mu == 'km') {
                $distance = $miles * 1.609344;
                if($round){
                    $distance = round($distance);
                }
                return $distance;
            } else {
                $distance = $miles;
                if($round){
                    $distance = round($distance);
                }
                return $distance;
            }

        } else {
            return FALSE;
        }


    }

    //calculate flight time from distance
    public function calculateFlightTime($distance, $mu = 'mi')
    { // km or mi
        if ($mu == 'km') {
            $distance = $distance / 1.609344;
        }
        $time = $distance / $this->flying_speed;
        $time = $time * 60;
        $time = $time + $this->takeoff_langing_time;
        return $time;
    }
    //trasform minutes to hours and minutes
    public function minutesToHoursAndMinutes($minutes)
    {
        $minutes = (int)$minutes;
        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;
        $text = $hours . 'h ';
        if($minutes > 0){
            $text .= $minutes . 'm';
        }
        return $text;
    }

    //trasform minutes to hours and minutes array
    public function minutesToHoursAndMinutesArray($minutes)
    {
        $minutes = (int)$minutes;
        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;
        return array('hours' => $hours, 'minutes' => $minutes);
    }

    //format flight duration to hours and minutes plural and singular
    public function formatFlightDuration($minutes)
    {
        $minutes = (int)$minutes;
        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;
        if($minutes>0){
            $minutesTXT = $minutes . ' minute';
        }else{
            $minutesTXT = '';
        }
        if ($hours == 1) {
            $hours = $hours . ' hour ';
            return $hours . ' hour ' . $minutesTXT;
        } else {
            return $hours . ' hours ' . $minutesTXT;
        }
    }

}
