<template>
    <div class="container">

        <stripe-checkout
            ref="checkoutRef"
            :pk="publishableKey"
            :sessionId="sessionId"
        />
        <button @click="submit">Pay now!</button>

    </div>
</template>

<script>

    import { StripeCheckout } from '@vue-stripe/vue-stripe';

    export default {
        components: {
            StripeCheckout,
        },

        data() {
            return {
              publishableKey:'pk_test_vb3JAB1juEq2p6gekz47PT68',
                sessionId: null
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getSession()
        },

        methods: {
            getSession() {
                axios.get('getSession')
                    .then(res => {
                        this.sessionId = res.data.id
                    }).catch(err=>{})
            },

        submit () {
// You will be redirected to Stripe's secure checkout page
            this.$refs.checkoutRef.redirectToCheckout();
        },
    },
    }
</script>
