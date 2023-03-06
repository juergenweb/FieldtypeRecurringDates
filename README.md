This is a pre-release please do not use in production.

# FieldtypeRecurringDates

Fieldtype for definining recurring dates according to [RFC-RFC 5545](https://www.rfc-editor.org/rfc/rfc5545#section-3.3.10) and the awesome library
[php-rrule](https://github.com/rlanvin/php-rrule)

# Finding occurrences

You can use the module included in this same package to find the rules occurrences:

```
$output = $calendarRenderer->render(
    $selector, [
        'fields' => [
            // Will find event occurrences in fields specified in this array 
            'recurring_meetings',
            'recurring_events'
        ]
    ]
```

# TODO

- [ ] Add support for BYSETPOS
- [ ] Add support for 'Never' option.

# Wishlist

- [ ] Support for plain text RRule. 
- [ ] Add support for BYWEEKNO, BYYEARDAY, BYMONTHDAY, BYMINUTE, BYHOUR, BYMINUTE, BYSECOND .
- [ ] Add support to modify RRule before saving? Maybe skips
- [ ] Use RSet instead of RRule?

