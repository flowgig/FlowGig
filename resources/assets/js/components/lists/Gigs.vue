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
                htmlContent: "",
                csrfToken: window.Laravel.csrfToken
            }
        },
        created: function () {
            this.htmlContent = this.createListMenuElement();
        },
        methods: {
            createListMenuElement: function () {
                return quark.Organisms.Menus.ListMenu.getModule({
                    id: 'songs-list',
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
                        hiddenButtonRow: true
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
                return '/gigs/' + gig.id;
            },
            getButtonRow: function (gig) {
                let buttonRow = {
                    buttons: [
                        {
                            iconClass: 'fa fa-pencil',
                            link: '/gigs/' + gig.id + '/edit',
                            type: 'minimal',
                            theme: 'primary'
                        },
                        {
                            iconClass: 'fa fa-trash',
                            submit: true,
                            type: 'minimal',
                            theme: 'primary',
                            formWrapper: {
                                formAction: '/gigs/' + gig.id,
                                formMethod: 'POST',
                                hiddenFields: [
                                    {
                                        name: '_token',
                                        value: this.csrfToken
                                    },
                                    {
                                        name: '_method',
                                        value: 'DELETE'
                                    }
                                ]
                            }
                        }
                    ]
                }
                return buttonRow;
            }
        }
    }
</script>



