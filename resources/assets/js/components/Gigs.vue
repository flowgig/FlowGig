<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'Gigs',
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
                        title: 'Lunch Gig',
                        subTitle: '2017-10-28 - Johnny Walk Concert House - Morrisburgh',
                        iconClass: 'fa fa-globe',
                        link: "#",
                        buttonRow: {
                            buttons: [
                                {
                                    iconClass: 'fa fa-pencil'
                                },
                                {
                                    iconClass: 'fa fa-trash'
                                }
                            ]
                        }
                    },
                    {
                        title: 'Student event',
                        subTitle: '2017-08-19 - Wisozk Lodge Stadium - North Lonport',
                        iconClass: 'fa fa-check-circle-o',
                        link: "#",
                        buttonRow: {
                            buttons: [
                                {
                                    iconClass: 'fa fa-pencil'
                                },
                                {
                                    iconClass: 'fa fa-trash'
                                }
                            ]
                        }
                    },
                    {
                        title: 'Summer Music Fest',
                        subTitle: '2012-12-06 - Shanel Alley Park - Leannonchester',
                        iconClass: 'fa fa-question-circle-o',
                        link: "#",
                        buttonRow: {
                            buttons: [
                                {
                                    iconClass: 'fa fa-pencil'
                                },
                                {
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



