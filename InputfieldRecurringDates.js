var translations = ProcessWire.config.RecurringDates;

function initInputfieldRecurringDates(root) {
    if (root === undefined) {
        root = document;
    }
    let components = root.querySelectorAll("[defer-x-data]");
    components.forEach(function (component) {
        // https://github.com/alpinejs/alpine/issues/359#issuecomment-973688464
        let alpineComponent = component.getAttribute('defer-x-data');
        Alpine.mutateDom(function () {
            component.setAttribute('x-data', alpineComponent);
        })
        Alpine.initTree(component);
        component.removeAttribute('defer-x-data');
    });
}

jQuery(document).ready(function () {
    initInputfieldRecurringDates();
});

jQuery(document).on('reloaded', '.InputfieldRepeaterItem', function (event) {
    var inputfield = event.currentTarget;
    initInputfieldRecurringDates(inputfield);
});

document.addEventListener('alpine:init', (e) => {
    Alpine.data('recurringDatesInput', function () {
        return {
            inputfield: '',
            _rrule: null,
            rrule: {
                DTSTART: "",
                FREQ: "DAILY",
                INTERVAL: 1,
                COUNT: 0,
                UNTIL: "",
                BYDAY: [],
                BYMONTH: [],
                BYMONTHDAY: []
            },
            _settings: null,
            settings: null,
            hard_limit: null,
            show_table: false,
            catalogues: {
                filters: [
                    {label: translations.months, value: 'BYMONTH'},
                    {label: translations.daysoftheweek, value: 'BYDAY'},
                    {label: translations.daysofthemonth, value: 'BYMONTHDAY'},
                ],
                daysOfWeek: [
                    {name: translations.sunday, value: 'SU'},
                    {name: translations.monday, value: 'MO'},
                    {name: translations.tuesday, value: 'TU'},
                    {name: translations.wednesday, value: 'WE'},
                    {name: translations.thursday, value: 'TH'},
                    {name: translations.friday, value: 'FR'},
                    {name: translations.saturday, value: 'SA'},
                ],
                months: [
                    {name: translations.january, value: 'Jan'},
                    {name: translations.februrary, value: 'Feb'},
                ],
            },
            data: {
                dates: [],
                pagination: {
                    start: 0,
                    limit: null,
                    total: null,
                    sort: 'ascending',
                    pagination_string: '',
                    markup_pager: null,
                }
            },

            init: function () {
                this.inputfield = this.$el.dataset.inputfieldName;
                this.pageId = parseInt(this.$el.dataset.pageId);
                this.fieldId = parseInt(this.$el.dataset.fieldId)
                this.hard_limit = parseInt(this.$el.dataset.hardLimit)

                this.data.pagination.limit = this.$el.dataset.inputfieldLimit;
                this.updateEventList();


                this.$watch('rrule', (prop) => {
                    this.saveString();
                });

                this.$watch('settings', (prop, oldValue) => {
                    this._settings = JSON.stringify(this.settings);
                    var self = this;
                    self.catalogues.filters.forEach(function (filter) {

                        var found = self.settings.filters.find(filter_setting => filter_setting === filter.value);
                        if (found === undefined) {
                            if (self.rrule[filter.value] !== undefined) {
                                self.rrule[filter.value] = [];
                            }
                        }
                    });

                    this.saveString();
                });

                var json_rrule = this.$refs['main-input'].dataset.rrule;

                var widget_settings = this.$refs['main-input'].dataset.settings;

                if (widget_settings) {
                    this.settings = JSON.parse(widget_settings);
                }
                if (json_rrule) {
                    this.rrule = JSON.parse(json_rrule);
                    this._rrule = JSON.stringify(this.rrule);

                } else {

                    //this.settings.limit_mode = "count";
                }
            },


            updateEventList: function () {
                var url = new URL('fieldtype-recurring-dates/get-dates/', window.origin);
                var params = {
                    id: this.pageId,
                    field_id: this.fieldId,
                    limit: this.data.pagination.limit,
                    start: this.data.pagination.start
                }

                url.search = new URLSearchParams(params).toString();

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => {
                        if (!response.ok) alert(`Something went wrong: ${response.status} - ${response.statusText}`)
                        return response.json()
                    })
                    .then(response => {

                        this.data = response;
                    });
            },

            previousPage(){
                this.data.pagination.start -= this.data.pagination.limit
                this.updateEventList()
            },
            nextPage(){
                this.data.pagination.start += this.data.pagination.limit
                this.updateEventList()
            },
            is_filtering: function (filter) {
                if (this.rrule[filter] !== null || this.rrule[filter] !== undefined) {
                    if (this.rrule[filter].length) {
                        return true;
                    }
                }
            },
            getToggleText(){
                if(!this.show_table) {
                    return translations.showdates + " <span uk-icon='chevron-down'></span>";
                }else{
                    return translations.hidedates + " <span uk-icon='chevron-up'></span>";
                }
            },

            cloneObject: function (obj) {
                // basic type deep copy
                if (obj === null || obj === undefined || typeof obj !== 'object') {
                    return obj
                }
                // array deep copy
                if (obj instanceof Array) {
                    var cloneA = [];
                    for (var i = 0; i < obj.length; ++i) {
                        cloneA[i] = this.cloneObject(obj[i]);
                    }
                    return cloneA;
                }
                // object deep copy
                var cloneO = {};
                for (var i in obj) {
                    cloneO[i] = this.cloneObject(obj[i]);
                }
                return cloneO;
            },

            saveString: function () {
                var rrule_copy = this.cloneObject(this.rrule);
                if (this.settings.limit_mode === "count") {
                    delete rrule_copy.UNTIL
                }
                if (this.settings.limit_mode === "until") {
                    delete rrule_copy.COUNT
                }
                if (this.settings.limit_mode === "never") {
                    delete rrule_copy.UNTIL
                    rrule_copy.COUNT = this.hard_limit;
                }
                console.log(rrule_copy);
                var json_string = JSON.stringify(rrule_copy);
                if (this.$refs['pre-debug'] !== undefined) {
                    this.$refs['pre-debug'].innerText = JSON.stringify(rrule_copy, null, 2);
                }
                this._rrule = json_string;
            }
        }
    })
});

