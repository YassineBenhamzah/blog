<template>
    <div
        class="offcanvas offcanvas-start"
        tabindex="-1"
        id="searchcanvas"
        aria-labelledby="offcanvasExampleLabel"
    >
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="searchcanvas">{{ placeholder }}</h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
            ></button>
        </div>
        <div class="offcanvas-body">
            <input
                type="text"
                class="form-control"
                v-model="data.term"
                :placeholder="props.placeholder"
                @change="getPostsByTerm"
            />
            <div v-if="data.posts.length">
                <ul class="list-group">
                    <li
                        class="list-group-item"
                        v-for="post in data.posts"
                        :key="post.id"
                    >
                        <a :href="`http://localhost:8000/posts/${post.slug}`">{{
                            placeholder == "search"
                                ? post.title_en
                                : post.title_fr
                        }}</a>
                    </li>
                </ul>
            </div>
            <ul class="list-group" v-if="data.message">
                <li class="list-group-item">
                    {{ data.message }}
                </li>
            </ul>
        </div>
    </div>
</template>
<script setup>
import { reactive } from "vue";

const data = reactive({
    posts: [],
    term: "",
    message: "",
});

const props = defineProps({
    placeholder: {
        type: String,
        required: true,
    },
});

const getPostsByTerm = async () => {
    clearResults();
    if (data.term.length >= 3) {
        try {
            const response = await axios.post("/api/search", {
                term: data.term,
            });
            if (response.data.length) {
                data.posts = response.data;
            } else {
                data.message = "nothing found";
            }
        } catch (error) {
            console.log(error);
        }
    }
};

const clearResults = () => {
    data.posts = [];
    data.message = "";
};
</script>
