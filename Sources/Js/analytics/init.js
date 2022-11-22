/**
 * DO NOT EDIT THIS PAGE WITHOUT CONSULTING WITH ANALYTICS SQUAD
 */
import {injectDomainConnections} from './resourcehints';
import aaConnector from "@netmanagement/aa-connector";
import {getPageTagsForPage} from "./data/page";
import pageTagsData from './tags/pagetags';

const siteConfig = {
    externalScript: process.env.AA_EXTERNAL_SCRIPT,
    fullFunnelQueryParamName: 'sdid',
    globalVariableName: 'oncaAA',
    linkContainersArray: [
        {
            linkContainerName: 'footer',
            linkContainerSelectors: ['footer'],
        },
        {
            linkContainerName: 'header',
            linkContainerSelectors: ['header'],
        },
        {
            linkContainerName: 'toplist',
            linkContainerSelectors: ['.top__five-area', '.game-blocks']
        },
        {
            linkContainerName: 'topNavigation',
            linkContainerSelectors: ['.menu']
        },
        {
            linkContainerName: 'bottomCTA',
            linkContainerSelectors: ['.scroll-top']
        },
        {
            linkContainerName: 'component::freegames',
            linkContainerSelectors: ['.js_gamesContainer', '.game__wrapp']
        },
        {
            linkContainerName: 'component::related-boxes',
            linkContainerSelectors: ['.box-more__container']
        },
        {
            linkContainerName: 'component::progressive-jackpot',
            linkContainerSelectors: ['.jackpot__area']
        }
    ],
    outboundLinkFolder: '/go/',
    pageTagLocalNames: [
        'language',
        'country',
        'mainCategory',
        'subCategories',
        'mainVertical',
        'subVertical',
        'triVertical',
    ],
    transactionIdSiteNumber: '1800',
    userTagLocalNames: [
        'user_mobile',
        'user_tablet',
        'user_continent',
        'user_country',
        'user_state',
        'user_city'
    ],
    interactionIndicatorsArray: ['#', 'javascript', '/img/'],
    breadCrumbsSelector: 'header > .breadcrumbs > .breadcrumbs__list-item',
    debug: (process.env.AA_DEBUG === 'true'),
};

window.oncaAA = window.oncaAA || {};

window.oncaAA = {
    ...pageTagsData.tagDefaults,
    ...window.oncaAA,
    ...getPageTagsForPage(pageTagsData, window.location.pathname)
};

injectDomainConnections();
new aaConnector(siteConfig);
