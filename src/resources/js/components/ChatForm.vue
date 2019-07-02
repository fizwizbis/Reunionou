<template>
    <div class="field has-addons" style="padding-top: 2rem;">
        <div class="control is-expanded">
            <input id="btn-input" type="text" name="body" class="input" placeholder="Entrez votre message ici..." v-model="newMessage" @keyup.enter="sendMessage">
        </div>
        <div class="control">
            <button class="button is-primary" id="btn-chat" @click="sendMessage">Envoyer</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    body: this.newMessage
                });
                this.newMessage = '';
            }
        }
    }
</script>
