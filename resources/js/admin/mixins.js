Nova.booting(function(Vue, router){
    Vue.mixin({
        handleClose: true,
        methods: {
            dialogShow(showName, hideName = false) {
                console.log(showName)

                if(hideName) {
                    this.$root.$emit(hideName + '-dialog', false)
                    this.$root.$emit(showName + '-dialog', true)
                } else {
                    this.$root.$emit(showName + '-dialog', true)
                }
            },
            dialogHide(name) {
                this.$root.$emit(name + '-dialog', false)
            }
        }
    })
});
