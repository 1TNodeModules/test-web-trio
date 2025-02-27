const axiosInstance = axios.create({
    baseURL: 'http://test.test/api/',
    timeout: 1000,
});

export default axiosInstance;
