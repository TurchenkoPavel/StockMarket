<template>
    <div class="card">
        <div class="card-header text-center">
            MEMBERSHIP
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="input-email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="input-email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="input-password" class="form-label">Password</label>
                    <input type="password" class="form-control" :class="{'is-invalid': is_valid === false}" id="input-password">
                    <div class="invalid-feedback">
                        You entered an incorrect password. Contact the administrator.
                    </div>
                </div>
                <div class="mb-3">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary" @click.prevent="is_valid = false">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Members",
    data: () => ({
        is_valid: null,
    }),
}
</script>

<style scoped>

</style>
