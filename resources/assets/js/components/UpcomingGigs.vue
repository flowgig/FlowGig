<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'UpcomingGigs',
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
                    id: 'upcoming-gigs-list',
                    hover: true,
                    listItems: this.createDummyListItems()
                });
            },
            createDummyListItems: function () {
                return [
                    {
                        title: 'Student event with The Wurlitzers',
                        iconClass: 'fa fa-check-circle-o',
                        subTitle: '2017-08-19 - Wisozk Lodge Stadium - North Lonport',
                        link: "#"
                    },
                    {
                        title: 'Lunch Gig with The Wurlitzers',
                        iconClass: 'fa fa-globe',
                        subTitle: '2017-10-28 - Johnny Walk Concert House - Morrisburgh',
                        link: "#"
                    },
                ];
            }
        }
    }
</script>



