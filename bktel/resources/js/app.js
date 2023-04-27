/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('nav-bar-component', require('./components/sidebar/NavBarComponent.vue').default);
Vue.component('side-bar-component', require('./components/sidebar/SideBarComponent.vue').default);
Vue.component('main-content-component', require('./components/sidebar/MainContentComponent').default);
Vue.component('send-notification-component', require('./components/pusher/SendNotificationComponent').default)
Vue.component('history-component', require('./components/HistoryComponent').default)
Vue.component('control-component', require('./components/ControlComponent').default)
Vue.component('input-device-component', require('./components/input/InputDeviceComponent').default)
Vue.component('output-device-component', require('./components/output/OutputDeviceComponent').default)
Vue.component('register-farm-component', require('./components/farm/RegisterFarmComponent').default)
Vue.component('register-user-component', require('./components/RegisterUserComponent').default)
Vue.component('register-receive-mail-component', require('./components/RegisterReceiveMailComponent').default)
Vue.component('weather-component', require('./components/WeatherComponent').default)
Vue.component('plant-diseases-component', require('./components/PlantDiseasesComponent').default)









/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
