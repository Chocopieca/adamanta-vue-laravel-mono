import https from 'https'

export default (context) => {
    context.$axios.defaults.httpsAgent = new https.Agent({ rejectUnauthorized: false })
    context.$axios.defaults.headers.common['Authorization'] = 'Bearer ' +  context.app.$auth.getToken()

    context.$axios.onError(error => {
        const code = parseInt(error.response && error.response.status)

        if(code !== 400 && code !== 422) {
            context.error({statusCode: code})
        }
    });
}
