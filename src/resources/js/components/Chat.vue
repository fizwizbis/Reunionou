<template>
    <div class="card-content">
        <chat-messages :messages="messages" :user="user"></chat-messages>
        <chat-form v-on:messagesent="addMessage" :user="user"></chat-form>
    </div>
</template>

<script>
    export default {
        props: {
            user: {
                type: Object,
                required: true,
            },
            event: {
                type: Object,
                required: true,
            }
        },

        data() {
            return {
                messages: []
            }
        },

        created() {
            this.fetchMessages();
            // console.log(Echo);
            // console.log(`chat.${this.event.id}`);
            Echo.private(`chat.${this.event.id}`)
                .listen('MessageSent', (e) => {
                    console.log(e);
                    this.messages.push({
                        body: e.body.body,
                        user: e.user
                    });
                });
        },

        methods: {
            fetchMessages() {
                axios.get(`/messages/${this.event.id}`).then(response => {
                    this.messages = response.data;
                });
            },
            addMessage(message) {
                this.messages.push(message);

                axios.post(`/messages/${this.event.id}`, message).then(response => {
                    console.log(response.data);
                });
            }
        }
    }
</script>
