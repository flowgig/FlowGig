(function() {
	if( sessionStorage.foutFontsLoaded ) {
		document.documentElement.className += " fonts-loaded";
		return;
	}
	
	var FontFaceObserver = require('fontfaceobserver');
	var fontObservers = []; 
	var fontFamilies = { 
		'Lato': [ 
		{ weight: 'normal' }, 
		{ weight: 'bold' } 
		], 
		'FontAwesome': [ 
		{ weight: 'normal' } 
		] 
	} 
	Object.keys(fontFamilies).forEach(function(family) { 
		fontObservers.push(
			fontFamilies[family].map(function(config) {
				return new FontFaceObserver(family, config).load()
			})
			); 
	}); 

	Promise.all(fontObservers).then(function() { 
		document.documentElement.className += " fonts-loaded";

		sessionStorage.foutFontsLoaded = true;
	});
})();


import IndexPage from './modules/04-pages/index';
import GlobalPage from './modules/04-pages/global';
import AtomsPage from './modules/04-pages/atoms';
import MoleculesPage from './modules/04-pages/molecules';
import OrganismsPage from './modules/04-pages/organisms';

var pages = {
	'index': IndexPage,
	'global': GlobalPage,
	'atoms': AtomsPage,
	'molecules': MoleculesPage,
	'organisms': OrganismsPage
}

var app = document.getElementById('app');
app.innerHTML = IndexPage();


function initModuleTargetUrls(){
	var pageLinks = document.getElementsByClassName('loadPage') !== undefined ? document.getElementsByClassName('loadPage') : false;
	if (pageLinks){
		for (var i = 0; i < pageLinks.length; i++) {
			pageLinks[i].addEventListener('click', (event) => {
				event.preventDefault();
				var targetPage = event.target.getAttribute('data-module-target');
				if (targetPage == null){
					targetPage = event.target.parentNode.getAttribute('data-module-target');
				}
				if (targetPage !== null){
					document.getElementById('mainContent').innerHTML = pages[targetPage];
					var event = new CustomEvent("module-lazy-loaded", { "detail": "One or more modules has been lazy loaded" });
					document.dispatchEvent(event);
				}
			});
		}
	}
}


document.addEventListener('DOMContentLoaded', function() {
	initModuleTargetUrls();

	var overlayElements = document.getElementsByClassName('overlay-element') !== undefined ? document.getElementsByClassName('overlay-element') : false;
	if (overlayElements){
		for (var i = 0; i < overlayElements.length; i++) {
			var overlayElement = overlayElements[i];

			document.onclick = function(event){
				for (var i = 0; i < overlayElements.length; i++) {
					overlayElements[i].classList.remove('active');
				}
				var thisNodeClassList = event.target.classList !== undefined ? event.target.classList : false;
				var parentNodeClassList = event.target.parentNode !== null && event.target.parentNode.classList !== undefined ? event.target.parentNode.classList : false;
				if (thisNodeClassList){
					thisNodeClassList.forEach(function (className){
						if (className == 'overlay-element') thisNodeClassList.add('active');
					});
				}
				if (parentNodeClassList){
					parentNodeClassList.forEach(function (className){
						if (className == 'overlay-element') parentNodeClassList.add('active');
					});
				}
			}
		}
	}
}, false);


if(DEVELOPMENT) {
	if(module.hot) {
		module.hot.accept();
	}
}

