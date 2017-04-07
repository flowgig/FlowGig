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
                            alt: 'quarkGUI logo'
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
                                            name: "Button row",
                                            link: "#"
                                        },
                                        {
                                            name: "Checkbox",
                                            link: "#"
                                        },
                                        {
                                            name: "Radio button",
                                            link: "#"
                                        },
                                        {
                                            name: "Input fied",
                                            link: "#"
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
                                    name: "Global",
                                    link: "",
                                    moduleLink: "global"
                                },
                                {
                                    name: "Atoms",
                                    link: "",
                                    moduleLink: "atoms"
                                },
                                {
                                    name: "Molecules",
                                    link: "",
                                    moduleLink: "molecules"
                                }, {
                                    name: "Organisms",
                                    link: "",
                                    moduleLink: "organisms"
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



