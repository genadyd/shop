import {floatMenuOpenClose} from './float_menu.js'
/*
menu open close
* */
floatMenuOpenClose()

import FormProcessor from "./Components/FormsProcessor.js"
import Api from "/public/scripts/Api/Api.js"
import FormsValidator from "/public/scripts/Forms/FormsValidator.js";
import {brandDelete} from "./Components/deleteItems.js";



const validator = new FormsValidator()

const pattern = /^\/[a-z0-9]+\/[a-z0-9]+$/i
if(!pattern.test(window.location.pathname)) {
    const loginProcessor = new FormProcessor(Api, validator)
}
brandDelete()
