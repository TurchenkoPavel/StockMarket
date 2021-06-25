import { createStore } from 'vuex'
import * as test from "./test";

const store = createStore({
    modules: {
        test: test,
    }
})

export default store;
