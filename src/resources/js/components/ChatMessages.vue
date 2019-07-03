<template>
    <ul class="chat">
        <chat-message v-for="message in messages" :key="message.id" :message="message" :user="user"></chat-message>
    </ul>
</template>
<script>
    export default {
        props: {
            messages: {
                type: Array,
                required: true,
            },
            user: {
                type: Object,
                required: true,
            }
        },

        updated() {
            let last = document.querySelector('.chat > li:last-of-type');
            if (last !== null) {
                last.scrollIntoView();
            }
        },
    };
</script>
