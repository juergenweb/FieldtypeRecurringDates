<?php namespace ProcessWire;


/*
 * Translation file for usage with Processwire translatable strings instead of pre-defined translations of RRule lib.
 * This file replaces all language translation files inside the i18 folder of the RRule lib.
 * File name: CustomTranslations.php
 * Created: 18.03.2023 
 */


/**
 * Translation file for Processwire translatable strings
 *
 * Most strings can be an array, with a value as the key. The system will
 * pick the translation corresponding to the key. The key "else" will be picked
 * if no matching value is found. This is useful for plurals.
 *
 * Licensed under the MIT license.
 *
 * For the full copyright and license information, please view the LICENSE file.
 *
 * @author Rémi Lanvin <remi@cloudconnected.fr>
 * @link https://github.com/rlanvin/php-rrule
 */
// define textdomain
$textdomain = 'site/modules/fieldtyperecurringdates/pw.php';

return array(
    'yearly' => array(
        '1' => __('yearly', $textdomain),
        'else' => sprintf( __('every %s years', $textdomain), '%{interval}')
    ),
    'monthly' => array(
        '1' => __('monthly', $textdomain),
        'else' => sprintf( __('every %s months', $textdomain), '%{interval}')
    ),
    'weekly' => array(
        '1' => __('weekly', $textdomain),
        'else' => sprintf( __('every %s weeks', $textdomain), '%{interval}')
    ),
    'daily' => array(
        '1' => __('daily', $textdomain),
        'else' => sprintf( __('every %s days', $textdomain), '%{interval}')
    ),
    'hourly' => array(
        '1' => __('hourly', $textdomain),
        'else' => sprintf( __('every %s hours', $textdomain), '%{interval}')
    ),
    'minutely' => array(
        '1' => __('minutely', $textdomain),
        'else' => sprintf( __('every %s minutes', $textdomain), '%{interval}')
    ),
    'secondly' => array(
        '1' => __('secondly', $textdomain),
        'else' => sprintf( __('every %s seconds', $textdomain), '%{interval}')
    ),
    'dtstart' => ', '.sprintf( __('starting from %s', $textdomain), '%{date}'),
    'infinite' => ', '.__('forever', $textdomain),
    'until' => ', '.sprintf( __('until %s', $textdomain), '%{date}'),
    'count' => array(
        '1' => ', '.__('one time', $textdomain),
        'else' => ', '.sprintf( __('%s times', $textdomain), '%{count}'),
    ),
    'and' => __('and', $textdomain).' ',
    'x_of_the_y' => array(
        'yearly' => sprintf( __('%s of the year', $textdomain), '%{x}'), // e.g. the first Monday of the year, or the first day of the year
        'monthly' => sprintf( __('%s of the month', $textdomain), '%{x}'),
    ),
    'bymonth' => ' '.sprintf( __('in %s', $textdomain), '%{month}'),
    'months' => array(
        1 => __('January', $textdomain),
        2 => __('February', $textdomain),
        3 => __('March', $textdomain),
        4 => __('April', $textdomain),
        5 => __('May', $textdomain),
        6 => __('June', $textdomain),
        7 => __('July', $textdomain),
        8 => __('August', $textdomain),
        9 => __('September', $textdomain),
        10 => __('October', $textdomain),
        11 => __('November', $textdomain),
        12 => __('December', $textdomain),
    ),
    'byweekday' => ' '.sprintf( __('on %s', $textdomain), '%{weekdays}'),
    'weekdays' => array(
        1 => __('Monday', $textdomain),
        2 => __('Tuesday', $textdomain),
        3 => __('Wednesday', $textdomain),
        4 => __('Thursday', $textdomain),
        5 => __('Friday', $textdomain),
        6 => __('Saturday', $textdomain),
        7 => __('Sunday', $textdomain),
    ),
    'nth_weekday' => array(
        '1' => sprintf( __('the first %s', $textdomain), '%{weekday}'), // e.g. the first Monday
        '2' => sprintf( __('the second %s', $textdomain), '%{weekday}'),
        '3' => sprintf( __('the third %s', $textdomain), '%{weekday}'),
        'else' => sprintf( __('the %sth %s', $textdomain), '%{n}', '%{weekday}')
    ),
    '-nth_weekday' => array(
        '-1' => sprintf( __('the last %s', $textdomain), '%{weekday}'), // e.g. the last Monday
        '-2' => sprintf( __('the penultimate %s', $textdomain), '%{weekday}'),
        '-3' => sprintf( __('the antepenultimate %s', $textdomain), '%{weekday}'),
        'else' => ' '.sprintf( __('the %sth to the last %s', $textdomain), '%{n}', '%{weekday}')
    ),
    'byweekno' => array(
        '1' => ' '.sprintf( __('on week %s', $textdomain), '%{weeks}'),
        'else' => ' '.sprintf( __('on weeks number %s', $textdomain), '%{weeks}')
    ),
    'nth_weekno' => sprintf( __('%s', $textdomain), '%{n}'),
    'bymonthday' => ' '.sprintf( __('on %s', $textdomain), '%{monthdays}'),
    'nth_monthday' => array(
        '1' => __('the 1st', $textdomain),
        '2' => __('the 2nd', $textdomain),
        '3' => __('the 3rd', $textdomain),
        '21' => __('the 21st', $textdomain),
        '22' => __('the 22nd', $textdomain),
        '23' => __('the 23rd', $textdomain),
        '31' => __('the 31st', $textdomain),
        'else' => sprintf( __('the %sth', $textdomain), '%{n}')
    ),
    '-nth_monthday' => array(
        '-1' => __('the last day', $textdomain),
        '-2' => __('the penultimate day', $textdomain),
        '-3' => __('the antepenultimate day', $textdomain),
        '-21' => __('the 21st to the last day', $textdomain),
        '-22' => __('the 22nd to the last day', $textdomain),
        '-23' => __('the 23rd to the last day', $textdomain),
        '-31' => __('the 31st to the last day', $textdomain),
        'else' => sprintf( __('the %sth to the last day', $textdomain), '%{n}')
    ),
    'byyearday' => array(
        '1' => ' '.sprintf( __('on %s day', $textdomain), '%{yeardays}'),
        'else' => ' '.sprintf( __('on %s days', $textdomain), '%{yeardays}')
    ),
    'nth_yearday' => array(
        '1' => __('the first', $textdomain),
        '2' => __('the second', $textdomain),
        '3' => __('the third', $textdomain),
        'else' => sprintf( __('the %sth', $textdomain), '%{n}')
    ),
    '-nth_yearday' => array(
        '-1' => __('the last', $textdomain),
        '-2' => __('the penultimate', $textdomain),
        '-3' => __('the antepenultimate', $textdomain),
        'else' => sprintf( __('the %sth to the last', $textdomain), '%{n}')
    ),
    'byhour' => array(
        '1' => ' '.sprintf( __('at %s', $textdomain), '%{hours}'),
        'else' => ' '.sprintf( __('at %s', $textdomain), '%{hours}')
    ),
    'nth_hour' => sprintf( __('%{n}h', $textdomain), '%{n}'),
    'byminute' => array(
        '1' => ' '.sprintf( __('at minute %s', $textdomain), '%{minutes}'),
        'else' => ' '.sprintf( __('at minutes %s', $textdomain), '%{minutes}'),
    ),
    'nth_minute' => sprintf( __('%s', $textdomain), '%{n}'),
    'bysecond' => array(
        '1' => ' '.sprintf( __('at second %s', $textdomain), '%{seconds}'),
        'else' => ' '.sprintf( __('at seconds %s', $textdomain), '%{seconds}'),
    ),
    'nth_second' => sprintf( __('%s', $textdomain), '%{n}'),
    'bysetpos' => ', '.sprintf( __('but only %s instance of this set', $textdomain), '%{setpos}'),
    'nth_setpos' => array(
        '1' => __('the first', $textdomain),
        '2' => __('the second', $textdomain),
        '3' => __('the third', $textdomain),
        'else' => sprintf( __('the %sth', $textdomain), '%{n}')
    ),
    '-nth_setpos' => array(
        '-1' => __('the last', $textdomain),
        '-2' => __('the penultimate', $textdomain),
        '-3' => __('the antepenultimate', $textdomain),
        'else' => sprintf( __('the %sth to the last', $textdomain), '%{n}')
    )
);
