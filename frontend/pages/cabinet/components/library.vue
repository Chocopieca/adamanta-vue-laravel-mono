<template>
  <el-row>
    <el-tabs :value="cabinetActiveLibraryTab" tab-position="top" @tab-click="handleTab">
      <el-tab-pane :label="$t('labels.bookmarks')" name="bookmarks">
        <el-row v-if="books.bookmarks.length">
          <el-col v-for="(book, index) in books.bookmarks" :xl="{span: 4}" :md="{span: 6}" :sm="{span: 12}" :xs="{span: 24}" :key="index">
            <book-card-simple-tile :book="book" class="mb-20">
              <template slot="buttons">
                <nuxt-link :to="$lang.link('reader/' + book.slug + '?page=' + book.page_number)">
                  <el-button class="w-100" type="primary">
                    {{ $t('labels.go_to_bookmark') }}
                  </el-button>
                </nuxt-link>
              </template>
            </book-card-simple-tile>
          </el-col>
        </el-row>

        <h4 v-else class="text-center mb-20 mt-20">У Вас нет закладок.</h4>
      </el-tab-pane>
      <el-tab-pane :label="$t('labels.notes')" name="notes">
        <el-row v-if="books.notes.length">
          <el-col v-for="(book, index) in books.notes" :xl="{span: 4}" :md="{span: 6}" :sm="{span: 12}" :xs="{span: 24}" :key="index">
            <book-card-simple-tile :book="book" class="mb-20">
              <template slot="buttons">
                <el-button class="w-100" type="primary" @click="showNotes(book)">
                  {{ $t('labels.see') }}
                </el-button>
              </template>
            </book-card-simple-tile>
          </el-col>
        </el-row>

        <h4 v-else class="text-center mb-20 mt-20">У Вас нет заметок.</h4>
      </el-tab-pane>
      <el-tab-pane :label="$t('labels.read')" name="read">
        <el-row v-if="books.read.length">
          <el-col v-for="(book, index) in books.read" :xl="{span: 4}" :md="{span: 6}" :sm="{span: 12}" :xs="{span: 24}" :key="index">
            <book-card-simple-tile :book="book" class="mb-20" />
          </el-col>
        </el-row>

        <h4 v-else class="text-center mb-20 mt-20">У Вас нет прочитанных книг.</h4>
      </el-tab-pane>
      <el-tab-pane :label="$t('labels.read_later')" name="read_later">
        <el-row v-if="books.read_later.length">
          <el-col v-for="(book, index) in books.read_later" :xl="{span: 4}" :md="{span: 6}" :sm="{span: 12}" :xs="{span: 24}" :key="index">
            <book-card-simple-tile :book="book" class="mb-20" />
          </el-col>
        </el-row>

        <h4 v-else class="text-center mb-20 mt-20">У Вас нет отложенных книг.</h4>
      </el-tab-pane>
    </el-tabs>

    <modal :title="currentBook.title" emit="book-notes" width="600px">
      <el-row>
        <el-col v-for="(note, key) in currentBook.book_notes" :span="24" :key="key" class="mb-20">
          <el-col :span="12">
            <nuxt-link :to="$lang.link('reader/' + currentBook.slug + '?page=' + note.page_number)" class="link">
              <h4>{{ $t('labels.page') }} {{ note.page_number }}</h4>
            </nuxt-link>
          </el-col>
          <el-col :span="12" style="text-align: right">
            <div>{{ note.created_at }}</div>
          </el-col>

          <el-col :span="24">
            <div class="mt-10" v-html="note.text"/>
          </el-col>
        </el-col>
      </el-row>
    </modal>
  </el-row>
</template>

<script>
    export default {
        name: "Library",
        props: ['books'],
        data() {
            return {
                currentBook: {}
            }
        },
        methods: {
            showNotes(book) {
                this.currentBook = book

                this.dialogShow('book-notes')
            },
            handleTab (e) {
                this.$store.dispatch('setApp', {state: 'cabinetActiveLibraryTab', data: e.name})
            }
        }
    }
</script>
