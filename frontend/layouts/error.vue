<template>
    <div class="container w-100 flex flex-h-center flex-v-center">
        <div class="error-page" style="text-align: center; margin: 20px 0 20px 0;">
            <img src="/svg/404.svg" />

            <div class="mb-10" id="code">{{error.statusCode}}</div>
            <div class="mb-10" id="title">{{getError('title')}}</div>

            <div class="mb-10 text">{{getError('text')}}</div>

            <div class="mb-10 text">
                {{$t('labels.you_can')}}
                <span @click="$router.back()" class="link">{{$t('labels.go_back')}} </span>
                {{$t('labels.or_go_on')}}
                <nuxt-link class="link" :to="$lang.link('/')">{{$t('labels.home_page')}} </nuxt-link>
                {{$t('labels.site')}}.
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['error'],
        methods: {
            getError(item) {
                let error = this.$t('boxes.http_errors.' + this.error.statusCode + '.' + item);

                return error !== '' ? error : this.$t('boxes.http_errors.default.' + item);
            }
        },
        head() {
            return {
                title: this.error.statusCode + ' ' + this.getError('title')
            }
        }
    }
</script>