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
                header: {},
                gravatarImageSrc: 'https://www.gravatar.com/avatar/' + this.currentUser.gravatarId + '?s=190&d=robohash'
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
                let profileImageElement = `<div class="main-navigation-profile-image"><img src="${this.gravatarImageSrc}"/></div>`;
                let listItemUser = {
                    name: '',//this.currentUser.name,
                    iconElement: profileImageElement,
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

<style>
    .main-navigation-profile-image{
        display: inline-block;
        background: azure;
        border-radius: 50%;
        border-bottom: 0;
        padding: 0px;
        margin: 6px 0;
        overflow: hidden;
        height: 44px;
        width: 44px;
    }
    .main-navigation-profile-image img{
        height: 44px;
    }
</style>

