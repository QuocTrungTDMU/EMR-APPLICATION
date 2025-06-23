// firebase-messaging-sw.js
importScripts('https://www.gstatic.com/firebasejs/11.9.1/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/11.9.1/firebase-messaging-compat.js');

const firebaseConfig = {
    apiKey: "AIzaSyB_46uxICKSYynLSUgh1dP3iPsTYD4v2p4",
    authDomain: "nksproject-38a44.firebaseapp.com",
    projectId: "nksproject-38a44",
    storageBucket: "nksproject-38a44.firebasestorage.app",
    messagingSenderId: "264291660789",
    appId: "1:264291660779:web:9a9543be8a7204775d26bc"
};

firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

messaging.onBackgroundMessage((payload) => {
    console.log('Background message:', payload);

    const notificationTitle = payload.notification.title || 'Medik';
    const notificationOptions = {
        body: payload.notification.body || 'New message',
        icon: '/favicon.ico'
    };

    self.registration.showNotification(notificationTitle, notificationOptions);
});
