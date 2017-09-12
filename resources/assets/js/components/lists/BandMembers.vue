<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'BandMembers',
        props: ['bandMembers', 'authUser'],
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
                return quark.Organisms.Lists.List.getModule({
                    id: 'band-members-list',
                    hover: false,
                    listItems: this.getListItems()
                });
            },
            getListItems: function () {
                let listItems = [];
                this.bandMembers.forEach(function (bandMember) {
                    let listItem = {
                        title: bandMember.user.name,
                        buttonRow: this.getButtonRow(bandMember),
                    }
                    listItems.push(listItem);
                }.bind(this));
                return listItems;
            },
            getButtonRow: function (bandMember) {
                let buttonRow = {
                    buttons: [
                        {
                            iconClass: 'fa fa-trash',
                            submit: true //TODO add function for delete
                        }
                    ]
                }
                return buttonRow;
            },
            validateDelete: function (userId) {
                if (this.bandMembers.length == 1) {
                    alert('You are the last member and cannot be removed.\n(You\'ll have to delete the band)');
                    return false;
                }
                else if (userId == this.authUser.id) {
                    return confirm('This completely removes your access to the band {{ $band->name }}')
                }
                return confirm('This removes ' + userName)
            }
        }
    }
</script>



