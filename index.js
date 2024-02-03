var express  = require('express')



var cookieParser = require('cookie-parser');

const session = require('express-session')

const app = express()

app.use(cookieParser());

const route  = require('./routes/routes')

const DB = require('./DB_service')


const co = require('./controllers/createContoller')

const db = DB.getDbServiceInstance()

var cors = require('cors')

app.use(cors({
  origin:'*',  
  credentials: true 
}))


app.use(session({
    secret: 's',
    resave: false,
  saveUninitialized: true,
  cookie: { secure: true }
  }));


app.use(express.json())

app.use(express.urlencoded({ extended : false}))

app.use(express.static('public'))

app.use(express.urlencoded({ extended : true}))



const server = app.listen(process.env.PORT)

const socketIO = require('socket.io')(server , {
  cors:{
    origin:'*',
  }
})


socketIO.on('connection' , (socket)=>{
 
  console.log("a user connected");

  
socket.on("chat_message" , async (message) =>{
  

  console.log(message)
  const data={
    message : message.message,
    id_u : message.id_u,
    username : message.username,
    id_room: message.id_room,
    date_message: message.date_message,
    new_room : message.new_room,
    type : message.type

  }

  const x = await db.sendChat(data.id_u , data.message , data.id_room.id , data.date_message)


  

  socket.broadcast.emit("chat_message" , message)

  socketIO.emit("MESSAGE" , data)

}) 

socket.on("p_message" , async (message)=>{

  const data ={
    message : message.message,
    id : message.id,
    id_u : message.id_u,
    username : message.username,
    date_message: message.date_message,
    type : message.type,
    type_user : message.type_user
  }
  
  console.log(data)
})

socket.on("NUM_MEMBER" , async ()=>{
  
 
   const x = await db.all_member()
  
  
  
   socketIO.emit("callbacl_num_member" , x.length)
  
})

socket.on("all_member" , async ()=>{

  const x = await db.all_member()

  socketIO.emit("callback_all_memebr" , x)
})

socket.on("ALL_ROOMS" , async ()=>{

  const x = await db.all_room()
  socketIO.emit("callbak_ALL_ROOMS" , x)
})

socket.on("GET_EMPTY_ROOM" , async()=>{

  const x = await db.all_room()

  var name_room = x[0].name
  var id_room = x[0].id
  var m_exist_room = x[0].m_exist
  var room = x[0]
  for(var i =0 ; i<x.length ; i++){
     if( x[i]['max_number'] > x[i]['m_exist']){
      name_room = x[i]['name']
      id_room = x[i]['id']
      m_exist_room = x[i]['m_exist'] + 1
      room = x[i]
      break
     }
  }

  await db.increas_room(id_room , m_exist_room)

  socketIO.emit("CALLBACK_EMPTY_ROOM" , room)
})

socket.on("UPDATE_NUMBER_ROOM" , async(data)=>{

  

  await db.increas_room(data.id_room , data.exist+1)

  await db.discount_room(data.old_room)

})

socket.on("INFO_USER" , async (req)=>{

 
 
  const data = await db .info_user(req.id_u , req.type)

  socketIO.emit("CALLBACK_INFO_USER" , data )

})


socket.on("all_member_online" , async (data)=>{

  const x = await db.all_member_online(data.room)

  socketIO.emit("callback_all_memebr_online" , x)
})


socket.on("USER_ROOM" , async (data)=>{

  const x = await db.UserRoom(data.id_u , data.type)

  socketIO.emit("CALLBACK_USER_ROOM" , x)
})

})



app.use(route)
