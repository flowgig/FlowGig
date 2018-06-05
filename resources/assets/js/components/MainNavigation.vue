<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'MainNavigation',
        props: ['currentBand', 'currentUser', 'availableBands'],
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
                primaryNavigationLeft: {
                    id: "primary-navigation-left",
                    listItems: []
                },
                primaryNavigationRight: {
                    id: "primary-navigation-right",
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

                let bandNavigation = [
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

                let listItemBand = {
                    name: this.currentBand.name,
                    iconClass: "fa fa-group",
                    responsive: {
                        showIcon: true,
                        showText: false
                    },
                    dropdownContent: {
                        listItems: []
                    }
                };

                this.availableBands.forEach((availableBand) => {
                    listItemBand.dropdownContent.listItems.push({
                        name: availableBand.name,
                        link: "/bands/" + availableBand.id
                    })
                });

                header.primaryNavigationRight.listItems.push(listItemBand);
                header.sidebar.sidebarNavigation.listItems = bandNavigation;
            }

            if (this.currentUser !== undefined) {
                let listItemUser = {
                    name: '',//this.currentUser.name,
                    iconClass: "fa fa-user",
                    responsive: {
                        showIcon: true,
                        showText: false
                    },
                    dropdownContent: {
                        listItems: [
                            {
                                name: "Dashboard",
                                link: "/",
                                iconClass: "fa fa fa-dashboard"
                            },
                            {
                                name: "My account",
                                link: "/account",
                                iconClass: "fa fa-user"
                            },
                            {
                                name: "Log out",
                                link: "#",
                                iconClass: "fa fa-sign-out"
                            }
                        ]
                    }
                };
                header.primaryNavigationRight.listItems.push(listItemUser);
            }

            this.header = header;
            this.htmlContent = quark.Organisms.Global.Header.getModule(this.header);
        }
    }
</script>



