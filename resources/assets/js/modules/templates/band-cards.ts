import * as quark from 'quark-gui';
let axios: any = require('axios');

let Card = quark.Modules.Organisms.Cards.Card;
let ListMenu = quark.Modules.Organisms.Menus.ListMenu;
let Grid = quark.Modules.Molecules.Sections.Grid;

var kort1 = quark.Modules.Organisms.Cards.Card.getModule({
    theme: "primary",
    title: "kortetstittel",
    content: ListMenu.getModule({id: "liste1", hover: true})
});
function createListItems(band){
    var listItems = [
        {
            title: 'Songs',
            buttonRow: {
                id: 'list-menu-button-row1',
                buttons: [
                    {
                        id: 'list-menu-buttonrow-button1',
                        iconClass: 'fa fa-home'
                    },
                    {
                        id: 'list-menu-buttonrow-button2',
                        iconClass: 'fa fa-cog'
                    },
                    {
                        id: 'list-menu-buttonrow-button3',
                        iconClass: 'fa fa-list'
                    }
                ]
            }
        },
        {
            title: 'Gigs'
        },
        {
            title: 'Members'
        }
    ];
    return listItems;
}

function createCardElement(band) {
    var cardElement = Card.getModule({
        title: band.name,
        theme: 'primary',
        content: ListMenu.getModule({
            id: 'band-card-list-' + band.id,
            hover: true,
            listItems: createListItems(band)
        })
    });
    return cardElement;
}

function createGridElement(bands) {
    var gridItems = [];
    bands.forEach(function(band){
        gridItems.push({
            sizes: {
                xs: 12,
                sm: 6,
                md: 4,
                lg: 4
            },
            content: createCardElement(band)
        });
    });
    var gridElement = Grid.getModule({
        gridItems: gridItems
    })
    return gridElement;
}

function getCards(containerId) {
    let containerElementIsDefined: boolean = document.getElementById(containerId) !== null;
    if (containerElementIsDefined) {
        let containerElement = document.getElementById(containerId);
        axios.get('/quark').then(
            function (response) {
                var bands = response.data;
                var gridElement = createGridElement(bands);

                containerElement.innerHTML = gridElement;
            }
        )
    }
}

export default function (containerId) {
    return getCards(containerId);
}

