Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'access-tabs',
            path: '/access/tabs',
            component: require('./components/Tabs'),
        },
        {
            name: 'access-actions',
            path: '/access/actions',
            component: require('./components/Actions'),
        },
    ])
})
