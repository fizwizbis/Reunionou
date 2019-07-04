<template>
    <div class="field">
        <div class="field">
            <label class="label">Status de l'évènement</label>
            <div class="control">
                <label class="radio">
                    <input type="radio" name="public" value="1" v-model="public">
                    Public
                </label>
                <label class="radio">
                    <input type="radio" name="public" value="0" v-model="public">
                    Privé
                </label>
            </div>
        </div>
        <event-max-subs :public="public"></event-max-subs>
        <event-price :public="public"></event-price>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                public: "0",
            }
        }
    }
</script>
