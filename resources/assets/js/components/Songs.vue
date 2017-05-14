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
                this.songs.forEach(function (song) {
                    let listItem = {
                        title: song.title,
                        subTitle: this.getSubTitle(song),
                        link: this.getLink(song),
                        buttonRow: this.getButtonRow(song),
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
                return '/songs/' + song.id; //TODO get route link
            },
            getButtonRow: function (song) {
                let buttonRow = {
                    buttons: [
                        {
                            iconClass: 'fa fa-pencil',
                            link: '/songs/' + song.id + '/edit' //TODO get route link
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



