<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'Gigs',
        props: ['gigs'],
        data () {
            return {
                htmlContent: ""
            }
        },
        created: function () {
            this.htmlContent = this.createListMenuElement();
        },
        methods: {
            createListMenuElement: function () {
                return quark.Organisms.Menus.ListMenu.getModule({
                    id: 'songs-list',
                    hover: true,
                    raised: true,
                    listItems: this.getListItems()
                });
            },
            getListItems: function () {
                let listItems = [];
                this.gigs.forEach(function (gig) {
                    let listItem = {
                        title: gig.name,
                        subTitle: this.getSubTitle(gig),
                        iconClass: this.getIconClass(gig),
                        link: this.getLink(gig),
                        buttonRow: this.getButtonRow(gig),
                    }
                    listItems.push(listItem);
                }.bind(this));
                return listItems;
            },
            getSubTitle: function (gig) {
                let subTitle = gig.date + ' - ' + gig.venue + ' - ' + gig.location;
                return subTitle;
            },
            getIconClass: function (gig) {
                let iconClass = '';
                if (gig.status !== undefined) {
                    //TODO add title attribute for icons
                    if (gig.status == 'Proposed') {
                        iconClass = 'fa fa-question-circle-o'
                    } //Title: Status: Proposed
                    if (gig.status == 'Settled') {
                        iconClass = 'fa fa-check-circle-o'
                    } //Title: Status: Settled
                    if (gig.status == 'Public') {
                        iconClass = 'fa fa-globe'
                    } //Title: Status: Public
                }
                return iconClass;
            },
            getLink: function (gig) {
                return '/gigs/' + gig.id; //TODO get route link
            },
            getButtonRow: function (gig) {
                let buttonRow = {
                    buttons: [
                        {
                            iconClass: 'fa fa-pencil',
                            link: '/gigs/' + gig.id + '/edit' //TODO get route link
                        },
                        {
                            iconClass: 'fa fa-trash' //TODO add function for delete
                        }
                    ]
                }
                return buttonRow;
            }
        }
    }
</script>



