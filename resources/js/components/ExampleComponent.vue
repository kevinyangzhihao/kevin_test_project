<template>
    <div class="container">
        <div>

            <stripe-checkout
                ref="checkoutRef"
                :pk="publishableKey"
                :sessionId="oneTimeId"
            />
            <button @click="submit">Pay now!</button>
        </div>

        <div>
            <stripe-checkout
                ref="checkoutSubRef"
                :pk="publishableKey"
                :sessionId="sessionSubId"
            />
            <button @click="submitSub">Subscription!</button>


        </div>

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
                oneTimeId: null,
                sessionSubId: null,
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getSession()
        },

        methods: {
            getSession() {
                axios.get('/getSession')
                    .then(res => {
                        console.log('lol', res.data)
                        //this.oneTimeId = res.data['oneTime'].id
                        //this.sessionSubId = res.data.subTime.id
                        this.sessionSubId = res.data['subTime'].id
                    }).catch(err => {
                })
            },

            submit() {
// You will be redirected to Stripe's secure checkout page
                this.$refs.checkoutRef.redirectToCheckout();
            },

            submitSub() {
// You will be redirected to Stripe's secure checkout page
                this.$refs.checkoutSubRef.redirectToCheckout();
            },

        },
    }
</script>
