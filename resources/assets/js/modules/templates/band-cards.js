var quark = require('quark-gui');
var axios = require('axios');
var grid = quark.molecules.sections.grid;
var card = quark.organisms.cards.card;
var listMenu = quark.organisms.menus.listMenu;

function createListItems(band){
    var listItems = [
        {
            title: 'Songs'
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
    var cardElement = card({
        id: 'band-card-' + band.id,
        title: band.name,
        theme: 'primary',
        content: listMenu({
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
    var gridElement = grid({
        gridItems: gridItems
    })
    return gridElement;
}

function getCards(containerId) {
    var containerElement = document.getElementById(containerId) !== null ? document.getElementById(containerId) : false;

    axios.get('/quark').then(
        function (response) {
            var bands = response.data;
            var gridElement = createGridElement(bands);

            containerElement.innerHTML = gridElement;
        }
    )
}

export default function (containerId) {
    return getCards(containerId);
}

