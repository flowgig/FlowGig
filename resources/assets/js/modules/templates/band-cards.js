var quark = require('quark-gui');
var card = quark.organisms.cards.card;
var listMenu = quark.organisms.menus.listMenu;
console.log(listMenu);


module.exports =
    card({
        id: 'card2',
        title: 'Primary card',
        theme: 'primary',
        content: listMenu({
            id: 'card-list-menu2',
            hover: true,
            listItems: [
                {
                    title: 'List item with subtitle',
                    subTitle: 'This is a subtitle',
                },
                {
                    title: 'List item without subtitle',
                },
                {
                    title: 'List item with link and subtitle',
                    subTitle: 'This is a subtitle',
                    link: '#'
                },
                {
                    title: 'List item with link',
                    link: '#'
                },
            ]
        })

    })
