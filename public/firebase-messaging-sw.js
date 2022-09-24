// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyCOc0Npjilgonw4TZ9ugBfsSd1rc-XDVHM",
    authDomain: "new-project-just-halaldb.firebaseapp.com",
    projectId: "new-project-just-halaldb",
    storageBucket: "new-project-just-halaldb.appspot.com",
    messagingSenderId: "737212133276",
    appId: "1:737212133276:web:626addfbf976dd56b9e259",
    measurementId: "G-TXFJ3XRDZ6"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});
