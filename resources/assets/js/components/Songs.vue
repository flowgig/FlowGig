<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'Songs',
        data () {
            return {
                htmlContent: ""
            }
        },
        created: function () {
            this.htmlContent = this.createListElement();
        },
        methods: {
            createListElement: function () {
                return quark.Organisms.Menus.ListMenu.getModule({
                    id: 'songs-list',
                    hover: true,
                    listItems: this.createDummyListItems()
                });
            },
            createDummyListItems: function () {
                return [
                    {
                        title: 'CHAPTER II. The',
                        subTitle: 'The User Experience Researchers',
                        link: "#",
                        buttonRow: {
                            id: 'list-menu-button-row1',
                            buttons: [
                                {
                                    id: 'list-menu-buttonrow-button1',
                                    iconClass: 'fa fa-pencil'
                                },
                                {
                                    id: 'list-menu-buttonrow-button2',
                                    iconClass: 'fa fa-trash'
                                }
                            ]
                        }
                    },
                    {
                        title: 'Rabbit actually',
                        subTitle: 'The Molding and Casting Workers',
                        link: "#",
                        buttonRow: {
                            id: 'list-menu-button-row1',
                            buttons: [
                                {
                                    id: 'list-menu-buttonrow-button1',
                                    iconClass: 'fa fa-pencil'
                                },
                                {
                                    id: 'list-menu-buttonrow-button2',
                                    iconClass: 'fa fa-trash'
                                }
                            ]
                        }
                    }
                ];
            }
        }
    }
</script>



