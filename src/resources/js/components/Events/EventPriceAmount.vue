<template>
    <div class="field" v-show="free === '0'">
        <label class="label" for="amount">Prix du ticket d'entrée à l'évènement</label>
        <div class="control">
            <input class="input" id="amount" min="1" name="price" placeholder="Prix du ticket" type="number">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['free']
    }
</script>
