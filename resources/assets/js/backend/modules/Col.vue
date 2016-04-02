<style>
    .alert-grey {
        background-color: #d1d1d1 !important;
    }
    .alert-grey {
        border-color: #bebebe;
    }
</style>

<template>
    <div class="alert alert-grey alert-dismissible">
        <button type="button" class="close" @click="removeCol">×</button>
        <h4><i class="icon fa fa-info"></i> Coluna {{ i + 1 }}</h4>
    </div>
</template>

<script>
    export default {
        props: ['col', 'i'],
        methods: {
            removeCol: function () {
                this.$parent.removeCol(this.i);
            }
        }
    };
</script>