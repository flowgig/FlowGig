<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'BandCards',
        data () {
            return {
                htmlContent: "",
            }
        },
        props: ['bands'],
        created: function () {
            this.htmlContent = this.getGridElement(this.bands);
        },
        methods: {
            getGridElement: function (bands) {
                let gridItems = [];
                bands.forEach(function (band) {
                    gridItems.push({
                        sizes: {
                            phone: 12,
                            tablet: 6,
                            tabletLandscape: 6,
                            screen: 6
                        },
                        content: this.getCardElement(band)
                    });
                }.bind(this));
                return quark.Molecules.Sections.Grid.getModule({
                    gridItems: gridItems
                });
            },
            getCardElement: function (band) {
                return quark.Organisms.Cards.Card.getModule({
                    title: band.name,
                    theme: 'primary',
                    content: quark.Organisms.Menus.ListMenu.getModule({
                        id: 'band-card-list-' + band.id,
                        hover: true,
                        listItems: this.getListItems(band)
                    })
                });
            },
            getListItems: function (band) {
                return [
                    {
                        title: 'Songs',
                        iconClass: 'fa fa-music',
                        link: '/bands/' + band.id + '/songs'
                    },
                    {
                        title: 'Gigs',
                        iconClass: 'fa fa-calendar',
                        link: '/bands/' + band.id + '/gigs'

                    },
                    {
                        title: 'Members',
                        iconClass: 'fa fa-group',
                        link: '/bands/' + band.id + '/band-memberships'
                    }
                ];
            }
        }
    }
</script>



