import Alpine from 'alpinejs'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import {Modal} from "bootstrap";

Alpine.plugin(FormsAlpinePlugin)

window.Alpine = Alpine

Alpine.start()

new Modal('#loginPopup')
new Modal('#registerPopup')
