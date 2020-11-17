export default async function (context) {
    if (process.server) {
        let lang = ''
        let math = context.params.pathMatch

        if (math !== undefined && math.length === 2) {
            context.route.params = {lang: math, pathMatch: ''}
        }

        lang = context.route.params.lang || context.app.$lang.getCurrentCode()

        // Set lang and call batch
        context.$axios.defaults.headers.common['Language'] = lang

        await context.$axios.get('batch/get')
          .then((res) => {
              context.app.$lang.set(lang)
              for (let key in res.data) {
                  context.store.dispatch('setBatch', {state: key, data: res.data[key]})
              }

              // Check if not enabled localization
              if(context.route.params.lang && !context.store.getters['settings']['localizationEnabled']) {
                  return context.redirect('/404')
              }
          })
          .catch((err) => {
              return context.redirect('/404')
          })
    }
}
