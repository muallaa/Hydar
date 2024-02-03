<script>
export default {
    name: 'NavLink',
}
</script>

<template>
 <nav class=" d-flex  py-2">
                <router-link to="/subscripe" class="btn">الاشتراكات</router-link>
                <router-link to="/low" class="btn">القوانين</router-link>
                <router-link to="" class="btn">حمل التطبيق</router-link>
                <router-link to="/contact" class="btn">اتصل بنا</router-link>
            </nav>
</template>

<style scoped>

a{
    width: 90px;
    padding: 1px;
    height: 22px;
    background-color: #19184D;
    color: #fff;
}

.btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: normal;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    
    font-size: 11px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    margin-inline: 5px;
}
a:hover{
    background-color:rgba(0, 0, 0, 0.603);
}
</style>