<template>
  <v-container fluid class="white pa-0">
    <v-container>
      <v-row  no-gutters align="center">
        <v-menu offset-y>
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              class="size18-weight700 mr-5 mb-5 mb-md-0"
              color="primary"
              dark
              rounded
              v-bind="attrs"
              v-on="on"
            >
              <span class="size18-weight700 flex-center mt-1 mr-5">Каталог товаров</span>
              <v-icon>
                mdi-menu
              </v-icon>
            </v-btn>
          </template>
          <v-list>
            <template v-for="(category, index) in categories">
              <nuxt-link :to="$lang.link(category.link)" :key="index">
                <v-list-item v-ripple class="mb-3">
                  <v-img width="56" height="56" :src="category.icon" class="mr-3"/>
                  <v-list-item-title>{{ category.title }}</v-list-item-title>
                </v-list-item>
              </nuxt-link>
            </template>
          </v-list>
        </v-menu>

        <template v-for="(page, index) in pages">
          <nuxt-link :to="$lang.link(page.link)" :key="index">
            <v-btn text class="mr-5">
              <span class="size18-weight700">{{ page.title}}</span>
            </v-btn>
          </nuxt-link>
        </template>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: "NavMenu",
  data() {
    return {

      categories: [
        {
          icon: 'icons/category1.svg',
          title: 'Химия для дома',
          link: 'category/khimiya_dlya_doma'
        },
        {
          icon: 'icons/category2.svg',
          title: 'Агрохимия',
          link: 'category/agrokhimiya'
        },
        {
          icon: 'icons/category3.svg',
          title: 'Техническая химия',
          link: 'category/tekhnicheskaya_khimiya'
        },
      ],
      pages: [
        {
          title: 'Главная',
          link: ''
        },
        {
          title: 'Контакты',
          link: 'contacts'
        },
        {
          title: 'Доставка и оплата',
          link: 'order_info'
        },
        {
          title: 'Отзывы',
          link: 'reviews'
        },
      ]
    }
  }
}
</script>

<style scoped>

</style>
