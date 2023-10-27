import './bootstrap';
import '../../vendor/basement-chat/basement-chat/dist/basement.bundle.min.css'
import axios from 'axios'
import Pusher from 'pusher-js'
import Echo from 'laravel-echo'
import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'
import echoOptions from '../../vendor/basement-chat/basement-chat/dist/basement.echo-options.esm'
import basement from '../../vendor/basement-chat/basement-chat/dist/basement.plugin.esm'
import 'flowbite';

window.axios = axios

window.Pusher = Pusher
window.Echo = new Echo(echoOptions)

window.Alpine = Alpine
window.Alpine.plugin(intersect)
window.Alpine.plugin(basement)
window.Alpine.start()