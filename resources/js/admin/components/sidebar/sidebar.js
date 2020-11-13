import SidebarMenu from './SidebarMenu';

export default {
    name: 'sidebar',
    data () {
        return {
            config: Nova.config,
            isCollapse: false
        }
    },
    components: {
        SidebarMenu
    },
    computed: {
        getUrlSegments() {
            let pageURL = window.location.href.match(/admin\/(.*)/);
            return pageURL && pageURL[1] ? pageURL[1].split('/') : [];
        }
    },
    methods: {
        getActive(sidebar) {
            let lastURLSegment = this.getUrlSegments;
            let id = 0;
            sidebar.forEach((tab) => {
                if(tab.path === lastURLSegment[0] || (tab.path === lastURLSegment[0] +'/'+ lastURLSegment[1])) {
                    id = tab.id;
                }

                if(tab.children) {
                    let res = this.getActive(tab.children)
                    if(res > 0) {
                        id = res;
                    }
                }
            })

            return id;
        }
    }
}

