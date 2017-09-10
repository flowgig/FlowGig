<script>
    import * as quark from 'quark-gui';
    import * as dragula from 'dragula';
    import SetlistTemplate from './SetlistTemplate.quark';
    import SetlistSong from "../list-items/SetlistSong";

    export default {
        name: 'Setlist',
        props: ['setlist', 'repertoire', 'formData'],
        template: SetlistTemplate,
        data () {
            return {
                htmlContent: "",
                modalHtmlContent: "",
                csrfToken: "",
                newSong: {},
                setlistSongModalButtons: {}
            }
        },
        created: function () {
           // this.modalHtmlContent = this.createRepertoireModalElement();
        },
        mounted: function () {
           // this.htmlContent = this.createListElement();

         /*   var self = this;
            var from = null;
            var drake = dragula([document.querySelector('#songs-list')]);
            drake.on('drag', function (element, source) {
                var index = [].indexOf.call(element.parentNode.children, element);
                console.log('drag from', index, element, source);
                from = index;
            })
            drake.on('drop', function (element, target, source, sibling) {
                var index = [].indexOf.call(element.parentNode.children, element)
                console.log('drop to', index, element, target, source, sibling);
                self.setlist.setlist_songs.splice(index, 0, self.setlist.setlist_songs.splice(from, 1)[0]);

                this.updateNumberInListForAllSetlistSongs();
            }.bind(this))*/

        },
        components: {
            //'SetlistSong': () => import('../list-items/SetlistSong.vue')
            SetlistSong
        },
        events: {
            'reordered': function (reorderedList) {
                this.reOrderSetlistSongs(reorderedList);
            }
        },
      /*  methods: {
            createListElement: function () {
                return quark.Organisms.Menus.ListMenu.getModule({
                    id: 'songs-list',
                    hover: true,
                    listItems: this.createListItems()
                });
            },
            createListItems: function () {
                var listItems = [];
                this.setlist.setlist_songs.forEach(function (setlistSong) {

                    let modalButton = this.setlistSongModalButtons[setlistSong.id];

                    var listItem = {
                        id: 'setlist-' + this.setlist.id + '-song-' + setlistSong.song.id,
                        title: setlistSong.song.title,
                        buttonRow: {
                            buttons: [
                                {
                                    iconClass: 'fa fa-minus',
                                    type: 'minimal'
                                }
                            ],
                            buttonElements: [
                                modalButton
                            ]
                        }
                    }
                    listItems.push(listItem);
                }.bind(this));
                return listItems;
            },
            updateNumberInListForAllSetlistSongs: function () {
                this.setlist.setlist_songs.forEach(function (setlistSong, index) {
                    setlistSong.number_in_list = index + 1;
                })
            },
            createRepertoireListElement: function () {
                return quark.Organisms.Menus.ListMenu.getModule({
                    id: 'repertoire-list',
                    hover: true,
                    listItems: this.createRepertoireListItems()
                });
            },
            createRepertoireListItems: function () {
                var listItems = [];
                this.repertoire.forEach(function (repertoireSong) {
                    var listItem = {
                        id: 'repertoire-' + this.setlist.id + '-song-' + repertoireSong.id,
                        title: repertoireSong.title,
                        buttonRow: {
                            buttons: [
                                {
                                    iconClass: 'fa fa-plus'
                                }
                            ]
                        }
                    }
                    listItems.push(listItem);
                }.bind(this));
                return listItems;
            },
            createRepertoireModalElement: function () {
                return quark.Molecules.Messaging.Modal.getModule({
                    id: 'repertoire-modal',
                    triggerElement: quark.Atoms.Buttons.Button.getModule({
                        content: "Add song",
                        theme: "primary"
                    }),
                    modalElement: {
                        title: 'Repertoire',
                        content: this.createRepertoireListElement(),
                        scrollable: true
                    }
                });
            },
            createSetlistSongModalElement: function () {
                return quark.Molecules.Messaging.Modal.getModule({
                    id: 'setlist-song-modal-' + this.formData.savedValues.id,
                    triggerElement: quark.Atoms.Buttons.Button.getModule({
                        content: "Edit song",
                        theme: "primary"
                    }),
                    modalElement: {
                        title: 'Setlist song',
                        content: this.createModalContent(),
                        scrollable: true
                    }
                });
            },

        }*/
    }
</script>