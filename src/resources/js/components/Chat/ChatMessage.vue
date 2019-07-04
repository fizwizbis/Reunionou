<template>
    <li class="is-clearfix self" v-if="message.user.id === user.id">
        <div class="chat-body is-clearfix is-pulled-right">
            <p class="is-clearfix">
                {{ message.body }}
            </p>
        </div>
    </li>
    <li class="is-clearfix" v-else>
        <div class="chat-body is-clearfix is-pulled-left">
            <div class="header has-text-weight-semibold">
                <strong>{{ message.user.name }}</strong>
            </div>
            <p class="is-clearfix">
                {{ message.body }}
            </p>
        </div>
    </li>
</template>

<script>
    export default {
        props: {
            message: {
                type: Object,
                required: true,
            },
            user: {
                type: Object,
                required: true,
            }
        },
    }
</script>
