import axios from 'axios'

const api = axios.create({
  baseURL: window.location.hostname.includes('localhost')  ?
  'http://localhost:8000' : ''
})

export default api 