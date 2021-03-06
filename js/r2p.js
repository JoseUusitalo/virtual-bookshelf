/**
 * Common global variable explicitly defined to shut up JSLint.
 */
var sessionStorage;
/**
 * Sets data into sessionStorage key-value map.
 * @param {string} data key
 * @param {*} data value
 * @author Jose
 */

function putIntoSessionStorage(key, value) {
    'use strict';
    // Check for sessionStorage availability.
    if('undefined' !== typeof(sessionStorage)) {
        // Concatenate the key into an empty String in case something other than String was given.
        var empty = "";
        var keyString = empty.concat(key);
        // Stringify the value.
        // Set into sessionStorage.
        sessionStorage.setItem(keyString, value);
        if(sessionStorage.getItem(keyString) !== null) {
            // Session storage was set.
            return true;
        }
        // Else: Session storage was not set, fall through and return false.
    }
    return false;
}