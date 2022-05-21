require('./bootstrap');

import{createApp} from "vue";
import ApplyComponent from './components/ApplyComponent.vue'
import ExampleComponent from './components/ExampleComponent.vue'
import FavoriteComponent from './components/FavoriteComponent.vue'
import SearchComponent from './components/SearchComponent.vue'

const app = createApp({})
app.component('apply-component',ApplyComponent);
app.component('example-component',ExampleComponent);
app.component('favorite-component',FavoriteComponent);
app.component('search-component',SearchComponent);
app.mount('#app');
