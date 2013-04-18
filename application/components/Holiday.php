<?php
/**
 * Class file for holiday class
 * 
 * @author Christopher Koning <ckoning@realbrightmedia.com>
 */
 
/**
 * Holiday Class
 * 
 * Implements a singleton static method to check if a given date is in the list of holidays.
 * 
 * The list is taken from an internal array that carries all federal holidays from 2012-2017 in it.
 * @todo Improve to detect holidays based on their definitions, not an array of preknown values
 */
class Holiday
{   //// MEMBERS
    /**
     * @var array The list of holidays to search
     */
    protected static $_holidays = array(
        '2012-01-02',
        '2012-01-16',
        '2012-02-20',
        '2012-05-28',
        '2012-07-04',
        '2012-09-03',
        '2012-10-08',
        '2012-11-12',
        '2012-11-22',
        '2012-12-25',
        '2013-01-01',
        '2013-01-21',
        '2013-02-18',
        '2013-05-27',
        '2013-07-04',
        '2013-09-02',
        '2013-10-14',
        '2013-11-11',
        '2013-11-28',
        '2013-12-25',
        '2014-01-01',
        '2014-01-20',
        '2014-02-17',
        '2014-05-26',
        '2014-07-04',
        '2014-09-01',
        '2014-10-13',
        '2014-11-11',
        '2014-11-27',
        '2014-12-25',
        '2015-01-01',
        '2015-01-19',
        '2015-02-16',
        '2015-05-25',
        '2015-07-03',
        '2015-09-07',
        '2015-10-12',
        '2015-11-11',
        '2015-11-26',
        '2015-12-25',
        '2016-01-01',
        '2016-01-18',
        '2016-02-15',
        '2016-05-30',
        '2016-07-04',
        '2016-09-05',
        '2016-10-10',
        '2016-11-11',
        '2016-11-24',
        '2016-12-26',
        '2017-01-02',
        '2017-01-16',
        '2017-02-20',
        '2017-05-29',
        '2017-07-04',
        '2017-09-04',
        '2017-10-09',
        '2017-11-10',
        '2017-11-23',
        '2017-12-25'
    );

    //// METHODS
    /**
     * Checks a date to see if it is a holiday
     * 
     * @param string $date The date to check in an ISO 8601 format (yyyy-mm-dd)
     * @return boolean Whether or not the date is a holiday. A true value indicates it is.
     */
    public static function check($date)
    {
        return in_array($date, self::$_holidays);
    }
    
} // End Holiday Class
