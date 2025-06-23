// firebase-messaging.js
import { initializeApp } from "firebase/app";
import { getMessaging, getToken, onMessage } from "firebase/messaging";

const firebaseConfig = {
    apiKey: "AIzaSyB_46uxICKSYynLSUgh1dP3iPsTYD4v2p4",
    authDomain: "nksproject-38a44.firebaseapp.com",
    projectId: "nksproject-38a44",
    storageBucket: "nksproject-38a44.firebasestorage.app",
    messagingSenderId: "264291660789",
    appId: "1:264291660789:web:9a9543be8a7204775d26bc"
};

const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

// Lấy token
getToken(messaging, {
    vapidKey: 'BIo-DIdoqLQaxrca8WWUBKN0b_g4Vql6IbzBJUnMA4igs2XmGzLeeAxEaA3ZVZX1wg4X8oCcnUE0cD8uzv4Q9ik'
})
    .then((currentToken) => {
        if (currentToken) {
            console.log('FCM Token:', currentToken);

            // Gửi token lên server hoặc lưu vào form
            document.getElementById('fbtoken').value = currentToken;

            // Store token in localStorage
            localStorage.setItem('fcm_token', currentToken);

            // Send to your server
            sendTokenToServer(currentToken);

        } else {
            console.log('No registration token available. Request permission to generate one.');
            requestNotificationPermission();
        }
    })
    .catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
    });

// Request notification permission
function requestNotificationPermission() {
    console.log('Requesting permission...');
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log('Notification permission granted.');

            // Try to get token again after permission granted
            getToken(messaging, {
                vapidKey: 'BIo-DIdoqLQaxrca8WWUBKN0b_g4Vql6IbzBJUnMA4igs2XmGzLeeAxEaA3ZVZX1wg4X8oCcnUE0cD8uzv4Q9ik'
            })
                .then((currentToken) => {
                    if (currentToken) {
                        console.log('FCM Token after permission:', currentToken);
                        document.getElementById('fbtoken').value = currentToken;
                        sendTokenToServer(currentToken);
                    }
                });
        } else {
            console.log('Unable to get permission to notify.');
        }
    });
}

// Send token to server
function sendTokenToServer(token) {
    // Example: Send to your Laravel backend
    fetch('/api/store-fcm-token', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            fcm_token: token,
            device: getDeviceInfo(),
            timestamp: new Date().toISOString()
        })
    })
        .then(response => response.json())
        .then(data => {
            console.log('Token sent to server:', data);
        })
        .catch(error => {
            console.error('Error sending token to server:', error);
        });
}

// Handle incoming messages (foreground)
onMessage(messaging, (payload) => {
    console.log('Message received in foreground:', payload);

    // Display notification manually for foreground messages
    if (payload.notification) {
        new Notification(payload.notification.title, {
            body: payload.notification.body,
            icon: payload.notification.icon || '/favicon.ico'
        });
    }
});

// Get device info
function getDeviceInfo() {
    const ua = navigator.userAgent;
    if (/iPhone|iPad|iPod/i.test(ua)) return 'iOS';
    if (/Android/i.test(ua)) return 'Android';
    if (/Windows/i.test(ua)) return 'Windows';
    if (/Mac/i.test(ua)) return 'Mac';
    return 'Web';
}

// Export functions for global use
window.firebaseMessaging = {
    getToken: () => getToken(messaging, {
        vapidKey: 'BIo-DIdoqLQaxrca8WWUBKN0b_g4Vql6IbzBJUnMA4igs2XmGzLeeAxEaA3ZVZX1wg4X8oCcnUE0cD8uzv4Q9ik'
    }),
    requestPermission: requestNotificationPermission,
    sendToServer: sendTokenToServer
};
