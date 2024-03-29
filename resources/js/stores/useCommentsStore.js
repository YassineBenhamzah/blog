import { defineStore } from 'pinia'

export const useCommentsStore = defineStore('counter', {
    state: () => ({
        comments : []
     }),
    getters: {
      getComments: (state) => state.comments
    },
    actions: {
        async fetchComments (post_id)  {
            try {
                const response = await axios.get(`/api/comment/${post_id}`);
                this.comments = response.data;
            }catch(error){
                console.log(error);
            }
        },
       async storeComment(user_id , post_id , body) {
        try {
            const response = await axios.post("/api/add/comment", {
                user_id,
                post_id,
                body,
            });
            this.comments.unshift(response.data);

        } catch (error) {
            console.log(error);
        }
      }
    },
  })
