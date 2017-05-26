<template>
    <div v-html="htmlContent"></div>
</template>

<script>
    import * as quark from 'quark-gui';

    export default {
        name: 'MainFooter',
        props: ['appVersion'],
        data () {
            return {
                htmlContent: this.createFooterElement()
            }
        },
        methods: {
            createFooterElement: function () {
                var footerElement = quark.Organisms.Global.Footer.getModule({
                    logo: {
                        image: {
                            src: require('../../images/svg/flowgig-logo-gray.svg'),
                            alt: 'quarkGUI logo'
                        },
                        url: '/'
                    },
                    content: `
                        <div class="text-center">
                            <p>FlowGig licensed under <a href="https://github.com/flowgig/flowgig/blob/master/LICENSE">GNU General Public License</a></p>
                            <p><a href="#">About</a> - <a href="#">Developers</a> - <a href="#">Send feedback</a></p>
                            <small>${this.appVersion}</small>
                        </div>
			        `
                });
                return footerElement;
            }
        }
    }
</script>



