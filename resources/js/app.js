import VideosList from "./components/VideosList";
import Alpine from 'alpinejs';
import casteaching from 'casteaching';
import vue from 'vue';

require('./bootstrap');

window.Alpine = Alpine;
window.casteaching = casteaching;
window.vue = vue;

window.vue.component('videos-list', VideosList)

Alpine.start();
