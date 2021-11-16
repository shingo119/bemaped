// Import the functions you need from the SDKs you need
//###############################################
// 必要なJSを読み込み
//###############################################
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.3.0/firebase-app.js";
import { getDatabase, ref, push, set, onChildAdded, remove, onChildRemoved }from "https://www.gstatic.com/firebasejs/9.3.0/firebase-database.js";
import { getAuth, signInWithPopup, GoogleAuthProvider, signOut, onAuthStateChanged, signInAnonymously } from "https://www.gstatic.com/firebasejs/9.3.0/firebase-auth.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
// Your web app's Firebase configuration

//###############################################
// Your web app's Firebase configuration
//###############################################

const firebaseConfig = {
    apiKey: "AIzaSyA0eX9ZgNNl8xyphlBITklE8cw2KtLdreg",
    authDomain: "sample-412b8.firebaseapp.com",
    databaseURL: "https://sample-412b8-default-rtdb.firebaseio.com",
    projectId: "sample-412b8",
    storageBucket: "sample-412b8.appspot.com",
    messagingSenderId: "278552571035",
    appId: "1:278552571035:web:8517296195d194fb6b6a3e"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

//###############################################
//GoogleAuth用
//###############################################
const provider = new GoogleAuthProvider();
provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
const auth = getAuth();

//###############################################
//Login処理
//###############################################
$("#google").on("click", function () {
    // console.log(this)
    signInWithPopup(auth, provider).then((result) => {
        //Login後のページ遷移
        window.location.href = "index.html";
        console.log(result)

    }).catch((error) => {
        // Handle Errors here.
        const errorCode = error.code;
        const errorMessage = error.message;
        // The email of the user's account used.
        const email = error.email;
        // The AuthCredential type that was used.
        const credential = GoogleAuthProvider.credentialFromError(error);
        // ...
    });
});

//###############################################
// Loginしてる？
//###############################################
onAuthStateChanged(auth, (user) => {
    if (user) {
        // User is signed in, see docs for a list of available properties
        // https://firebase.google.com/docs/reference/js/firebase.User
        const uid = user.uid;
        console.log(uid);
        // const user = auth.currentUser;
        if (user !== null) {
            user.providerData.forEach((profile) => {
                console.log("Sign-in provider: " + profile.providerId);
                console.log("  Provider-specific UID: " + profile.uid);
                console.log("  Name: " + profile.displayName);
                console.log("  Email: " + profile.email);
                console.log("  Photo URL: " + profile.photoURL);
            });
            $('#logout').css('display', 'flex');//ログアウトボタンを表示
            $('#login').css('display', 'none');//ログインボタンを非表示
            
            // uidをローカルストレージへ入れようとしている
            localStorage.setItem("uid", uid);
        }
    } else {
        // _redirect();  // User is signed out
    }
});

//###############################################
//Logout処理
//###############################################
$("#logout").on("click", function () {
    // signInWithRedirect(auth, provider);ß
    signOut(auth).then(() => {
        // Sign-out successful.
        _redirect();
        localStorage.removeItem("uid");
    }).catch((error) => {
        // An error happened.
        console.error(error);
    });
});
//###############################################
//Login画面へ
//###############################################
function _redirect() {
    location.href = "index.html";
}

//###############################################
//匿名認証
//###############################################
// signInAnonymously(auth)
//     .then(() => {
//         // Signed in..
//     })
//     .catch((error) => {
//         const errorCode = error.code;
//         const errorMessage = error.message;
//         // ...
//     });



const db = getDatabase(app);
const dbRef = ref(db, "Youtube-info");

$(document).on("click", "#submit", function () {
    const movieTitle = document.querySelector("#movie-title").value;
    const movieUrl = document.querySelector("#movie-url").value;
    const tag = document.querySelector("#tag").value;
    const ifram = document.querySelector("#ifram").value;
    const lat = sessionStorage.getItem('lat');
    const lon = sessionStorage.getItem('lon');
    const uid = localStorage.getItem('uid');

    const msg = {
        movieTitle:movieTitle,
        movieUrl:movieUrl,
        tag:tag,
        ifram:ifram,
        lat:lat,
        lon:lon,
        uid:uid
    }
    const str = JSON.stringify(msg);
    console.log(msg);//ちゃんとオブジェクトが吐かれる
    const newPostRef = push(dbRef);
    set(newPostRef, str);
    if (confirm('ページ遷移しますか？')) {
        window.location.href = 'index.html';
    }
});



