<template>
    <div>
        <h1>Home</h1>

        <input
            placeholder="your token"
            v-model="token"
            class="border p-2 rounded w-full"
            @keyup.enter="fetchGames"
        >

        <ul>
            <li
                v-for="game in games"
                v-text="game.description"
            ></li>
        </ul>

        <p class="text-red italic text-sm" v-if="message" v-text="message"></p>
    </div>
</template>

<script>
export default {
    data() {
        return { games: [], token: '', message: '' };
    },

    methods: {
        fetchGames() {
            axios
                .get(process.env.MIX_ROOT_API + '/games?api_token=${this.token}')
                .catch(error => {
                  this.message = error.response.data.message;
                  this.games = [];
                })
                .then(({data}) => {
                  this.games = data;
                  this.message = null;
                });
        }
    }
};
</script>
