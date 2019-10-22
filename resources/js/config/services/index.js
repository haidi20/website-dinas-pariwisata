import axios from "axios"

export function fetchPosts () {
    const response = axios.get('api/home/post').then(ress => {
        return ress.data
    }).catch(err => {
        return err
    })

    return response
}