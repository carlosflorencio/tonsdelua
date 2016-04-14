<style>
    .alert-grey {
        background-color: #d1d1d1 !important;
    }
    .alert-grey {
        border-color: #bebebe;
    }
</style>

<template>
    <div class="module alert-grey alert-dismissible">
        <button type="button" style="opacity: 1" class="close" @click="removeCol" title="Apagar módulo">×</button>
        <h4><i class="icon fa fa-edit"></i> Módulo {{ i + 1 }}</h4>

        <select class="form-control" v-model="selected" style="width: 100%">
            <option v-for="m in notUsed" :value="m.id">{{ m.name }}</option>
        </select>
    </div>
</template>

<script>
    export default {
        props: ['col', 'i', 'modules'],
        inherit: true,
        data: function () {
          return {
              selected: this.col.module
          }
        },
        computed: {
          notUsed: function () {
              var s = this.selected;
              return this.modules.filter(function (o) {
                  return o.used == false || o.id == s;
              })
          }
        },
        methods: {
            removeCol: function () {
                this.$parent.removeCol(this.col);
            }
        },
        watch: {
          'selected': function (val, oldVal) {
              for (var i in this.modules) {
                  if (this.modules[i].id != 0 && this.modules[i].id == val) { //set used for current
                      this.col.module = val;
                      this.modules[i].used = true;
                  } else {
                      if(this.modules[i].id == oldVal) { //unset used the old val
                          this.modules[i].used = false;
                          this.col.module = 0;
                      }
                  }
              }
          }
        }
    };
</script>