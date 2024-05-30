import './bootstrap';
import Alpine from 'alpinejs';
import { toastNotification } from './toast';

window.Alpine = Alpine;
Alpine.start();
window.toastNotification = toastNotification;
