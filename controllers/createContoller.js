const DB = require('../DB_service')


// log in visit
const createAccount = async(req , res) =>{

    const {username , id_room} = req.body

    const db =  DB.getDbServiceInstance()



const result = await db.insert_visit(username , id_room)
                        .then( data => res.json({success: true , id:data}))
                        .catch(err => console.log(err))



   
}

// create member

const createMember = (req , res) =>{ 

    
    req.session.time =  1
    
    const {username , password , location , flag} = req.body


    
    const db = DB.getDbServiceInstance()

    const result = db.create_member( username, password , location , flag)

    result.then(data => res.json({success : true}))
    .catch(err => console.log(err))

    
}

//login member

const  loginMember = async (req , res)=>{

 
    
    const {username , password , id_room} = req.body

    
    const db =  DB.getDbServiceInstance()

    const   result =  await db.loginMember(username , password , id_room)

    
    if(result[0].hasOwnProperty('id')){
       

        res.status(200).json([{success : true , id_u : result[0]}])

    }else{

        res.status(200).json([{success : false}])

    }

}


// logout
const logout = async (req , res) =>{

    const {id_room , id_u , type} = req.body

    const db =  DB.getDbServiceInstance()

    const   result =  await db.discount_room(id_room)

    const   delete_online =  await db.delete_online(id_u , type)

 
    res.json([{success : true}])
}


//chat

const sendChat = async (req , res) =>{
    
 

        
        const {message} = req.body

        console.log(message)
        const db = DB.getDbServiceInstance()

        const result = await db.sendChat(id_u , message)
        .then(data => res.json([{success : true}]))
        .catch(err => console.log(err))

        
        

}

//all chat

const allchat = async (req , res) =>{

    const db = DB.getDbServiceInstance()

    const result = await db.all_chat().then(
        (data) => res.json(data)
    ).catch(err => console.log(err))
}


module.exports = { createAccount , createMember , loginMember , logout , sendChat , allchat}