window._ = require("lodash");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

// window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpsRequest";
window.axios.defaults.headers.common["Accept"] = "application/json";
window.axios.defaults.headers.common["Content-Type"] = "application/json";
// window.axios.defaults.headers.common["X-Auth-Token"] =
//     document.head.querySelector("meta[name=x-token]").content;
window.axios.defaults.baseURL = "api/bigcommerce/";
window.axios.defaults.headers.common["Access-Control-Allow-Origin"] = "*";

window.baseUrl = document.head.querySelector("meta[name=base-url]").content;
window.appName = document.head.querySelector("meta[name=app-name]").content;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
