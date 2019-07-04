<template>
    <div class="field" v-show="public === '1'">
        <label for="max-subs" class="label">Nombre maximal de personnes pouvant s'inscrire à l'évènement</label>
        <div class="control">
            <input class="input" id="max-subs" name="maxSubs" placeholder="Nombre maximal d'inscrits" type="number">
        </div>
        <p class="help">Laissez le champ vide si vous ne voulez pas restreindre le nombre d'inscrits</p>
    </div>
</template>

<script>
    export default {
        props: ['public']
    }
</script>
