import { createApp } from 'vue'
import formAuth from './components/formAuth.vue'
import chatHeader from './components/chatHeader.vue'
import '@/assets/styles/main.scss'

createApp(formAuth).mount('#formAuth')
createApp(chatHeader).mount('#chatHeader')
