<script>
export default {
    name : 'FooterLink',
}
</script>

<template>
    
    <div class="footer fixed-bottom">
    
        
            <div class="container-fluid">
                <div class="row bg-dark p-2">
                    <div class="d-flex justify-content-around">
                        <button class="btn bi bi-person" type="button" data-bs-toggle="offcanvas" data-bs-target="#whosonline" aria-controls="offcanvasRight">&nbsp; 520</button>
                        <button class="btn bi bi-messenger"  type="button" data-bs-toggle="offcanvas" data-bs-target="#message" aria-controls="offcanvasRight">&nbsp; خاص</button>
                        <button class="btn bi bi-people"  type="button" data-bs-toggle="offcanvas" data-bs-target="#room" aria-controls="offcanvasRight">&nbsp; الغرف</button>
                        <button class="btn bi bi-messenger"  type="button" data-bs-toggle="offcanvas" data-bs-target="#will" aria-controls="offcanvasRight">&nbsp; الحائط</button>
                        <button class="btn bi bi-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#setting" aria-controls="offcanvasRight">&nbsp; الضبط</button>
                    </div>
                </div>
            </div>
    </div>
</template>

<style scoped>

button{
    background-color: black;
    color: white;
    font-weight: bold;
}
button:hover{
    background-color: rgb(112, 110, 110);
}
</style>