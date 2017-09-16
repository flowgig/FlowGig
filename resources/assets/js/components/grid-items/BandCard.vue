<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'BandCard',
        props: ['band', 'counter'],
        template: '<div v-html="gridElement"></div>',
        computed: {
            gridElement: function () {
                return quark.Atoms.Sections.GridItem.getModule({
                    sizes: {
                        phone: 12,
                        tablet: 6,
                        tabletLandscape: 6,
                        screen: 6
                    },
                    content: this.getCardElement()
                });
            }
        },
        methods: {
            getCardElement: function () {
                return quark.Organisms.Cards.Card.getModule({
                    title: this.band.name,
                    theme: 'primary',
                    content: quark.Organisms.Lists.List.getModule({
                        id: 'band-card-list-' + this.band.id,
                        listItems: this.getListItems()
                    })
                });
            },
            getListItems: function () {
                return [
                    {
                        title: 'Songs',
                        iconClass: 'fa fa-music',
                        link: '/bands/' + this.band.id + '/songs',
                        buttonRow: {
                            buttonElements: ["<span class='list-item-counter'>" + this.counter.songs + "</span>"]
                        }
                    },
                    {
                        title: 'Gigs',
                        iconClass: 'fa fa-calendar',
                        link: '/bands/' + this.band.id + '/gigs',
                        buttonRow: {
                            buttonElements: ["<span class='list-item-counter'>" + this.counter.gigs + "</span>"]
                        }
                    },
                    {
                        title: 'Members',
                        iconClass: 'fa fa-group',
                        link: '/bands/' + this.band.id + '/band-memberships',
                        buttonRow: {
                            buttonElements: ["<span class='list-item-counter'>" + this.counter.members + "</span>"]
                        }
                    }
                ];
            }
        }
    }
</script>
