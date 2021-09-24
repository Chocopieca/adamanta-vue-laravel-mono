'use strict';

let back = 'http://adamanta.local/'
let base = 'http://adamanta.local/'

export default {
    baseUrl: base,
    backUrl: back,
    assetUrl: base + 'storage/',
    appBase: 'http://172.20.0.7:1780/',
    apiUrl: base + 'api/',
    axiosBaseUrl: 'http://webserver/api/',

    debug: false,

    googleAnalytics: {
      id: 'UA-154954790-1',
      customResourceURL: 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
      debug: {sendHitTask: true},
      dev: true
    },

    recaptchaKey: '6Lc9xL0UAAAAANr5jPE04dT-Ae8w5KvuctRMpiVZ',
    recaptchaEnabled: true
}
