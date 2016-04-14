var Vue = require('vue');

import Row from './modules/Row.vue';


new Vue({
    el: "#module-layout",
    components: {
        "my-row": Row
    },
    methods: {
        addLine: function () {
            if(this.modulesLeft == 0) {
                alert("Não existem mais módulos disponiveis. Adicione mais!");
                return;
            }

            this.rows.push({
                cols: [
                    {
                        module: 0
                    }
                ]
            })
        },
        removeLines: function () {
            for(var i = 0; i < this.modules.length; ++i) {
                this.modules[i].used = false;
            }

            this.rows = [];
        },
        setModuleUnused: function (id) {
            for(var j = 0; j < this.modules.length; ++j) {
                if(this.modules[j].id == id) {
                    this.modules[j].used = false;
                    return;
                }
            }
        },
        sendData: function () {
            for(var r = 0; r < this.rows.length; r++) {
                for(var c = 0; c < this.rows[r].cols.length; c++) {
                    if(this.rows[r].cols[c].module == 0) {
                        alert("Erro! Nenhum módulo pode ficar por escolher.");
                        return;
                    }
                }
            }

            var l = Ladda.create(document.getElementById('save-button'));
            l.start();
            $.ajax({
                type: "POST",
                url: this.url,
                data: {rows: JSON.stringify(this.rows)},
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    $('#append-result').append("<span class='to-remove'><i class='fa fa-check'></i>Sucesso!</span>");
                    setTimeout(function() {
                        $('.to-remove').remove();
                    }, 2000);
                    l.stop();
                },
                error: function (error) {
                    console.log(error);
                    $('#append-result').append("<span class='to-remove'><i class='fa fa-exclamation'></i>Ocorreu um erro!</span>");
                    setTimeout(function() {
                        $('.to-remove').remove();
                    }, 2000);
                    l.stop();
                }
            });
        }
    },
    events: {
        "remove-row": function (row) {
            for(var i = 0; i < row.cols.length; ++i) {
                this.setModuleUnused(row.cols[i].module);
            }

            this.rows.$remove(row);
        },
        "remove-col": function (lineIndex, col) {
            this.setModuleUnused(col.module);
            this.rows[lineIndex].cols.$remove(col);
        }
    },
    data: {
        modules: modules,
        rows: layout,
        url: url
    },
    computed: {
        'modulesLeft': function () {
            return this.modules.filter(function (o) {
                return o.id != 0 && o.used == false;
            }).length;
        }
    },
    ready: function () {
        for(var r = 0; r < this.rows.length; r++) {
            for(var c = 0; c < this.rows[r].cols.length; c++) {
                for(var m = 1; m < this.modules.length; ++m) {
                    if(this.modules[m].id == this.rows[r].cols[c].module) {
                        this.modules[m].used = true;
                    }
                }
            }
        }
    }
});