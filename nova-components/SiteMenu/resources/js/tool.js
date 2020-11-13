Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'site-menu',
            path: '/settings/site-menu',
            component: require('./components/Tool'),
        },
    ])
})
