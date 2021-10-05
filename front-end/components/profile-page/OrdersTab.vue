<template>
  <div class="py-10">
    <v-row no-gutters class="mb-md-5">
      <v-col v-if="vuetifyBreakpoint.mdAndUp" cols="2" class="size18-weight700">Период</v-col>
      <v-col class="size18-weight700">
        Ваши заказы
        <v-divider class="mt-3"/>
      </v-col>
    </v-row>
    <Tabs :vertical="vuetifyBreakpoint.mdAndUp">
      <v-tab
        v-for="(tab, index) in tabs"
        :key="index"
        class="d-flex justify-md-start size18-weight400"
        :style="vuetifyBreakpoint.mdAndUp ? 'width: 195px' : ''"
      >
        {{ tab.title }}
      </v-tab>
      <v-tab-item v-for="(tab, tabIndex) in tabs" :key="tabIndex" class="pl-md-5">
        <template v-if="tab.name === 'all'">
          <OrderCard :orders="productInOrderHistory"/>
        </template>
      </v-tab-item>
    </Tabs>
  </div>
</template>

<script>
import MockMixin from "../../mixins/MockMixin";

export default {
  name: "OrdersTab",
  components: {
    Tabs: () => import('~~/components/common/Tabs'),
    OrderCard: () => import('~~/components/profile-page/OrderCard'),
  },
  mixins: [MockMixin],
  data() {
    return {
      tabs: [
        {
          name: 'all',
          title: 'все',
        },
        {
          name: 'this_month',
          title: 'За этот месяц',
        },
        {
          name: 'last_month',
          title: 'Прошлый месяц',
        },
        {
          name: 'this_year',
          title: 'Этот год',
        },
        {
          name: 'last_year',
          title: 'Прошлый год',
        },
      ],
    }
  },
  computed: {
    ordersInThisMonth() {
      const thisMonth = this.$moment().subtract(1, 'month').format('D MMMM YYYY HH:mm')
      // return this.productInOrderHistory.filter(item => {
      //
      // })
      return thisMonth;
    }
  }
}
</script>

<style scoped>

</style>
