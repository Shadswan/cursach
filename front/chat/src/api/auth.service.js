import axios from "axios";

const apiClient = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
    headers: {
        'Content-Type': 'application/json',
    },
});

export default{
    login(credentials){
        return apiClient.post('/login', credentials);
    },
    registration(credentials){
        return apiClient.post('/register', credentials);
    }, 
};