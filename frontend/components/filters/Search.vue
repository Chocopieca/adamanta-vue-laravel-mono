<template>
  <form action="#">
    <el-input :placeholder="$t('labels.search')" v-model="search" name="search" size="small" @input="isTyping = true">
      <template v-slot:prefix>
        <img class="el-input__icon" style="width: 13px; margin-left: 4px;" src="/svg/search.svg">
      </template>

      <template v-slot:suffix v-if="search !== ''">
        <i class="search-clear-btn el-input__icon el-icon-error" @click="clear()"/>
      </template>
    </el-input>
  </form>
</template>

<script>
    export default {
        name: "Search",
        props: ['defSearch', 'method'],
        data() {
            return {
                isTyping: false,
                search: this.defSearch === undefined ? '' : this.defSearch
            }
        },
        watch: {
            search: function () {
                let search = this.search

                setTimeout(() => {
                    if(search === this.search) {
                        this.isTyping = false
                    }
                }, 500)
            },
            isTyping: function(value) {
                if (!value) {
                    this.method(this.search)
                }
            }
        },
        methods: {
            clear() {
                this.search = ''
                this.method('')
            }
        },
    }
</script>
