import axios from 'axios';
import { notify } from "@kyvg/vue3-notification";


// Request interceptor
axios.interceptors.request.use(request => {
    // axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    // axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;
    return request
})

// Response interceptor
axios.interceptors.response.use(response => response, error => {
    if (error.response) {
        // The request was made and the server responded with a status code
        // that falls out of the range of 2xx
        // console.log(error.response.data);
        // console.log(error.response.status);
        // console.log(error.response.headers);
        notify({
            type: 'error',
            title: error.response.status || '',
            text: error.response.data.message || error.message,
        });
    // } else if (error.request) {
    //     // The request was made but no response was received
    //     // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
    //     // http.ClientRequest in node.js
    //     console.log(error.request);
    } else {
        // Something happened in setting up the request that triggered an Error
        notify({
            type: 'error',
            title: 'Error',
            text: error.message
        });
    }

    return Promise.reject(error)
})
