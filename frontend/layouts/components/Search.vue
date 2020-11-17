<template>
  <div class="searchBoxWrap">
    <form ref="search-form" :class="'searchBox float-right mr-10 ' + (searchOpened ? 'searchBoxOpened' : '')" action="#" @submit.prevent="handlerSearch()">
      <el-autocomplete
        ref="search-input"
        :debounce="1000"
        :placeholder="$t('labels.search')"
        v-model="search"
        :trigger-on-focus="false"
        :fetch-suggestions="querySearchAsync"
        name="search"
        class="searchInput"
        @keydown.native="searchKeyDown"
        @focusout.native="searchFocusOut()"
      >
        <template v-slot:prefix>
          <img class="el-input__icon" style="width: 13px; margin-left: 4px;" src="/svg/search.svg">
        </template>

        <template v-slot:suffix v-if="search !== ''">
          <i class="search-clear-btn el-input__icon el-icon-error" @click="clearSearch()"/>
        </template>

        <template slot-scope="scope">
          <div class="search-suggest">
            <ul v-if="scope.item.books.length || scope.item.authors.length || scope.item.genres.length || scope.item.blog.length" class="suggest-list">
              <li class="search-suggest__item text-center">
                <a class="search-suggest__show-all" rel="nofollow" @click="handlerSearch()">
                  Все результаты поиска&nbsp;→
                </a>
              </li>

              <template v-if="scope.item.books.length">
                <li class="search-suggest__item label text-center">
                  <b>Книги</b>
                </li>
                <li v-for="(book, index) in scope.item.books" :key="index" class="search-suggest__item">
                  <a :href="$lang.link('book/' + book.slug)" :title="book.title" class="suggest-goods" rel="nofollow">
                    <span class="suggest-goods__image">
                      <template v-if="book.image">
                        <div :style="'background: url('+$env.assetUrl +book.image+') 100% 100% no-repeat;'" class="simple-tile-background"/>
                        <div :style="'background: url('+$env.assetUrl +book.image+') 100% 100% no-repeat;'" class="simple-tile-background-blur"/>
                      </template>
                    </span>
                    <span class="suggest-goods__info ellipsis-text">
                      <span class="suggest-goods__title">{{ book.title }}</span>
                    </span>
                  </a>
                </li>
              </template>

              <template v-if="scope.item.authors.length">
                <div class="search-suggest__item label text-center">
                  <b>Авторы</b>
                </div>
                <li v-for="(author, index) in scope.item.authors" :key="index" class="search-suggest__item">
                  <a :href="$lang.link('author/' + author.slug)" :title="author.name" class="suggest-goods" rel="nofollow">
                    <span class="suggest-goods__image">
                      <div :style="'background: url('+(author.image ? $env.assetUrl + author.image : '/svg/no_author.svg') +') 100% 100% no-repeat;'" :title="author.name" class="author-background"/>
                    </span>
                    <span class="suggest-goods__info ellipsis-text">
                      <span class="suggest-goods__title">{{ author.name }}</span>
                    </span>
                  </a>
                </li>
              </template>

              <template v-if="scope.item.genres.length">
                <div class="search-suggest__item label text-center">
                  <b>Жанры</b>
                </div>
                <li v-for="(genre, index) in scope.item.genres" :key="index" class="search-suggest__item">
                  <a :href="$lang.link('genre/' + genre.slug)" :title="genre.name" class="suggest-goods" rel="nofollow">
                    <span class="suggest-goods__info ellipsis-text">
                      <span class="suggest-goods__title">{{ genre.name }}</span>
                    </span>
                  </a>
                </li>
              </template>

              <template v-if="scope.item.blog.length">
                <div class="search-suggest__item label text-center">
                  <b>Блог</b>
                </div>
                <li v-for="(bl, index) in scope.item.blog" :key="index" class="search-suggest__item">
                  <a :href="$lang.link('blog/' + bl.slug)" :title="bl.name" class="suggest-goods" rel="nofollow">
                    <span class="suggest-goods__image">
                      <div :style="'background: url('+(bl.image ? $env.assetUrl + bl.image : '/svg/no_author.svg') +') 100% 100% no-repeat;'" :title="bl.name" class="author-background"/>
                    </span>
                    <span class="suggest-goods__info ellipsis-text">
                      <span class="suggest-goods__title">{{ bl.title }}</span>
                    </span>
                  </a>
                </li>
              </template>
            </ul>

            <h3 v-else class="text-center">Нет результатов</h3>
          </div>
        </template>
      </el-autocomplete>

      <el-button v-if="!searchOpened" style="border: none;" class="searchButton" circle size="mini" @click.native="openSearch()">
        <img style="width: 15px;" src="/svg/search_dark.svg">
      </el-button>
    </form>
  </div>
</template>

<script>
    export default {
        name: "Search",
        data() {
            return {
                search: '',
                searchOpened: false,
                searchFocused: false,
            }
        },
        methods: {
            openSearch() {
                this.searchOpened = true
                this.$refs['search-input'].$refs.input.clear()
                this.$refs['search-input'].focus()
            },
            clearSearch() {
                this.$refs['search-input'].$refs.input.clear()
                this.$refs['search-input'].focus()
            },
            handlerSearch() {
                window.location.href = this.$lang.link('search/' + this.search)
            },
            searchFocusOut() {
                if(this.search === '') {
                    this.searchOpened = false
                }
            },
            searchKeyDown(event) {
                if (event.which === 13) {
                    this.handlerSearch()
                }
            },
            async querySearchAsync(queryString, cb) {
                cb(queryString !== '' ? [(await this.$axios.get('search-autocomplete/' + queryString)).data] : [])
            }
        }
    }
</script>
