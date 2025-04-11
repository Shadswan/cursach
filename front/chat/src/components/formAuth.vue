<script setup>
import authService from '@/api/auth.service';
import { ref } from 'vue';
const form = ref({
    name: null,
    email: null,
    password: null,
});

const visible = ref(true);

const handleSubmit = async () => {
    try {
        const response = await authService.login(form.value);
        console.log('Успешный вход', response.data);
        localStorage.setItem('token', response.data.token); //save token in storage 

        //routing
        // router.push('https://ru.pinterest.com/') //change

    } catch (err) {
        //error.value = err.response?.data?.message || 'Ошибка авторизации';
        console.error('Ошибка', err);
    }
};

</script>

<template>
    <div class="form-auth">
        <button v-on:click="visible = !visible">{{ visible ? 'Еще нет аккаунта?' : 'Войти' }}</button>
        <div id="login">
            <div v-show="visible">
                <h2>Вход</h2>
                <form @submit.prevent="handleSubmit">
                    <input required v-model="form.email" type="email" placeholder="email">
                    <input required v-model="form.password" type="password" placeholder="password">
                    <button type="submit">
                        Войти
                    </button>
                    <!-- <div v-if="error">{{ error }}</div> -->
                </form>
            </div>
        </div>
        <div id="reg">
            <div v-show="!visible">
                <h2>Регистрация</h2>
                <form @submit.prevent="handleSubmit">
                    <input required v-model="form.name" type="text" placeholder="name">
                    <input required v-model="form.email" type="email" placeholder="email">
                    <input required v-model="form.password" type="password" placeholder="password">
                    <button type="submit">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
.form-auth {
    color: white;
    display: flex;
    align-items: center;
    flex-direction: column;
    background-color: rgb(27, 24, 51);
    border: solid rgb(27, 24, 51);
    border-radius: 2vh;
}

form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    input {
        border: none;
        padding: 1vh;
        margin-bottom: 2vh;
    }

    button {
        background-color: white;
        border: 1vh solid white;
        border-radius: 1vh;
    }
}
</style>