





/*

Give the service worker access to Firebase Messaging.

Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.

*/

importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');

importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

   

/*

Initialize the Firebase app in the service worker by passing in the messagingSenderId.

* New configuration for app@pulseservice.com

*/

firebase.initializeApp({

         apiKey: "AIzaSyAMczrP_QPh_5JO-HbHCvKRltwdGfHPogI",
    authDomain: "notification-7e13e.firebaseapp.com",
    projectId: "notification-7e13e",
    storageBucket: "notification-7e13e.appspot.com",
    messagingSenderId: "77578544940",
    appId: "1:77578544940:web:d82a5cb49942c54ba0ae89",
    measurementId: "G-458EL6W8GS"

    });

  

/*

Retrieve an instance of Firebase Messaging so that it can handle background messages.

*/

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {

    console.log(

        "[firebase-messaging-sw.js] Received background message ",

        payload,

    );

    /* Customize notification here */

    const notificationTitle = "Background Message Title";

    const notificationOptions = {

        body: "Background Message body.",

        icon: "/itwonders-web-logo.png",

    };

  

    return self.registration.showNotification(

        notificationTitle,

        notificationOptions,

    );

});