// Import the functions you need from the SDKs you need
import firebase from 'firebase/compat/app'
import 'firebase/compat/database'
import 'firebase/compat/firestore';
import { initializeApp } from 'firebase/app';
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyB_CJ0h9lAY8N8Zl44fPEqQCcH1KFp3HnM",
    authDomain: "doan2-4397c.firebaseapp.com",
    projectId: "doan2-4397c",
    storageBucket: "doan2-4397c.appspot.com",
    messagingSenderId: "930165525789",
    appId: "1:930165525789:web:fbcd5e116558cc5c2125f4",
    measurementId: "G-5HKC6X4ZER"
  };
  let app  = firebase.initializeApp(firebaseConfig);
  firebase.firestore()
  .enablePersistence({ synchronizeTabs: !0 })
  .catch(() => {
    console.warn("DB offline support not available");
  });

// Initialize Firebase

// const analytics = getAnalytics(app);
const db = app.database();
export const chartDataLineCollection = db.ref("chartDataLine")
export const LM35Collection = db.ref("dataLM35")
export const DHT11Collection = db.ref("dataDHT11")
export const moistureCollection = db.ref("dataMoisture")
export const motorStatus = db.ref("motorStatus")
export default {
  firebase: firebase,
  firestore: firebase.firestore(),
  database: db ,
} 

