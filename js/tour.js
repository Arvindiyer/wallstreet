/**
 * Created by Arvind on 25-Mar-16.
 */

/* globals hopscotch: false */
/* ============ */
/* EXAMPLE TOUR */
/* ============ */
var tour = {
        id: 'hello-hopscotch',
        steps: [
            {
                target: 'tnumber',
                title: 'Welcome to Wallstreet!',
                content: 'Hey there! This is an tour to guide you to features of game.This segment shows the balance you have in your account.At stating 1000000.00 Rs is given to you as stock money.',
                placement: 'bottom',
                arrowOffset: 30
            },
            {
                target: 'tgeneral',
                title: 'News Feed',
                content: 'This segment shows the news posted by admin which has effect on rising and falling of prices of stock.E.x Software companies get a gift from govt.',
                placement: 'bottom',
                arrowOffset: 30
            },
            {
                target: 'tmessage',
                title: 'Error/Success',
                content: 'This segment shows the error and success messages of the activities you do.e.x Transaction 20 sold of Udaan at 49.25 Rs',
                placement: 'top',
                arrowOffset: 60
            },
            {
                target: 'titems',
                title: 'Buyers Place',
                content: 'This segment shows all the stock elements with prices and option to buy ,refresh and sell.',
                placement: 'bottom',
                arrowOffset: 30
            },
            {
                target: 'titembuy',
                title: 'Buy/sell stock',
                content: 'A box would open and you need to enter number of share to buy/sell the item at price it is opened at.',
                placement: 'left',
                arrowOffset: 30
            },
            {
                target: 'towned',
                title: 'Owned stock',
                content: 'Table showing stocks owned by you',
                placement: 'bottom',
                arrowOffset: 30
            },
            {
                target: 'tbroker',
                title: 'Broker',
                content: 'You can get a service of broker and news from it at cost of broker commission',
                placement: 'bottom',
                arrowOffset: 30
            },
            {
                target: 'ttransaction',
                title: 'Transaction',
                content: 'All your transaction of buy/sell are listed below',
                placement: 'top',
                arrowOffset: 30
            },
            {
                target: 'tcontact',
                title: 'Contact us',
                content: 'Any query drop a mail at udaan16.it@gmail.com or ping one us at any time contact details visit the below page.',
                placement: 'left',
                arrowOffset: 30
            },
            {
                target: 'trefresh',
                title: 'Important',
                content: 'Keep refreshing page and do use refresh button whenever there as it solve major problems face by you.Thanking @TeamUdann @keycoders',
                placement: 'bottom',
                arrowOffset: 30
            }

            //{
            //    target: document.querySelectorAll('#general-use-desc code')[1],
            //    title: 'Where to begin',
            //    content: 'At the very least, you\'ll need to include these two files in your project to get started.',
            //    placement: 'right',
            //    yOffset: -20
            //},
            //{
            //    target: 'my-first-tour-file',
            //    placement: 'top',
            //    title: 'Define and start your tour',
            //    content: 'Once you have Hopscotch on your page, you\'re ready to start making your tour! The biggest part of your tour definition will probably be the tour steps.'
            //},
            //{
            //    target: 'start-tour',
            //    placement: 'right',
            //    title: 'Starting your tour',
            //    content: 'After you\'ve created your tour, pass it in to the startTour() method to start it.',
            //    yOffset: -25
            //},
            //{
            //    target: 'basic-options',
            //    placement: 'left',
            //    title: 'Basic step options',
            //    content: 'These are the most basic step options: <b>target</b>, <b>title</b>, <b>content</b>, and <b>placement</b>. For some steps, they may be all you need.',
            //    arrowOffset: 100,
            //    yOffset: -80
            //},
            //{
            //    target: 'api-methods',
            //    placement: 'top',
            //    title: 'Hopscotch API methods',
            //    content: 'Control your tour programmatically using these methods.'
            //},
            //{
            //    target: 'tour-example',
            //    placement: 'top',
            //    title: 'This tour\'s code',
            //    content: 'This is the JSON for the current tour! Pretty simple, right?'
            //},
            //{
            //    target: 'hopscotch-title',
            //    placement: 'bottom',
            //    title: 'You\'re all set!',
            //    content: 'Now go and build some great tours!'
            //}
        ],
        showPrevButton: true,
        scrollTopMargin: 100
    },

/* ========== */
/* TOUR SETUP */
/* ========== */
    addClickListener = function (el, fn) {
        if (el.addEventListener) {
            el.addEventListener('click', fn, false);
        }
        else {
            el.attachEvent('onclick', fn);
        }
    },

    init = function () {
        var startBtnId = 'startTourBtn',
            calloutId = 'startTourCallout',
            mgr = hopscotch.getCalloutManager(),
            state = hopscotch.getState();

        if (state && state.indexOf('hello-hopscotch:') === 0) {
            // Already started the tour at some point!
            hopscotch.startTour(tour);
        }
        else {
            // Looking at the page for the first(?) time.

        }

        addClickListener(document.getElementById(startBtnId), function () {
            if (!hopscotch.isActive) {
                mgr.removeAllCallouts();
                hopscotch.startTour(tour);
            }
        });
    };

init();

