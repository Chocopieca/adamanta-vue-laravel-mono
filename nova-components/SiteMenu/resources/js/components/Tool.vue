<template>

    <div>
        <heading class="mb-6">Управление Меню</heading>

        <sl-vue-tree v-model="nodes" @nodeclick="nodeClick">

            <template slot="toggle" slot-scope="{ node }">
          <span v-if="!node.isLeaf">
            <icon name="caret-right" v-if="!node.isExpanded"></icon>
            <icon name="caret-down"  v-if="node.isExpanded"></icon>
          </span>
            </template>

            <template slot="title" slot-scope="{ node }">
                <icon name="file" v-if="node.isLeaf"></icon> {{ node.title }} </template>

            <template slot="sidebar" slot-scope="{ node }">
                <icon name="circle" v-if="node.data.isModified"></icon>
            </template>
        </sl-vue-tree>
    </div>
</template>

<script>
    import slVueTree from 'sl-vue-tree';
    import 'sl-vue-tree/dist/sl-vue-tree-dark.css';

    Nova.booting(function(Vue, router){
        Vue.use(slVueTree);
    });

    export default {
        data(){
            return{
                nodes: [
                    {title: 'Item1', isLeaf: true},
                    {title: 'Item2', isLeaf: true, data: { visible: false }},
                    {title: 'Folder1'},
                    {
                        title: 'Folder2', isExpanded: true, children: [
                            {title: 'Item3', isLeaf: true},
                            {title: 'Item4', isLeaf: true}
                        ]
                    }
                ]
            }
        },
        methods: {
            nodeClick(node) {
                console.log(node);
            }
        }

    }
</script>

<style>
/* Scoped Styles */
</style>
