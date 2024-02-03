var express = require("express")


var  createController = require('../controllers/createContoller')

const router = express.Router()

router.post('/create_visit' , createController.createAccount)



router.post('/create_member' , createController.createMember)


router.post('/login' , createController.loginMember)

router.post('/logout' , createController.logout)


router.post('/chat' , createController.sendChat)

router.post('/all_chat' , createController.allchat)

module.exports = router