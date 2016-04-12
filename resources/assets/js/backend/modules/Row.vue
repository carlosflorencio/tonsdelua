<template>
    <div class="box box-default line-box">
        <div class="box-header with-border">
            <i class="fa fa-bars"></i>
            <h3 class="box-title">Linha {{ i + 1 }}</h3>
            <div class="pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" @click="addColumn"><i class="fa fa-plus"></i> Adicionar coluna</button>
                    <button type="button" class="btn btn-default" @click="removeLine(row)"><i class="fa fa-minus"></i> Remover Linha</button>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="{{ kclass }}" v-for="col in row.cols">
                <my-col :col="col" :modules.sync="modules" :i="$index"></my-col>
            </div>
        </div>
    </div>
</template>

<script>
    import Col from './Col.vue';

    export default {
        props: ['row', 'i', 'rows', 'modules'],
        components: {
            "my-col": Col
        },
        computed: {
            kclass: function () {
                var n = 12 / this.row.cols.length;
                return "col-md-" + n;
            }
        },
        methods: {
            removeLine: function (row) {
                this.$dispatch('remove-row', row);
            },
            removeCol: function (col) {
                this.$dispatch('remove-col', this.i, col);
            },
            addColumn: function () {
                if (this.row.cols.length < 4) {

                    if(this.$parent.modulesLeft == 0) {
                        alert("Não existem mais módulos disponiveis. Adicione mais!");
                        return;
                    }

                    this.row.cols.push({
                        module: 0
                    });
                } else {
                    alert("O máximo de colunas são 4.");
                }
            }
        }
    }
</script>