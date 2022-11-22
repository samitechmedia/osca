/**
 * DO NOT EDIT THIS PAGE WITHOUT CONSULTING WITH ANALYTICS SQUAD
 */
import { settings } from '../settings';
import  axios from 'axios';

let createAndReturnApiUrl = () => {
    return settings.apiUrl + '&username=' + settings.apiUsername + '&password=' + settings.apiPassword;
};

/**
 * Function to get extraInformation from Mobile Device Detection and Geo Location from CodeLibrary
 * @returns {*}
 */
export let getGeoAndMobileInformation = () => {
    return axios.get(createAndReturnApiUrl()).then(response => response.data);
};

export let getUrlParameter = name => {
    let urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
};

let checkIfMetaTagExists = name => {
    return !!document.querySelector('meta[name=' + name + ']');
};

export let getMetaTag = name => {
    if (checkIfMetaTagExists(name) === true) {
        return document.querySelector('meta[name=' + name + ']').getAttribute('content');
    } else {
        return false;
    }
};

export let getCookie = cname => {
    var name = cname + '=';
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return '';
};

let generateTimestamp = () => {
    return Date.now();
};

let generateRandomNumber = () => {
    return Math.floor(1000000000000 + Math.random() * 900000000000);
};

export let generateTransactionId = () => {
    return settings.transactionIdSiteNumber + generateTimestamp() + generateRandomNumber();
};

export let getTransactionIdQueryString = () => {
    return getUrlParameter(settings.fullfunnelqueryparameter);
};