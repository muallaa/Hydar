const dotenv = require('dotenv')
const { response } = require('express')
const { Timestamp } = require('mongodb')
const { now } = require('mongoose')

const mysql = require('mysql')

dotenv.config()


var con = mysql.createConnection({
    host : process.env.HOST,
    user: process.env.USER,
    password: process.env.PASSWORD,
    database: process.env.DATABASE,
    port:process.env.DB_PORT
})



con.connect((err)=>{
    if(err) {
        console.log(err)
    }
    console.log("connect")
})

class DbServices {
    static getDbServiceInstance(){
        return  new DbServices()
    }

    async insert_visit(username , id_room){
        try{


            return await new Promise((resolve , reject) =>{

             
                const query = "INSERT INTO `visitore` VALUES (? , ? , ?)"


                
            con.query(query , [ null , username , 'test.jpg'] , (err , result) =>{
                if(err) reject(new Error(err.message))
                   

                    const query = "SELECT id FROM `visitore` WHERE `username`=?"

                    con.query(query , [username] , (err , result)=>{
                        
                        if(err) reject(new Error(err.message))

                        const x = result[0]['id']

                        const date = new Date()

                        const query = "INSERT  INTO  `online` VALUES (? , ? , ? , ? , ?)"

                        con.query(query , [null , x , 'visitore' , date ,  id_room] , (err , result)=>{
                            
                            if(err) reject(new Error(err.message))
    
                            resolve(x)
                        })

                        
                        
                        
                    })

                   
            })


            })
           

        }
        catch (error){
            console.log(error)
        }
    }

    async create_member(username , password , location , flag){
        try{


           return  await new Promise((resolve , reject) =>{

               
                const query = "INSERT INTO `member` VALUES (? , ? , ? , ? , ? , ?  )"

                
            con.query(query , [ null , username , password , 'test.jpg' , location , flag] , (err , result) =>{
                if(err) reject(new Error(err.message))

                    resolve({sucess : true})
 
            })
            })
          

        }
        catch (error){
            console.log(error)
        }
    }

    async loginMember(username , password , id_room){
        try{
           return new Promise((resolve , reject) =>{

            

                const query = "SELECT * FROM `member` WHERE `username`=? AND `password`=?"

                  con.query(query , [username , password] , (err , result , field) =>{

                    
                    if(err) {reject(new Error(err.message))}

                    
                   if(result.length > 0){

                    const row = result
                        const x = result[0]['id']
                        const date = new Date()
                        console.log(x)

                        const query = "INSERT  INTO  `online` VALUES (? , ? , ? , ? , ?)"

                        con.query(query , [null , x , 'member' , date ,  id_room] , (err , result)=>{
                            
                            if(err) reject(new Error(err.message))
    
                            resolve(row)
                           
                        })

                        
                        
                        
                  
                    
                    
                    
                   
                   }else{

                     
                        resolve([{success : false}])
                   }
                   
                 
                  
                })


            })
        }
        catch (error){
            console.log(error)
        }
    }


    //chat

    async sendChat(id_u , message , id_room , date_message){

        try{

         const response =   await new Promise((resolve , reject) =>{

                
                
                
                const query = "INSERT INTO `chat` (id , id_u , messatge , id_room) VALUES (? , ? , ? , ? )"

                con.query(query , [null  , id_u , message , id_room]  , (err , result , field) =>{
                    
                    if(err){ reject(new Error(err.message))}

                    
                    resolve(result)

                })
            })
        }
        catch(error){
             console.log(error)
        }
    }

    //allchat

    async all_chat(){
        try{

            return await new Promise( (resolve , reject) =>{

                const query = "SELECT * FROM `chat`"

                con.query(query , (err , result) =>{
                    if(err){ reject (new Error(err.message))}

                    resolve(result)
                })
            })

        }
        catch(error){
            console.log(error)
        }
    }

    // all member

    async all_member(){
        try{
            return await new Promise ( (resolve , reject) =>{

                const quer = "SELECT * from `online`"

                con.query(quer , (err , result)=>{


                    if(err) {reject (new Error(err.message))}

                   
                    resolve(result)
                })
            })
        }
        catch(error){
            console.log(error)
        }
    }

    //all rooms

    async all_room(){
        try{
            return await new Promise( (resolve , reject) =>{
                
                const quer = "SELECT * FROM `room`"

                con.query(quer , (err , result) =>{

                    if(err){ reject (new Error(err.message))}

                    
                    resolve(result)
                })
            })
        }
        catch(error){
            console.log(error)
        }
    }

    // increas room 
    
    async increas_room(id_room , m_exist){
        try{
            return await new Promise( (resolve , reject) =>{
                
                const quer = "UPDATE `room` SET `m_exist`=? WHERE `id`=?"

                con.query(quer , [m_exist , id_room] ,  (err , result) =>{

                    if(err){ reject (new Error(err.message))}

                    
                    resolve(result)
                })
            })
        }
        catch(error){
            console.log(error)
        }
    }

    // discount_room

    async discount_room(id_room){

        try{
            return await new Promise( (resolve , reject) =>{
                
               
                const quer = "SELECT `m_exist` FROM `room` WHERE `id`=?"

                con.query(quer , [id_room] ,  (err , result) =>{

                    if(err){ reject (new Error(err.message))}

                  
                    const m_exist = result[0]['m_exist'] -1

                   

                    const quer = "UPDATE `room` SET `m_exist`=? WHERE `id`=?"

                     con.query(quer , [m_exist , id_room] ,  (err , result) =>{

                    if(err){ reject (new Error(err.message))}

                    
                    resolve(result)
                })

                  
                })
            })
        }
        catch(error){
            console.log(error)
        }
    }

    //  delete_online

    async delete_online(id_u , type){

        try{
            return await new Promise( (resolve , reject) =>{
                
               
                const quer = "DELETE FROM `online` WHERE `id_u`=? AND `type`=?"

             
                con.query(quer , [id_u , type] ,  (err , result) =>{

                    if(err){ reject (new Error(err.message))}

                    resolve(result)
                  
                })
            })

             }catch(error){
                        console.log(error)
                      }   
    }


    async info_user(id_u , type){

        try{
            return await new Promise( (resolve , reject) =>{
                
                
                if(type = 'member'){

                
               
                const quer = "SELECT * FROM member  WHERE `id`= ? "

             
                con.query(quer , [  id_u] ,  (err , result) =>{

                    if(err){ reject (new Error(err.message))}

               
                    resolve(result)
                })
            }else{
                const quer = "SELECT * FROM visitore  WHERE `id`= ? "

             
                con.query(quer , [  id_u] ,  (err , result) =>{

                    if(err){ reject (new Error(err.message))}

                    
                  
                    resolve(result)
                })
            }
            })

             }catch(error){
                 console.log(error)
               }   
    }

    async all_member_online(room){
        try{
            return await new Promise ( (resolve , reject) =>{

                const quer = "SELECT * from `online` WHERE `room`=?"

                con.query(quer , [room.id],  (err , result)=>{


                    if(err) {reject (new Error(err.message))}

                   
                    resolve(result)
                })
            })
        }
        catch(error){
            console.log(error)
        }
    }

    async UserRoom(id_u , type){

         try{
                return new Promise( (resolve , reject) => {

                    const query = "SELECT *  FROM `online` INNER JOIN `room` ON room.id=online.room WHERE `id_u`=? AND `type`=?"

                    con.query(query , [id_u , type] , (err , result)=> {
                        
                        if(err) { reject(new Error(err.message))}

                        resolve(result)
                    })
                })

         }catch(errore){
            console.log(error)
         }
    }
}



module.exports = DbServices