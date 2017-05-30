<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'Songs',
        props: ['songs'],
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
                    hover: true,
                    listItems: this.getListItems()
                });
            },
            getListItems: function () {
                let listItems = [];
                this.songs.forEach(function (song) {
                    let listItem = {
                        title: song.title,
                        subTitle: this.getSubTitle(song),
                        link: this.getLink(song),
                        buttonRow: this.getButtonRow(song),
                        hiddenButtonRow: true
                    }
                    listItems.push(listItem);
                }.bind(this));
                return listItems;
            },
            getSubTitle: function (song) {
                let subTitle = song.artist;
                return subTitle;
            },
            getLink: function (song) {
                return '/songs/' + song.id;
            },
            getButtonRow: function (song) {
                let buttonRow = {
                    buttons: [
                        {
                            iconClass: 'fa fa-pencil',
                            link: '/songs/' + song.id + '/edit',
                            type: 'minimal',
                            theme: 'primary'
                        },
                        {
                            iconClass: 'fa fa-trash',
                            submit: true,
                            type: 'minimal',
                            theme: 'primary',
                            formWrapper: {
                                formAction: '/songs/' + song.id,
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



