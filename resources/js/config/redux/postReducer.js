import axios from 'axios';

// global state for default null
const initialState = []

const postReducer = (state = initialState, action) => {   
    // switch(action.type){
    //     case "UPDATE_POST":
            
    //     default:
    //         state = axios.get('api/home/post').then(ress => {
    //             // resolve(ress.data);
    //             return ress.data
    //         }).catch(err => {
    //             // reject(err)
    //             return err
    //         });
        
    //         return state;
    // }

    return state;
    
}

export default postReducer;