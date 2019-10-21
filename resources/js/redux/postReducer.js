// global state for default null
const initialState = [
    {id: 1, name: 'Instagram', link: 'www.instagram.com'},
    {id: 2, name: 'Facebook', link: 'www.facebook.com'},
    {id: 3, name: 'github', link: 'www.github.com'}
] 

const postReducer = (state = initialState, action) => {   
    return state;
}

export default postReducer;