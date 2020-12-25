import LoginFormProcessor from "./LoginFormProcessor.js"
import Api from "/Modules/Admin/public/scripts/Api/Api.js"
import FormsValidator from "/Modules/Admin/public/scripts/Forms/FormsValidator.js";

const validator = new FormsValidator()

const loginProcessor = new LoginFormProcessor(Api, validator)
