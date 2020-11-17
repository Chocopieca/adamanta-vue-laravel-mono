<template>
    <div class="w-100">
        <el-col :xl="4" :lg="4" :md="4" :sm="5" :xs="3">
            <nuxt-link :to="$lang.link('/')">
                <img width="90%" src="/logo.svg"/>
            </nuxt-link>
        </el-col>
        <el-col :xl="20" :lg="18" :md="20" :sm="19" :xs="21" style="padding-left: 10px">
            <b>Книжнатор</b> – электронная библиотека, в которой можно читать онлайн популярные книги, новинки в разных жанрах абсолютно бесплатно и без регистрации, прямо в браузере Вашего компьютера или смартфона!
        </el-col>
    </div>
</template>

<script>
    export default {
        name: "About"
    }
</script>