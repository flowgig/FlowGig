import * as quark from "quark-gui";
let axios: any = require('axios');
let Card = quark.Organisms.Cards.Card;
let ListMenu = quark.Organisms.Menus.ListMenu;
let Grid = quark.Molecules.Sections.Grid;

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
    let gridItems: quark.Molecules.Sections.Grid.IGridItem[] = [];
    bands.forEach(function(band){
        gridItems.push({
            sizes: {
                phone: 12,
                tablet: 6,
                tabletLandscape: 4,
                screen: 4
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