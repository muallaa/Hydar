const mongoose = require('mongoose')

const Schema = mongoose.Schema

const createAccount = new Schema({
    name :{
        type : String,
        required : true,
    },
    email :{
        type : String,
        required : true,
    },
     password :{
        type : String,
        required : true,
    },
     phone :{
        type : Number,
        required : true,
    },
} , {timestamps : true})

const create = mongoose.model('user' , createAccount)

module.exports = create