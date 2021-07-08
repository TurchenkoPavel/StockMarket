import { createStore } from 'vuex'

const store = createStore({
    state: {
        symbol: null,
        type: 'openOrders',
    },
    mutations: {
        setSymbol(state, {symbol, type}){
            state['symbol'] = symbol;
            state['type'] = type;
        }
    },
    actions: {},
    getters: {
        getSymbol (state) {
            return state['symbol']
        },
        getType (state) {
            return state['type']
        },
    },
})

export default store;
