import LoginFormProcessor from "./LoginFormProcessor.js"
import Api from "/public/scripts/Api/Api.js"
import FormsValidator from "/public/scripts/Forms/FormsValidator.js";

const validator = new FormsValidator()

const loginProcessor = new LoginFormProcessor(Api, validator)
