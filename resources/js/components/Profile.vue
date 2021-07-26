<template>
    <div>
        <p>Profile</p>

        <ul>
            <li><strong>Series: </strong> {{ series }}</li>
            <li><strong>Lessons: </strong> {{ lessons }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                series: 0,
                lessons: 0
            };
        },

        created() {
            axios.get(process.env.MIX_ROOT_API + '/profile')
                .then(response => response.data)
                .then(data => {
                    this.series = data.series;
                    this.lessons = data.lessons
                });
        }
    };
</script>
