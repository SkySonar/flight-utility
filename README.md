# Flight Helper Classes

This repository contains several PHP classes designed to aid with various computations related to air travel. These classes are used in the [SkySonar](https://skysonar.com) website.

## Index
1. [RouteCalculator](#RouteCalculator)
2. (More classes will be added as the project evolves)

## <a name="RouteCalculator"></a>RouteCalculator Class
This class contains methods for various calculations related to flight routes. It is utilized extensively on the [SkySonar](https://skysonar.com) website.

### Properties
- `$flying_speed`: Defines the speed of the aircraft in mph (804.67 km/h).
- `$takeoff_landing_time`: Defines the estimated time for takeoff and landing in minutes.

### Methods
- `calculateDistance($place1_latitude_deg, $place1_longitude_deg, $longitude_deg, $place2_latitude_deg, $place2_longitude_deg, $mu = 'mi', $round = TRUE)`: This method calculates the distance between two places, provided their geographical coordinates (latitude and longitude) in degrees. The distance can be obtained in kilometers (km) or miles (mi). If `$round` is set to `TRUE`, the returned distance value will be rounded to the nearest integer.
- `calculateFlightTime($distance, $mu = 'mi')`: This method calculates the flight time based on the distance between two places. The distance can be specified in kilometers (km) or miles (mi). The result includes the time required for takeoff and landing.
- `minutesToHoursAndMinutes($minutes)`: This method converts a time value in minutes into a formatted string indicating hours and minutes (e.g., "2h 30m").
- `minutesToHoursAndMinutesArray($minutes)`: This method converts a time value in minutes into an associative array containing hours and minutes.
- `formatFlightDuration($minutes)`: This method takes a duration in minutes and formats it into a human-readable string, correctly handling the singular and plural forms (e.g., "1 hour 30 minutes" or "2 hours").

## Future Enhancements
We are planning to add more classes to this repository that will handle different aspects of flight computations and flight-related operations. These enhancements will also be implemented on the [SkySonar](https://skysonar.com) website.

Stay tuned for more updates!
