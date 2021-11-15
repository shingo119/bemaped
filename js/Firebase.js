// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.2.0/firebase-app.js";
import { getDatabase, ref, push, onChildAdded, remove, onChildRemoved }
    from "https://www.gstatic.com/firebasejs/9.2.0/firebase-database.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// FirebaseAuthのログイン機能の使える関数インポート
import { getAuth, signInAnonymously } from "https://www.gstatic.com/firebasejs/9.2.0/firebase-auth.js";

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyA0eX9ZgNNl8xyphlBITklE8cw2KtLdreg",
    authDomain: "sample-412b8.firebaseapp.com",
    //databaseURL: "https://sample-412b8-default-rtdb.firebaseio.com",
    projectId: "sample-412b8",
    storageBucket: "sample-412b8.appspot.com",
    messagingSenderId: "278552571035",
    appId: "1:278552571035:web:8517296195d194fb6b6a3e"
};


// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getDatabase(app);
const dbRef = ref(db, "Youtube-info");

const auth = getAuth();
signInAnonymously(auth)
    .then(() => {
        // Signed in..
    })
    .catch((error) => {
        const errorCode = error.code;
        const errorMessage = error.message;
        // ...
    });