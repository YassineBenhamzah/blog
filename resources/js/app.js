import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';
import { createPinia } from 'pinia'

import Comments from './components/Comments.vue';
import AddComments from './components/AddComments.vue';
import CommentsCount from './components/CommentsCount.vue';
import Search from './components/Search.vue';
import SearchCanvas from './components/SearchCanvas.vue';

const app = createApp({});

const pinia = createPinia()
app.component('comments-component' , Comments);
app.component('add-comments' , AddComments);
app.component('comments-count' , CommentsCount);
app.component('search-component' , Search);
app.component('search-canvas' , SearchCanvas);

app.use(pinia)
app.mount("#app");
