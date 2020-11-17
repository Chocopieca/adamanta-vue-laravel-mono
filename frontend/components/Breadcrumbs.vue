<template>
  <el-row class="mb-20">
    <el-col :xl="{span: 24}" :md="{span: 24}" :sm="{span: 24}" :xs="{span: 24}">
      <el-breadcrumb separator-class="el-icon-arrow-right">
        <template v-for="(crumb, key) in crumbs">
          <el-breadcrumb-item v-if="key !== crumbs.length - 1" :to="{ path: $lang.link(crumb.url) }" :key="key">
            {{ crumb.title }}
          </el-breadcrumb-item>
          <el-breadcrumb-item v-else :key="key">
            {{ crumb.title }}
          </el-breadcrumb-item>
        </template>
      </el-breadcrumb>
    </el-col>
  </el-row>
</template>

<script>
export default {
  name: "Breadcrumbs"
}
</script>
