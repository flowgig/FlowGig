<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'MainNavigation',
        data () {
            return {
                htmlContent: "",
                header: {
                    id: 'main-header',
                    theme: 'dark',
                    logo: {
                        image: {
                            src: require('../../images/svg/flowgig-logo-white.svg'),
                            alt: 'FlowGig logo'
                        },
                        url: "/"
                    },
                    primaryNavigation: {
                        id: "primary-navigation",
                        listItems: [
                            {
                                name: "Link",
                                link: "#"
                            },
                            {
                                name: "Dropdown",
                                link: "#",
                                dropdownContent: {
                                    listItems: [
                                        {
                                            name: "Songs",
                                            link: "#",
                                            iconClass: "fa fa-music"
                                        },
                                        {
                                            name: "Gigs",
                                            link: "#",
                                            iconClass: "fa fa-calendar"
                                        },
                                        {
                                            name: "Members",
                                            link: "#",
                                            iconClass: "fa fa-group"
                                        }
                                    ]
                                }

                            }
                        ]
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
                }
            }
        },
        created: function () {
            this.htmlContent = quark.Organisms.Global.Header.getModule(this.header);
        }
    }
</script>



