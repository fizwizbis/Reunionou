<template>
    <div class="field">
        <div class="field" v-show="public === '1'">
            <label class="label">Prix de l'évènement</label>
            <div class="control">
                <label class="radio">
                    <input type="radio" name="free" value="1" v-model="free">
                    Gratuit
                </label>
                <label class="radio">
                    <input type="radio" name="free" value="0" v-model="free">
                    Payant
                </label>
            </div>
        </div>
        <event-price-amount :free="free"></event-price-amount>
    </div>
</template>

<script>
    export default {
        props: ['public'],

        data() {
            return {
                free: 1
            }
        }
    }
</script>
