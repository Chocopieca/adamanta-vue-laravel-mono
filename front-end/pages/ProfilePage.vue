<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <div class="px-3 mb-md-10">
      <v-row no-gutters justify="space-between" align="center">
        <h1>Профиль</h1>
        <template v-if="vuetifyBreakpoint.mdAndDown">
          <nuxt-link :to="$lang.link('')">
            <Button
              :color-text="vuetifyMainBlue"
              :color-button="vuetifyTransparent"
              content="Выход"
              text
              small
              class="text-underline mt-2"
            />
          </nuxt-link>
        </template>
      </v-row>
      <Tabs :tabs="tabs">
        <v-tab-item v-for="(tab, tabIndex) in tabs" :key="tabIndex">
          <v-divider />
          <template v-if="tab.name === 'description'">
            <DescriptionTab />
          </template>
        </v-tab-item>

        <v-spacer />

        <template v-if="vuetifyBreakpoint.mdAndUp">
          <nuxt-link :to="$lang.link('')">
            <Button
              :color-text="vuetifyMainBlue"
              :color-button="vuetifyTransparent"
              content="Выход"
              text
              small
              class="text-underline mt-2"
            />
          </nuxt-link>
        </template>
      </Tabs>
    </div>
  </CommonPagesLayout>
</template>

<script>
import MockMixin from "../mixins/MockMixin";

export default {
  name: "ProfilePage",
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
    Tabs: () => import('~~/components/common/Tabs'),
    DescriptionTab: () => import('~~/components/profile-page/DescriptionTab'),
  },
  mixins: [MockMixin],
  data() {
    return {
      breadcrumbs: [
        {
          text: 'Главная',
          href: '/',
        },
        {
          text: 'Профиль пользователя',
          href: `profile`,
        },
      ],
      tabs: [
        {
          name: 'description',
          title: 'Контактная информация',
        },
        {
          name: 'usage',
          title: 'Доставка',
        },
        {
          name: 'reviews',
          title: 'История заказов',
        },
      ],
    }
  },
}
</script>

<style scoped>

</style>
