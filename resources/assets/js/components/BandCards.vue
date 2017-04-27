<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as axios from 'axios';
    import * as quark from 'quark-gui';

    export default {
        name: 'BandCards',
        data () {
            return {
                htmlContent: "",
                bands: []
            }
        },
        created: function () {
            axios.get('/quark').then(
                function (response) {
                    this.bands = response.data;
                    this.bands.forEach(function(band){
                        let gridItems = [];
                        this.bands.forEach(function(band){
                            gridItems.push({
                                sizes: {
                                    phone: 12,
                                    tablet: 6,
                                    tabletLandscape: 4,
                                    screen: 4
                                },
                                content: this.createCardElement(band)
                            });
                        }.bind(this));
                        let gridElement = quark.Molecules.Sections.Grid.getModule({
                            gridItems: gridItems
                        })
                        this.htmlContent = gridElement;
                    }.bind(this))
                }.bind(this)
            );
        },
        methods: {
            createCardElement: function (band) {
                var cardElement = quark.Organisms.Cards.Card.getModule({
                    title: band.name,
                    theme: 'primary',
                    content: quark.Organisms.Menus.ListMenu.getModule({
                        id: 'band-card-list-' + band.id,
                        hover: true,
                        listItems: this.createDummyListItems()
                    })
                });
                return cardElement;
            },
            createDummyListItems: function(){
                var listItems = [
                    {
                        title: 'Songs',
                        iconClass: 'fa fa-music',
                        buttonRow: {
                            id: 'list-menu-button-row1',
                            buttons: [
                                {
                                    id: 'list-menu-buttonrow-button1',
                                    iconClass: 'fa fa-home'
                                },
                                {
                                    id: 'list-menu-buttonrow-button2',
                                    iconClass: 'fa fa-cog'
                                },
                                {
                                    id: 'list-menu-buttonrow-button3',
                                    iconClass: 'fa fa-list'
                                }
                            ]
                        }
                    },
                    {
                        title: 'Gigs',
                        iconClass: 'fa fa-calendar'
                    },
                    {
                        title: 'Members',
                        iconClass: 'fa fa-group'
                    }
                ];
                return listItems;
            }
        }
    }
</script>



