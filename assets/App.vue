<template>
    <div>
        <h2>Welcome home !</h2>
        <button @click="counter++"> Click me {{ counter }}</button>
        <a >{{ message }}</a>
    </div>
</template>

<script>
export default {
    data: () =>  ({
        counter: 0,
        message: 'Salut les gens'
    })
}
</script>

<style>

</style>