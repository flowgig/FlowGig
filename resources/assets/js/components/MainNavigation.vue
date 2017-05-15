<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'MainNavigation',
        props: ['currentBand', 'currentUser'],
        data () {
            return {
                htmlContent: "",
                header: {}
            }
        },
        created: function () {
            let header = {
                id: 'main-header',
                theme: 'dark',
                logo: {
                    image: {
                        src: require('../../images/svg/flowgig-beta-logo-white.svg'),
                        alt: 'FlowGig logo'
                    },
                    url: "/dashboard"
                },
                primaryNavigation: {
                    id: "primary-navigation",
                    listItems: []
                },
                sidebar: {
                    sidebarNavigation: {
                        listItems: [
                            {
                                name: "About",
                                link: "",
                                iconClass: "fa fa-info-circle"
                            },
                            {
                                name: "Developers",
                                link: "",
                                iconClass: "fa fa-code"
                            },
                            {
                                name: "Send feedback",
                                link: "",
                                iconClass: "fa fa-comment"
                            }
                        ]
                    }
                }
            };
            if (this.currentBand !== undefined) {
                let listItemBand = {
                    name: this.currentBand.name,
                    dropdownContent: {
                        listItems: [
                            {
                                name: "Songs",
                                link: "/bands/" + this.currentBand.id + "/songs",
                                iconClass: "fa fa-music"
                            },
                            {
                                name: "Gigs",
                                link: "/bands/" + this.currentBand.id + "/gigs",
                                iconClass: "fa fa-calendar"
                            },
                            {
                                name: "Members",
                                link: "/bands/" + this.currentBand.id + "/band-memberships",
                                iconClass: "fa fa-group"
                            }
                        ]
                    }
                };
                header.primaryNavigation.listItems.push(listItemBand);
            }
            this.header = header;
            this.htmlContent = quark.Organisms.Global.Header.getModule(this.header);
        }
    }
</script>



