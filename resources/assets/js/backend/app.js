var Vue = require('vue');

import Row from './modules/Row.vue';


new Vue({
    el: "#app",
    components: {
        "my-row": Row
    },
    methods: {
        addLine: function () {
            this.rows.push({
                cols: [
                    {
                        title: "teste"
                    }
                ]
            })
        },
        removeLines: function () {
            this.rows = [];
        }
    },
    events: {
        "remove-row": function (row) {
            this.rows.$remove(row);
        },
        "remove-col": function (i, col) {
            this.rows[i].cols.splice(col, 1);
        }
    },
    data: {
        rows: [
            {
                cols: [
                    {
                        id: 1
                    }
                ]
            },
            {
                cols: [
                    {
                        id: 2
                    },
                    {
                        id: 3
                    }
                ]
            }
        ]
    }
});